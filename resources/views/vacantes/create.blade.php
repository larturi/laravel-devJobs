@extends('layouts.app')

@section('styles')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')

    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form class="max-w-lg mx-auto my-10" action="">

        {{-- Titulo --}}
        <div class="mb-3">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">
                Vacante:
            </label>
            <input id="titulo"
                   type="text"
                   class="p-3 bg-white rounded form-input w-full @error('titulo') is-invalid @enderror"
                   name="titulo" value="{{ old('titulo') }}"
                   autocomplete="titulo" autofocus>
        </div>

        {{-- Categoria --}}
        <div class="mb-3">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">
                Categoria:
            </label>
            <select name="categoria"
                    id="categoria"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Experiencia --}}
        <div class="mb-3">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">
                Experiencia:
            </label>
            <select name="experiencia"
                    id="experiencia"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($experiencias as $experiencia)
                            <option value="{{ $experiencia->id }}">
                                {{ $experiencia->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Ubicacion --}}
        <div class="mb-3">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">
                Ubicación:
            </label>
            <select name="ubicacion"
                    id="ubicacion"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($ubicaciones as $ubicacion)
                            <option value="{{ $ubicacion->id }}">
                                {{ $ubicacion->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Salario --}}
        <div class="mb-3">
            <label for="salario" class="block text-gray-700 text-sm mb-2">
                Salario:
            </label>
            <select name="salario"
                    id="salario"
                    class="block appearance-none w-full border
                          border-gray-200 text-gray-700
                          rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500
                          p-3 bg-gray-100">
                          <option disabled selected value="">- Selecciona -</option>

                          @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">
                                {{ $salario->nombre }}
                            </option>
                          @endforeach
            </select>
        </div>

        {{-- Editor --}}
        <div class="mb-3">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                Descripción del Puesto:
            </label>

            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>

            <input type="hidden" name="descripcion" name="descripcion">

        </div>

        {{-- DropZone --}}
        <div class="mb-3">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                Imagen:
            </label>

            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>

            <input type="hidden" name="imagen" id="imagen">

            <p id="errorUploadDropzone"></p>

        </div>

        {{-- Habilidades --}}
        <div class="mb-3">
            <label for="skills" class="block text-gray-700 text-sm mb-2">
                Habilidades:
            </label>

            {{-- @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp --}}

            <lista-skills :skills="{{ json_encode($skills) }}">

            </lista-skills>

        </div>

        {{-- Boton --}}
        <button type="submit"
                class="bg-teal-500 w-full hover:bg-teal-700
                text-gray-100 p-3 mt-4 focus:outline-none
                focus:shadow-outline uppercase font-bold">
            Publicar Vacante
        </button>

    </form>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.js" integrity="sha512-aCPwYkaP9S5CeLKGxJDPs1soJuQd+Dza60RzTsXRDzexppY0U25fSyCuPlOo8HH9kIuVS6uSunEMI4OG96+4gg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
    <script>

        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', () => {

            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor',
                    'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',
                    'orderList', 'unorderList', 'h2', 'h3'
                    ],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Escribe aqui la descripción del puesto'
                }
            });

            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: '/vacantes/imagen',
                dictDefaultMessage: 'Sube aqui tu imagen',
                dictRemoveFile: 'Eliminar archivo',
                addRemoveLinks: true,
                maxFiles: 1,
                acceptedFiles: '.png, .jpg, .jpeg, .gif, .bmp',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                success: function(file, response) {
                    document.querySelector('#errorUploadDropzone').textContent = '';
                    console.log(response);

                    // Coloca la respuesta del servidor en el input hidden
                    document.querySelector('#imagen').value = response.correcto;
                    file.nombreservidor = response.correcto;
                },
                maxfilesexceeded: function(file) {
                    if(this.files[1] !== null) {
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                removedfile: function(file, response) {

                    file.previewElement.parentNode.removeChild(file.previewElement);
                    params = {
                        imagen: file.nombreservidor
                    };

                    axios.post('/vacantes/borrarimagen', params)
                        .then(respuesta => console.log(respuesta))
                }
            });

        });
    </script>

@endsection
