<?php

namespace App\Http\Controllers\Backend\System;

use App\Http\Controllers\Controller;
use App\Models\Backend\System\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $general = General::first();
        return view('backend.system.general.index', compact('general'));
    }

    public function update(Request $request, General $general)
    {
        $request->validate([
            'store_logo' => ['nullable', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'],
            'store_nome_loja' => ['nullable', 'max:255'],
            'store_nome_fantasia' => ['nullable', 'max:255'],
            'store_cnpj' => ['nullable', 'max:255'],
            'store_horario' => ['nullable', 'max:255'],
            'store_endereco1' => ['nullable', 'max:255'],
            'store_endereco2' => ['nullable', 'max:255'],
            'store_endereco3' => ['nullable', 'max:255'],
            'store_endereco4' => ['nullable', 'max:255'],
            'store_cep' => ['nullable', 'max:255'],
            'store_estado' => ['nullable', 'max:255'],
            'store_cidade' => ['nullable', 'max:255'],
            'footer_info' => ['nullable', 'max:255'],
        ]);

        if ($request->hasFile('store_logo')) {

            //verifica se existe a imagem e apaga

            if (File::exists(public_path($general->store_logo))){
                File::delete(public_path($general->store_logo));
            }

            $image = $request->store_logo;
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('backend/assets/img/'), $imageName);

            $path = '/backend/assets/img/' . $imageName;
            $general->store_logo = $path;
        }

        $general->store_nome_loja = $request->store_nome_loja;
        $general->store_nome_fantasia = $request->store_nome_fantasia;
        $general->store_cnpj = $request->store_cnpj;
        $general->store_horario = $request->store_horario;
        $general->store_endereco1 = $request->store_endereco1;
        $general->store_endereco2 = $request->store_endereco2;
        $general->store_endereco3 = $request->store_endereco3;
        $general->store_endereco4 = $request->store_endereco4;
        $general->store_cep = $request->store_cep;
        $general->store_estado = $request->store_estado;
        $general->store_cidade = $request->store_cidade;
        $general->footer_info = $request->footer_info;
        $general->save();

        $general = General::first();

        flash()->success('Os dados da empresa foram atualizados!',[],'Sucesso');
        return view('backend.system.general.index', compact('general'));
    }

}
