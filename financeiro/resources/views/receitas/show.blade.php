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
            <a href="{{ route('receitas.index') }}" class="btn btn-primary">Voltar</a>
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
                            <h3 class="mb-0">Visualizar Receita</h3>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('receitas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Informações da Receita</h6>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Descrição da Receita</label>
                                            <input type="text" id="descricao" class="form-control form-control-alternative" name="descricao" placeholder="Descrição" value="{{ $receitas->descricao }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Data</label>
                                            <input type="date" id="data" class="form-control form-control-alternative" name="data" placeholder="" value="{{ $receitas->data }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Valor</label>
                                            <input type="float" id="valor" class="form-control form-control-alternative" name="valor" placeholder="33.55" value="{{ $receitas->valor }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_title">Observação</label>
                                            <input type="text" id="observacao" class="form-control form-control-alternative" name="observacao" placeholder="observacao" value="{{ $receitas->observacao }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex  justify-content-center">
                                            <div class="image-hover">
                                                <img id="example_img_source" src="{{ asset($receitas->arquivo) }}" class="img-fluid">
                                                <div class="middle">
                                                    <input type="file" class="d-none" id="img_source" onchange="changeImage(this)" name="arquivo">
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="text-center" for="img_source">Foto Comprovante</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    function uploadImage(){
        $('#img_source').click();
    }

    function changeImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_source_preview')
                    .attr('src', e.target.result)
                    .width('auto')
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
