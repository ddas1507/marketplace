<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Crud;

class MakeCrud extends Command
{
    protected $signature = 'make:crud {id}';
    protected $description = 'Gera os arquivos de um CRUD automaticamente';
    public function handle()
    {
        $id = $this->argument('id');
        $crud = Crud::find($id);

        if (!$crud) {
            $this->error('CRUD não encontrado.');
            return;
        }

        $nome = Str::studly($crud->nome);
        $controllerPath = $crud->controller_path;
        $environment = $crud->environment;
        $viewPath = $crud->view_path;
        $routeParam = $crud->route_param;
        $fields = json_decode($crud->fields, true);

        // Criar Model
        $this->generateModel($nome, $fields);

        // Criar Migration
        $this->generateMigration($nome, $fields);

        // Criar Controller
        $this->generateController($nome, $controllerPath, $environment, $routeParam, $viewPath, $fields);

        // Criar Views
        $this->generateViews($nome, $environment, $viewPath, $fields);

        // Criar Rota
//        $this->generateRoute($nome, $environment, $viewPath, $routeParam);

        $this->info("CRUD '$nome' gerado com sucesso!");
    }

    private function generateModel($nome, $fields)
    {
        $fieldsList = implode(", ", array_map(fn($f) => "'".$f['name']."'", $fields));

        $modelTemplate = "<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class {$nome} extends Model
{
    use HasFactory;
    protected \$fillable = [{$fieldsList}];
}";

        File::put(app_path("Models/{$nome}.php"), $modelTemplate);
    }

    private function generateMigration($nome, $fields)
    {
        $tableName = Str::snake(Str::plural($nome));
        $timestamp = date('Y_m_d_His');
        $migrationName = "{$timestamp}_create_{$tableName}_table.php";

        $fieldsCode = "";
        foreach ($fields as $field) {
            $fieldsCode .= "\$table->{$field['type']}('{$field['name']}');\n            ";
        }

        $migrationTemplate = "<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('$tableName', function (Blueprint \$table) {
            \$table->id();
            $fieldsCode
            \$table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('$tableName');
    }
};";

        File::put(database_path("migrations/{$migrationName}"), $migrationTemplate);
    }

    private function generateController($nome, $controllerPath, $environment, $routeParam, $viewPath, $fields)
    {
        $index = implode(", ", array_map(fn($f) => "'".$f['name']."'", $fields));
        // Corrigido: Gerar uma única vez o array de validação
        $storeFields = implode(",\n            ", array_map(fn($f) => "'".$f['name']."' => 'required'", $fields));

        // Corrigido: Gerar os dados corretamente
        $storeData = implode(",\n            ", array_map(fn($f) => "'".$f['name']."' => \$request->".$f['name'], $fields));

        $controllerTemplate = "<?php

namespace App\Http\Controllers\\$environment\\$controllerPath;

use App\Models\\$nome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class {$nome}Controller extends Controller
{
    public function index() {
        \$items = $nome::all();
        return view('$viewPath.index', compact('items'));
    }

    public function create() {
        return view('$viewPath.create');
    }

    public function store(Request \$request) {
        \$request->validate([
            $storeFields
        ]);

        $nome::create([
            $storeData
        ]);

        return redirect()->route('$routeParam.index')->with('success', 'Registro criado com sucesso.');
    }

    public function edit($nome \${$routeParam}) {
        return view('$viewPath.edit', compact('$routeParam'));
    }

    public function update(Request \$request, $nome \${$routeParam}) {
        \$request->validate([
            $storeFields
        ]);

        \${$routeParam}->update([
            $storeData
        ]);

        return redirect()->route('$routeParam.index')->with('success', 'Registro atualizado com sucesso.');
    }

    public function destroy($nome \${$routeParam}) {
        \${$routeParam}->delete();
        return redirect()->route('$routeParam.index')->with('success', 'Registro removido.');
    }
};";

        File::ensureDirectoryExists(app_path("Http/Controllers/$environment/$controllerPath"));
        File::put(app_path("Http/Controllers/{$environment}/$controllerPath/{$nome}Controller.php"), $controllerTemplate);

        $environmentRoute = $environment;
        $environment_min = strtolower($environmentRoute);

        // Adicionar as rotas no arquivo web.php
        $routeFile = base_path('routes/web/admin.php');

        $routeCode = "
Route::resource('$environment_min/$routeParam', App\Http\Controllers\\$environment\\$controllerPath\\{$nome}Controller::class)
->middleware(['auth']);
";

        // Verificar se a rota já existe, se não, adicionar
        if (!file_exists($routeFile) || !str_contains(file_get_contents($routeFile), "Route::resource('$routeParam'")) {
            file_put_contents($routeFile, $routeCode, FILE_APPEND);
        }

    }

    private function generateViews($nome, $environment, $viewPath, $fields)
    {
        $nome_minusculo = $nome;
        $rota = strtolower($nome_minusculo);

        // Criando diretório correto para as views
        $dirPath = resource_path("views/" . str_replace('.', '/', $viewPath));

        Log::info("Criando views em: " . $dirPath);

        if (!File::exists($dirPath)) {
            File::makeDirectory($dirPath, 0777, true, true);
            Log::info("Pasta criada: " . $dirPath);
        }

        // Criando arquivos .blade.php
        $fieldInputs = implode("\n", array_map(fn($f) => "<label>{$f["name"]}</label>\n<input type=\"text\" name=\"{$f["name"]}\" class=\"form-control\" required>", $fields));

        $indexTemplate = "@extends('admin.layouts.master')
@section('content')

    <!-- Main Content -->
    <div class=\"main-content\">
        <section class=\"section\">
            <div class=\"section-header\">
                <h1>{$nome}</h1>
                <div class=\"section-header-breadcrumb\">
                    <div class=\"breadcrumb-item active\"><a href=\"{{ route('admin.dashboard') }}\">Painel de Controle</a></div>
                    <div class=\"breadcrumb-item\">{$nome}</div>
                </div>
            </div>

            <div class=\"section-body\">

                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"card\">
                            <div class=\"card-header\">
                                <h4>{$nome}</h4>

                                <div class=\"card-header-action\">
                                    <a href=\"{{ route('$rota.create') }}\" class=\"btn btn-primary\">Cadastrar Novo</a>
                                </div>
                            </div>

                            <div class=\"card-body\">
                                <table class=\"table table-striped table-striped\" id=\"datatables\">
                                    <thead>" . implode("", array_map(fn($f) => "<td>{$f["name"]}</td>", $fields)) . "</thead>
                                    <tbody>
                                    @foreach(\$items as \$item)
                                    <tr>" . implode("", array_map(fn($f) => "<td>{{ \$item->{$f["name"]} }}</td>", $fields)) . "</tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection";

        $createTemplate = "@extends('admin.layouts.master')
@section('content')

    <!-- Main Content -->
    <div class=\"main-content\">
        <section class=\"section\">
            <div class=\"section-header\">
                <h1>Cadastro de {{$nome}}</h1>
                <div class=\"section-header-breadcrumb\">
                    <div class=\"breadcrumb-item active\"><a href=\"{{ route('admin.dashboard') }}\">Painel de Controle</a></div>
                    <div class=\"breadcrumb-item active\"><a href=\"{{ route('$rota.index') }}\">{{$nome}}</a></div>
                    <div class=\"breadcrumb-item\">Novo {{$nome}}</div>
                </div>
            </div>

            <div class=\"section-body\">

                <div class=\"row\">
                    <div class=\"col-12\">
                        <div class=\"card\">
                            <div class=\"card-header\">
                                <h4>Criar {{$nome}}</h4>

                                <div class=\"card-header-action\">
                                    <a href=\"\" class=\"btn btn-primary\">Ajuda?</a>
                                </div>
                            </div>

                            <div class=\"card-body\">

                                <form action=\"{{ route('$rota.store') }}\" method=\"POST\">
                                    @csrf
                                    <div class=\"mb-3\">
                                        $fieldInputs
                                    </div>

                                    <br><br>
                                    <button type=\"submit\" class=\"btn btn-success\">Salvar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection";

        File::put("$dirPath/index.blade.php", $indexTemplate);
        File::put("$dirPath/create.blade.php", $createTemplate);

        Log::info("Arquivos de view criados para nome: " . $nome);
        Log::info("Ambiente de view criados para environment: " . $environment);
        Log::info("Ambiente de view criados para viewPath: " . $viewPath);
    }

}
