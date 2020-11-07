@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Crear Consulta</p>
    @if ($responseError)
    <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('queries.store') }}">
        @csrf
        <!-- -->
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Id_Paciente">ID del paciente:</label>
                    <select value="{{ old('Id_Paciente') }}" type="text"
                        class="form-control @error('Id_Paciente') danger @enderror" name="Id_Paciente" />
                    <option value="" selected>Sin Asignar</option>
                    @foreach($patients as $patient)
                    <option value="{{ $patient->Id_Paciente }}">
                        {{ $patient->Id_Paciente . ' - ' . 'Cedula: ' .  $patient->Cedula_Persona}}
                    </option>
                    @endforeach
                    </select>
                    @error('Id_Paciente')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        <!-- -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Id_Unidad">Unidad</label>
                    <select value="{{ old('Id_Unidad') }}" type="text"
                        class="form-control @error('Id_Unidad') danger @enderror" name=" Id_Unidad">
                        <option value="" selected>Sin Asignar</option>
                        @foreach($units as $unity)
                        <option value="{{ $unity->Id_Unidad }}">
                            {{ $unity->Nombre_Unidad }}
                        </option>
                        @endforeach
                    </select>
                    @error('Id_Unidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- -->
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="enfemedades[]">Enfermedad</label>
                    <select multiple type="text"
                        class="form-control @error('Id_Enfermedad') danger @enderror" name="enfermedades[]">
                        <option value="" selected>Sin Asignar</option>
                        @foreach($diseases as $disease)
                        <option value="{{ $disease->Id_Enfermedad }}">
                            {{ $disease->Nombre_Enfermedad }}
                        </option>
                        @endforeach
                    </select>
                    @error('Id_Enfermedad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="descripcion">Descripcion de consulta</label>
                    <textarea value="{{ old('descripcion') }}" type="text"
                        class="form-control @error('descripcion') danger @enderror" name="descripcion"> </textarea>
                    @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- -->
        <!-- -->
        <!-- -->
        <div class="row input_fields_wrap">
            <!-- -->
            <!-- -->
        </div>
        <div class="col-sm-12">
            <button class="btn btn-link btn-sm add_field_button" type="button">+  intervención</button>
        </div>
</div>
</fieldset>
<br>
</div>
<!-- -->
<!-- -->
<!-- -->
<button type="submit" class="btn btn-primary">Añadir Consulta</button>
</form>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        const tipoIntervenciones = @json($interTypes);
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        let cantidadIntervenciones = 0;

        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            //add input box
            let options = '<option value="">Sin Asignar</option>';
            tipoIntervenciones.forEach(element => {
                options += `<option value="${element.Id_Tipo_Intervencion}">${element.Nombre_Tipo_Intervencion}</option>`
            });
            var template = ` 
    <div class="col-12 col-sm-6">
    <div class="form-group">
        <label for="intervenciones[${cantidadIntervenciones}][description]">Descripción:</label>
        <input type="text" class="form-control" name="intervenciones[${cantidadIntervenciones}][description]" />
    </div>
    </div>
        <div class="col-12 col-sm-6">
        <div class="form-group">
                <label for="intervenciones[${cantidadIntervenciones}][id_tipo_intervencion]">Tipo de intervención</label>
                <select type="text" required class="form-control" name="intervenciones[${cantidadIntervenciones}][id_tipo_intervencion]">
                    ${options}             
                </select>
        </div>
        </div>
`;
            cantidadIntervenciones++;
            $(wrapper).append(template);
        });
    });
</script>
@stop