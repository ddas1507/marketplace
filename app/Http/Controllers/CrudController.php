<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class CrudController extends Controller
{
    public function index()
    {
        $cruds = Crud::all();
        return view('admin.cruds.index', compact('cruds'));
    }

    public function create()
    {
        return view('admin.cruds.create');
    }

    public function edit($id)
    {
        $crud = Crud::findOrFail($id);
        // Log para depuração
        Log::info("Criando CRUD com ID: " . $crud->id);

        // Executa make:crud {id}
        $makeCrudOutput = Artisan::call('make:crud', ['id' => $crud->id]);
        Log::info("Saída do make:crud -> " . Artisan::output());

        // Executa php artisan migrate
        $migrateOutput = Artisan::call('migrate');
        Log::info("Saída do migrate -> " . Artisan::output());

        return redirect()->route('cruds.index')->with('success', 'CRUD Gerado com sucesso!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'fields' => 'required|array',
        ]);

        // Criar e salvar no banco de dados
        $crud = Crud::create([
            'nome' => $request->nome,
            'controller_path' => $request->nome,
            'environment' => $request->environment,
            'view_path' => strtolower($request->environment).'/'.strtolower($request->nome),
            'route_param' => strtolower($request->nome),
            'fields' => json_encode($request->fields),
        ]);

        return redirect()->route('cruds.index')->with('success', "Crud $crud->nome com sucesso!");
    }

    public function update(Request $request)
    {
        return redirect()->route('cruds.index')->with('success', 'CRUD atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $crud = Crud::findOrFail($id);
        $crud->delete();

        return redirect()->route('cruds.index')->with('success', 'CRUD excluído com sucesso!');
    }

}
