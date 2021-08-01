<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DespesasController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $despesas = Despesa::all();
        $despesaMes = Despesa::where("created_at",">", Carbon::now()->subMonths(1))->sum("valor");
        return view('despesas.index', compact('despesas', 'despesaMes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('despesas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $despesas = new Despesa();

        $despesas->descricao = $request->descricao;
        $despesas->data = $request->data;
        $despesas->valor = $request->valor;
        $despesas->observacao = $request->observacao;

        if($request->hasFile('arquivo')){
            $name = Str::random(15). '.' . $request->arquivo->extension();
            $path = $request->arquivo->move('img/', $name, 'public');
            $despesas->arquivo = $path;
        }
        
        if($despesas->save()){
            return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao cadastrar despesa. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function show($despesas_id){
        $despesas = Despesa::find($despesas_id);

        return view('despesas.show', compact('despesas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit($despesas_id){
        $despesas = Despesa::find($despesas_id);
        return view('despesas.edit', compact('despesas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update($despesas_id, Request $request){
        $despesas = Despesa::find($despesas_id);

        $despesas->descricao = $request->descricao;
        $despesas->data = $request->data;
        $despesas->valor = $request->valor;
        $despesas->observacao = $request->observacao;

        if($request->hasFile('arquivo')){
            $name = Str::random(15). '.' . $request->arquivo->extension();
            $path = $request->arquivo->move('img/', $name, 'public');
            $despesas->arquivo = $path;
        }
        
        if($despesas->update()){
            return redirect()->route('despesas.edit', $despesas_id)->with('success', 'Despesa atualizada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao atualizar despesa. Tente novamente em alguns minutos.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($despesas_id, Request $request){
        $despesas = Despesa::find($despesas_id);

        $despesas->descricao = $request->descricao;
        $despesas->data = $request->data;
        $despesas->valor = $request->valor;
        $despesas->observacao = $request->observacao;

        if($request->hasFile('arquivo')){
            $name = Str::random(15). '.' . $request->arquivo->extension();
            $path = $request->arquivo->move('img/', $name, 'public');
            $despesas->arquivo = $path;
        }
        
        if($despesas->delete()){
            return redirect()->route('despesas.index', $despesas_id)->with('success', 'Despesa excluída com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Erro ao excluir despesa. Tente novamente em alguns minutos.')->withInput();
        }
    }
}
