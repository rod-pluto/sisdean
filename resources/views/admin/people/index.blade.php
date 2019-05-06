@extends('adminlte::page')

@section('content')
    <div class="box box-solid">
        <div class="box-body">
            <table id="people-table" class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Titulo de Eleitor</th>
                        <th>Aniversário</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->voterid }}</td>
                            <td>{{ ( \DateTime::createFromFormat('Y-m-d', $person->birthdate))->format('d-m-Y') }}</td>
                            <td>{{ $person->state }}</td>
                            <td>{{ $person->city }}</td>
                            <td>{{ $person->street }}</td>
                            <td>{{ $person->neighborhood }}</td>
                            <td class="text-right">
                                <a role="button" class="btn btn-xs btn-default" href="{{ route('admin.pessoas.show', ['id' => $person->id]) }}">
                                    <i class="fa fa-fw fa-edit"></i>ver
                                </a>
                                <button class="btn btn-xs btn-danger" onclick="deletePerson({{ $person->id }})">
                                    <i class="fa fa-fw fa-trash"></i>apagar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <form id="delete-person-form" action="" method="POST">{{ csrf_field() }} {{ method_field('DELETE') }}</form>
@stop

@section('js')
    <script>
        $('#people-table').DataTable({
                'language': {
                'url': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
            }
        });

        function deletePerson( id ) {
            if ( confirm('Você tem certeza dessa ação ?') ) {
                var url = '/admin/pessoas/' + id;
                $('#delete-person-form').attr('action', url);
                $('#delete-person-form').submit();
            }
        }
    </script>
@stop
