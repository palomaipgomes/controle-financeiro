<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContasController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $contas = Conta::all();
        return view('contas.index', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('contas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $contas = new Conta();

        $contas->banco = $request->banco;
        $contas->agencia = $request->agencia;
        $contas->conta = $request->conta;
        $contas->tipo = $request->tipo;
        
        if($contas->save()){
            return redirect()->route('contas.index')->with('success', 'Conta cadastrada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao cadastrar conta. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function show($contas_id){
        $contas = Conta::find($contas_id);

        return view('contas.show', compact('contas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function edit($contas_id){
        $contas = Conta::find($contas_id);
        return view('contas.edit', compact('contas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function update($contas_id, Request $request){
        $contas = Conta::find($contas_id);

        $contas->banco = $request->banco;
        $contas->agencia = $request->agencia;
        $contas->conta = $request->conta;
        $contas->tipo = $request->tipo;
        
        if($contas->update()){
            return redirect()->route('contas.edit', $contas_id)->with('success', 'Conta atualizada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao atualizar conta. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conta  $conta
     * @return \Illuminate\Http\Response
     */
    public function destroy($contas_id, Request $request){
        $contas = Conta::find($contas_id);

        $contas->banco = $request->banco;
        $contas->agencia = $request->agencia;
        $contas->conta = $request->conta;
        $contas->tipo = $request->tipo;

        if($contas->delete()){
            return redirect()->route('contas.index', $contas_id)->with('success', 'Conta excluída com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao excluir conta. Tente novamente em alguns minutos.')->withInput();
        }
    }
}
