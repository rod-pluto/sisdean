@extends('adminlte::page')

@section('content')
<div class="box box-solid">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-7 col-lg-7">
                            <dl>
                                <dt>Nome Completo:</dt>
                                <dd>{{ $person->name }}</dd><br/>
        
                                <dt>Data de Nascimento:</dt>
                                <dd>{{ $person->birthdate }}</dd><br/>

                                <dt>Título de Eleitor:</dt>
                                <dd>{{ $person->voterid }}</dd><br/>
        
                                <dt>Estado:</dt>
                                <dd>{{ $person->state }}</dd><br/>
                            </dl>
                        </div>
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <dl>
                                <dt>Cidade:</dt>
                                <dd>{{ $person->city }}</dd><br/>
            
                                <dt>Rua:</dt>
                                <dd>{{ $person->street }}</dd><br/>
            
                                <dt>Bairro:</dt>
                                <dd>{{ $person->neighborhood }}</dd><br/>
            
                                <dt>CEP:</dt>
                                <dd>{{ $person->zipcode }}</dd>
                            </dl>
                        </div>
                    </div>
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
@stop