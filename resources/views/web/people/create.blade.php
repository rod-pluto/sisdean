@extends('layouts.web')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-6 col-md-offset-3 col-lg-offset-3">

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('message') && Session::has('status') )
                <div class="alert alert-{{ Session::get('status') }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>@if(Session::get('status') == 'danger') Aviso! @else Sucesso! @endif</strong> {{ Session::get('message')}}.
                </div>
            @endif


            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="person-form" action="{{ route('web.pessoas.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group col-sm-7">
                            <label for="name">Nome Completo</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="birthdate">Data de Nascimento</label>
                            <input type="text" class="form-control" id="birthdate" name="birthdate" data-mask="00/00/0000" required>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="voterid">Título de Eleitor</label>
                            <input type="text" class="form-control" id="voterid" name="voterid" required>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="state">Estado</label>
                            <select class="form-control" id="state" name="state" required>
                                @foreach( $state as $e )
                                    <option value="{{ $e->Uf }}">{{ $e->Nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="city">Cidade</label>
                            <select class="form-control" id="city" name="city" required></select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="zipcode">Cep</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" data-mask="00000-000" required>
                        </div>
                        <div class="form-group col-sm-7">
                            <label for="street">Rua ( sem número )</label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" class="form-control" id="neighborhood" name="neighborhood" required>
                        </div>

                        <style>
                            canvas {
                                background-color: #ccc; 
                                width:480;
                                height: auto;
                            }
                        </style>
                        <div class="form-group col-sm-12">
                            <label for="signature_pad">Assinatura</label>
                            <div>
                                <canvas id="signature_pad" width="490"></canvas>
                                <input type="hidden" id="signature" name="signature" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="button" class="btn btn-block btn-default" id="btn-erase-signature">
                                Limpar
                            </button>
                            <button type="submit" class="btn btn-block btn-success" style="margin-top:6px">Enviar Informações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
    $.get('/endpoints/cidades/'+$('select[name="state"]').val())
         .done(function( response ){
             $('select[name="city"]').html( response );
         });


    var canvas = document.querySelector("canvas");
    var signaturePad = new SignaturePad(canvas);

    // Returns signature image as data URL (see https://mdn.io/todataurl for the list of possible parameters)
    $('#person-form #btn-erase-signature').click(function(){
        signaturePad.clear();
        document.getElementById('person-form').reset();
        $('#signature').val(null);

        // todo: duplicado, refatorar isso
        $.get('/endpoints/cidades/'+$('select[name="state"]').val())
         .done(function( response ){
             $('select[name="city"]').html( response );
         });
    });

    $('#person-form canvas').mouseup(function(){
        $('#signature').val( signaturePad.toDataURL() );
    });

    $('select[name="state"]').change(function(){
        $.get('/endpoints/cidades/'+$(this).val())
         .done(function( response ){
             $('select[name="city"]').html( response );
         });
    });
</script>
@stop