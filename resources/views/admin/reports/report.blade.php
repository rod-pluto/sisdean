@extends('adminlte::page')

@section('content')
<div class="box box-solid">
        <div class="box-body">
            <table id="report-table" class="table table-bordered table-condensed table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Titulo de Eleitor</th>
                        <th>Aniversário</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Rua</th>
                        <th>Bairro</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
        $('#report-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@stop