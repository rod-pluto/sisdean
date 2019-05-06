@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-5 col-md-offset-3 col-lg-offset-3">
            <div class="box box-solid with-border">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-fw fa-bar-chart"></i>
                        Gerar Relátorios Gerais
                    </h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.relatorios.gerar') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group col-sm-12">
                            <label for="exampleInputName2">Nome</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="exampleInputEmail2">Título de Eleitor</label>
                            <input type="email" class="form-control" name="voterid">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="exampleInputEmail2">Data de Nascimento</label>
                            <input type="date" class="form-control" name="birthdate">
                        </div>   
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail2">Data Inicial</label>
                            <input type="date" class="form-control" name="startdate">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="exampleInputEmail2">Data Final</label>
                            <input type="date" class="form-control" name="enddate">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="state">Estado</label>
                            <select class="form-control" id="state" name="state" >
                                <option value="" selected>Escolha algo</option>
                                @foreach( $state as $e )
                                    <option value="{{ $e->Uf }}">{{ $e->Nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="city">Cidade</label>
                            <select class="form-control" id="city" name="city" ></select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="zipcode">Cep</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" data-mask="00000-000" >
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="street">Rua ( sem número )</label>
                            <input type="text" class="form-control" id="street" name="street" >
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" class="form-control" id="neighborhood" name="neighborhood" >
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block">Gerar Relatório</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        $.get('/endpoints/cidades/'+$('select[name="state"]').val())
            .done(function( response ){
                $('select[name="city"]').html( response );
            })
            .fail(function(){
                $('select[name="city"]').html( '' );
            });

        $('select[name="state"]').change(function(){
            $.get('/endpoints/cidades/'+$(this).val())
            .done(function( response ){
                $('select[name="city"]').html( response );
            })
            .fail(function(){
                $('select[name="city"]').html( '' );
            });
        });
    </script>
@stop