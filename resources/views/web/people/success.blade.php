@extends('layouts.web')

@section('content')
    <div class="jumbotron text-center">
        <h1>Cadastro realizado com sucesso!</h1>
        <p>Agradecemos pelo seu tempo e seu apoio</p>
    </div>

    @if( Session::has('person'))
        @php $person = Session::get('person') @endphp
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-5 col-lg-5">
                            <dl>
                                    <dt>Nome Completo:</dt>
                                    <dd>{{ $person->name }}</dd>
                                    <dt>Data de Nascimento:</dt>
                                    <dd>{{ $person->birthdate }}</dd>
                                    <dt>Título de Eleitor:</dt>
                                    <dd>{{ $person->voterid }}</dd>
                                    <dt>Estado:</dt>
                                    <dd>{{ $person->state }}</dd>
                                    <dt>Cidade:</dt>
                                    <dd>{{ $person->county }}</dd>
                                    <dt>Rua:</dt>
                                    <dd>{{ $person->street }}</dd>
                                    <dt>Bairro:</dt>
                                    <dd>{{ $person->neighborhood }}</dd>
                                    <dt>CEP:</dt>
                                    <dd>{{ $person->zipcode }}</dd>
                                </dl>
                    </div>
                    <div class="col-sm-4 col-md-7 col-lg-7">
                        <dl>
                                <dt>Assinatura:</dt>
                                <dd>
                                    <img src="{{ $person->signature }}">
                                </dd>
                            </dl>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    @endif 
@stop