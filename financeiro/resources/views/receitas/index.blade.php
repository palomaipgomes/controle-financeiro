@extends('layouts.default')

@section('stylesheets')
<style type="text/css">
    .btn-circle {
        padding: 7px 10px;
        border-radius: 50%; 
        font-size: 1rem;
    }
</style>
@endsection

@section('content')
<!-- Header -->

<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-1">Receitas</h3>
                            <h5 class="mb-0">Receita total do mês: R$ {{ number_format($receitaMes, 2, ',','.') }}</h5>
                        </div>
                        <div class="col">
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('receitas.create') }}"><i class="fas fa-plus mr-2"></i> Nova Receita </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Descrição</th>
                                <th scope="col">Atualizado em</th>
                                <th scope="col" class="actions-th">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($receitas as $receita)
                            <?php
                                $delete_action = route('receitas.destroy', $receita->id);
                            ?>
                            <tr>
                                <td>
                                    {{ $receita->descricao }}
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i:s', strtotime($receita->updated_at)) }}
                                </td>
                                <td class="actions-td">
                                    <a href="{{ route('receitas.show', $receita->id) }}" class="btn btn-primary btn-circle" role='button'><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('receitas.edit', $receita->id) }}" class="btn btn-info btn-circle" role='button'><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#!" data-toggle="modal" data-target="#delete_modal" onclick="update_delete_form_action('{{ $delete_action }}')" class="btn btn-danger btn-circle" role='button'><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th scope="row" colspan="6">
                                    Nenhuma receita cadastrada.
                                </th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="" id="delete_form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title">Apagar Receita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja apagar a receita?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function update_delete_form_action(action){
            $("#delete_form").attr('action', action);
        }
    </script>
@endsection
