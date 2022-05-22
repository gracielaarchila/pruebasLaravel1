@extends('adminlte::page')

@section('title', 'Editar Paciente')

@section('content_header')
    <h1 class="bg-dark text-2xl text-center text-white rounded p-3">Editar Paciente</h1>
@stop

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <form action="/pacientes/{{ $paciente->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-3 md:grid-cols-3 gap-3 md:gap-5 mt-2 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Nombre:</label>
                <input name="names"
                    class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text"  value="{{$paciente->names }}" required />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Apellido:</label>
                <input name="lastnames"
                    class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text"  value="{{$paciente->lastnames }}" required />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">RUT - DNI:</label>
                <input name="rut"
                    class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text"  value="{{$paciente->rut }}" required />
            </div>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-3 gap-3 md:gap-5 mt-2 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Fecha de
                    Nacimiento:</label>
                <input name="birthday"
                    class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="date"  value="{{$paciente->birthday }}" />
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Telefono:</label>
                <input name="telephone"
                    class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="text"   value="{{$paciente->telephone }}"/>
            </div>
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Email:</label>
                <input name="email"
                    class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="email"   value="{{$paciente->email }}"/>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-2 gap-3 md:gap-5 mt-2 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Anamnesis:</label>
                <textarea
                    class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    name="anamnesis">  "{{$paciente->anamnesis }}"</textarea>
            </div>
            <div class="grid grid-cols-1">
                <label
                    class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Observación:</label>
                <textarea
                    class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    name="observacion">  "{{$paciente->observacion }}"</textarea>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-2 gap-3 md:gap-5 mt-2 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Fecha Consulta:</label>
                <input name="consulta"
                    class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    type="date"  value="" />
            </div>
            <div class="grid grid-cols-1">
                <label
                    class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Asignar a:</label>

                          <select class="form-select appearance-none
                          py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                              <option selected>Dr(a). </option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                          </select>
            </div>
        </div>
        <!-- Para ver la imagen seleccionada, de lo contrario no se -->
        <div class="grid grid-cols-1 mt-5 mx-7">
            <img id="imagenSeleccionada" style="max-height: 300px;">
        </div>
        {{-- ingresar foto y anexos --}}
        <div class="grid grid-cols-2 md:grid-cols-2 gap-3 md:gap-5 mt-2 mx-7">
            <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Foto del Paciente: (*pdf, *jpg, *png)</label>

                <div class='flex items-center justify-center w-full'>
                    <label
                        class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-700 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                            <img src="/FotosPerfil/{{ $paciente->foto }}" class="round" width="10%">
                            <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                Foto Perfil del Paciente</p>
                        </div>
                        <input name="foto" id="foto" type='file' class="hidden" />
                    </label>
                </div>

            </div>
            <div class="grid grid-cols-1">
                <label
                    class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Anamnesis Adjunta: (*pdf, *jpg, *png)</label>
                    <div class='flex items-center justify-center w-full'>
                        <label
                            class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-blue-700 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                                <img src="/anamnesis/{{ $paciente->anexo }}"  width="10%">
                                <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                    Anamnesis del Paciente</p>
                            </div>
                            <input name="anamnesis" id="anamnesis" type='file' class="hidden" />
                        </label>
                    </div>
            </div>
        </div>
        {{--  fin ingresar foto y anexos  --}}



        <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
            <a href="/pacientes"
                class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
            <button type="submit"
                class='w-auto bg-blue-900 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Modificar</button>
        </div>

    </form>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- tailwindcss -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
@stop
