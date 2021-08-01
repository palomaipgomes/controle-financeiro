@extends('layouts.default')

@section('stylesheets')
<style type="text/css">
    .thumbnail{
        width: 100%;
        height: 250px;
        background-size: cover;
        background-position: center;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')

<!-- Header container -->
<div class="container-fluid d-flex align-items-center">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a href="{{ route('contas.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div><br><br><br><br><br>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-2">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Editar Conta Bancária</h3>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('contas.update', $contas->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Informações da conta bancária</h6>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Nome do banco</label>
                                            <input type="text" id="banco" class="form-control form-control-alternative" name="banco" placeholder="Banco do Brasil" value="{{ old('banco', $contas->banco) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Agência</label>
                                            <input type="text" id="agencia" class="form-control form-control-alternative" name="agencia" placeholder="7368-0" value="{{ old('agencia', $contas->agencia) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Conta</label>
                                            <input type="text" id="conta" class="form-control form-control-alternative" name="conta" placeholder="37.972-0" value="{{ old('conta', $contas->conta) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Tipo da conta</label>
                                            <input type="text" id="tipo" class="form-control form-control-alternative" name="tipo" placeholder="Conta poupança ou Conta corrente" value="{{ old('tipo', $contas->tipo) }}">
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-primary">Alterar Conta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
