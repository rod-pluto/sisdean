@extends('adminlte::page')

@section('content')

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

    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Perfil de usuário</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('admin.profile.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="name">Nome do usuário</label>
                        <input type="text" 
                               class="form-control obrigatorio" 
                               placeholder="Name do usuário"
                               name="name"
                               value="{{ $usuario->name }}"
                        >
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="email">Email</label>
                        <input type="email" 
                               id="email" 
                               class="form-control obrigatorio" 
                               placeholder="usuario@email.com.br"
                               name="email"
                               value="{{ $usuario->email }}"
                        >
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="password">Senha</label>
                        <input type="password" 
                               id="password" 
                               class="form-control obrigatorio" 
                               name="password"
                        >
                    </div>
                </div>

                <div class="text-right">
                    <button type="button" class="btn btn-danger"
                        onclick="javascript:history.back()"
                    >
                        <i class="fa fa-fw fa-close"></i>
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-fw fa-check"></i>
                        Atualizar informações
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('select.form-control').select2();
        });
    </script>
@stop
