@extends('adminlte::page')

@section('title', 'Ingresar Paciente')

@section('content_header')
    <h1 class="bg-dark text-2xl text-center text-white rounded p-3">Ingresar Paciente</h1>
@stop

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form action="/pacientes" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-3 md:grid-cols-3 gap-3 md:gap-5 mt-2 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Nombre:</label>
                            <input name="names"
                                class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" required />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Apellido:</label>
                            <input name="lastnames"
                                class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" required />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">RUT - DNI:</label>
                            <input name="rut"
                                class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 md:grid-cols-3 gap-3 md:gap-5 mt-2 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Fecha de
                                Nacimiento:</label>
                            <input name="birthday"
                                class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="date" />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Telefono:</label>
                            <input name="telephone"
                                class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text" />
                        </div>
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Email:</label>
                            <input name="email"
                                class="py-2 px-3 rounded-lg border-2 border-blue-700 mr-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="email" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-3 md:gap-5 mt-2 mx-7">
                        <div class="grid grid-cols-1">
                            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold  ml-1">Anamnesis:</label>
                            <textarea
                                class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                name="anamnesis"></textarea>
                        </div>
                        <div class="grid grid-cols-1">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 font-semibold  mr-1">Observación:</label>
                            <textarea
                                class="py-2  px-3 rounded-lg border-2 border-blue-700 mt-1 ml-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                name="observacion"></textarea>
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
                                        block
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
                                        <svg class="w-10 h-10 text-blue-900 group-hover:text-blue-600" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
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
                                            <svg class="w-10 h-10 text-blue-900 group-hover:text-blue-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
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
                        <a href="pacientes.index"
                            class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                        <button type="submit"
                            class='w-auto bg-blue-900 hover:bg-blue-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- tailwindcss -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@stop

@section('js')
@stop