<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReceitasController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $receitas = Receita::all();
        $receitaMes = Receita::where("created_at",">", Carbon::now()->subMonths(1))->sum("valor");
        return view('receitas.index', compact('receitas', 'receitaMes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('receitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $receitas = new Receita();

        $receitas->descricao = $request->descricao;
        $receitas->data = $request->data;
        $receitas->valor = $request->valor;
        $receitas->observacao = $request->observacao;

        if($request->hasFile('arquivo')){
            $name = Str::random(15). '.' . $request->arquivo->extension();
            $path = $request->arquivo->move('img/', $name, 'public');
            $receitas->arquivo = $path;
        }
        
        if($receitas->save()){
            return redirect()->route('receitas.index')->with('success', 'Receita cadastrada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao cadastrar receita. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show($receitas_id){
        $receitas = Receita::find($receitas_id);

        return view('receitas.show', compact('receitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit($receitas_id){
        $receitas = Receita::find($receitas_id);
        return view('receitas.edit', compact('receitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update($receitas_id, Request $request){
        $receitas = Receita::find($receitas_id);

        $receitas->descricao = $request->descricao;
        $receitas->data = $request->data;
        $receitas->valor = $request->valor;
        $receitas->observacao = $request->observacao;

        if($request->hasFile('arquivo')){
            $name = Str::random(15). '.' . $request->arquivo->extension();
            $path = $request->arquivo->move('img/', $name, 'public');
            $receitas->arquivo = $path;
        }
        
        if($receitas->update()){
            return redirect()->route('receitas.edit', $receitas_id)->with('success', 'Receita atualizada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao atualizar receita. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy($receitas_id, Request $request){
        $receitas = Receita::find($receitas_id);

        $receitas->descricao = $request->descricao;
        $receitas->data = $request->data;
        $receitas->valor = $request->valor;
        $receitas->observacao = $request->observacao;

        if($request->hasFile('arquivo')){
            $name = Str::random(15). '.' . $request->arquivo->extension();
            $path = $request->arquivo->move('img/', $name, 'public');
            $receitas->arquivo = $path;
        }
        
        if($receitas->delete()){
            return redirect()->route('receitas.index', $receitas_id)->with('success', 'Receita excluída com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao excluir receita. Tente novamente em alguns minutos.')->withInput();
        }
    }
}
