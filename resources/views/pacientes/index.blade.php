@extends('adminlte::page')

@section('title', 'Sistema de Pacientes')

@section('content_header')
    <h1 class="bg-dark text-2xl text-center text-white rounded p-3">Sistema de Pacientes</h1>
@stop

@section('content')
    <a href="pacientes/create"><i class='fas fa-plus-circle' style='font-size:48px;color:#000'></i></a>
    <br>
    <br>
    <table id="example" class="table table-striped table-bordered rounded" style="width:100%">
        <thead class="bg-dark text-white text-center">
            <tr>
                <th>Confirmar</th>
                <th>Planilla - Paciente - Confirmar</th>
                <th>RUT - DNI</th>
                <th>Edad</th>
                <th>Telefono</th>
                <th>Ingresó</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes"
                                checked>
                            {{--  <label class="form-check-label" for="mySwitch">Dark Mode</label>  --}}
                        </div>
                    </td>
                    <td>
                        {{-- planilla --}}
                        <a href="" class="btn btn-outline-dark p-1" title="Informar">
                            <svg class="h-8 w-8 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </a>&nbsp;&nbsp;&nbsp;
                        {{-- nombres --}}
                        {{ $paciente->names }} {{ $paciente->lastnames }}&nbsp;&nbsp;&nbsp;

                        {{-- <td><img src="/FotosPerfil/{{ $paciente->foto }}" width="30%"> </td> --}}


                    <td>{{ $paciente->rut }}</td>
                    <td>{{ $paciente->birthday }}</td>
                    <td>{{ $paciente->telephone }}</td>
                    <td>{{ $paciente->created_at->format('d-m-Y') }}</td>
                    <td>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <a href="/pacientes/{{ $paciente->id }}/edit" class="btn btn-outline-dark"><i
                                    class='fas fa-edit' style='font-size:24px;color:rgb(5, 11, 61)'></i></a> -

                            <button type="submit" class="btn btn-outline-dark"><i class='fas fa-trash-alt'
                                    style='font-size:24px;color:rgb(177, 6, 0)'></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tfoot>
    </table>
    <livewire:pacientes-consulta>
    @endsection

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        <link rel="stylesheet" href=" https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        <!-- tailwindcss -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({

                    "lengthMenu": [
                        [5, 10, 50, -1],
                        [5, 10, 50, "All"]
                    ]
                });
            });
        </script>    
    @stop
