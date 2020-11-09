@extends('layouts.default')
@section('content')
<div class="card w-100 p-5 mt-3">
    <p class="h2">Editar Consulta</p>
    @if ($responseError)
    <div class="alert alert-danger">{{ $responseError }}</div>
    @endif
    <form method="post" action="{{ route('queries.update', $intervencion->Id_Consulta) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="Id_Paciente">ID del paciente:</label>
                    <select value="{{ old('Id_Paciente', $intervencion->Id_Paciente) }}" readonly type="text" class="form-control @error('Id_Paciente') danger @enderror" name="Id_Paciente" />
                        <option value="{{ old('Id_Paciente', $intervencion->Id_Paciente) }}" selected>
                            {{ $intervencion->Nombre_Persona . ' ' . $intervencion->Apellido_Uno . ' ' . $intervencion->Apellido_Dos}}
                        </option>
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
                    <select value="{{ old('Id_Unidad', $intervencion->Id_Unidad) }}" type="text" class="form-control @error('Id_Unidad') danger @enderror" name=" Id_Unidad">
                        @if($intervencion->Id_Unidad)
                        <option value="">Sin Asignar</option>
                        @else
                        <option value="" selected>Sin Asignar</option>
                        @endif
                        @foreach($units as $unity)
                        <option value="{{ $unity->Id_Unidad }}" {{ $intervencion->Id_Unidad == $unity->Id_Unidad ? 'selected' : '' }}>
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
                    <select multiple class="form-control @error('Id_Enfermedad') danger @enderror" name="enfermedades[]">
                        <option value="" @if(count($diseasesPatient)==0) selected @endif>Sin Asignar</option>
                        @foreach($diseases as $disease)
                        @php $isSelected = false; @endphp
                        @foreach($diseasesPatient as $diseasePatient)
                        @php
                        if($disease->Id_Enfermedad == $diseasePatient->Id_Enfermedad){
                        $isSelected = true;
                        break;
                        }
                        @endphp
                        @endforeach
                        <option value="{{ $disease->Id_Enfermedad }}" @if($isSelected) selected @endif>
                            {{ $disease->Nombre_Enfermedad }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- -->
            <!-- -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="descripcion">Descripcion de consulta</label>
                    <textarea class="form-control @error('Descripcion') danger @enderror" name="descripcion" rows="3">{{ old('Descripcion', $intervencion->Descripcion) }}</textarea>
                    @error('Descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- -->
        <!-- -->
        <!-- -->
        <div class="input_fields_wrap">
            @php $index = 0; @endphp
            @foreach($intervencionesConsultas as $intervencionConsulta)
            <div class="row" id="intervencion-{{ $index }}-row">
                <div class="col-12 col-sm-5">
                    <div class="form-group">
                        <label for="intervenciones[{{ $index }}][description]">Descripción:</label>
                        <input type="text" required value="{{ $intervencionConsulta->Tratamiento}}" class="form-control" name="intervenciones[{{ $index }}][description]" />
                    </div>
                </div>
                <div class="col-10 col-sm-5">
                    <div class="form-group">
                        <label for="intervenciones[{{ $index }}][id_tipo_intervencion]">Tipo de intervención</label>
                        @php $idTipoIntervencion = 0; @endphp
                        @foreach($tipoIntervencionesConsultas as $tipoIntervencionConsulta)
                        @php
                        if( $tipoIntervencionConsulta->Id_Tipo_Intervencion == $intervencionConsulta->Id_Tipo_Intervencion){
                        $idTipoIntervencion = $tipoIntervencionConsulta->Id_Tipo_Intervencion;
                        break;
                        }
                        @endphp
                        @endforeach
                        <select type="text" required class="form-control" name="intervenciones[{{ $index }}][id_tipo_intervencion]">
                            <option value="">Sin Asignar</option>
                            @foreach($tipoIntervencionesConsultas as $tipoIntervencionConsulta)
                            <option value="{{ $tipoIntervencionConsulta->Id_Tipo_Intervencion }}" {{ $tipoIntervencionConsulta->Id_Tipo_Intervencion == $intervencionConsulta->Id_Tipo_Intervencion ? 'selected' : '' }}>
                                {{ $tipoIntervencionConsulta->Nombre_Tipo_Intervencion }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center pt-3">
                    <div>
                        <button type="button" class="btn btn-danger button-click" data-intervencionId="{{ $index }}"> Eliminar</button>
                    </div>
                </div>
            </div>
            @php $index++; @endphp
            @endforeach
            <!-- -->
            <!-- -->
        </div>
        <div class="col-sm-12">
            <button class="btn btn-link btn-sm add_field_button" type="button">+ intervención</button>
        </div>
        <button type="submit" class="btn btn-primary">Añadir Consulta</button>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        const tipoIntervenciones = @json($interTypes);
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        let cantidadIntervenciones = @json(count($intervencionesConsultas));

        $('body').on('click', '.button-click', function(e) {
            let intervencionIndex = $(this).attr('data-intervencionId');
            $(`#intervencion-${intervencionIndex}-row`).remove();
            console.log(intervencionIndex);
        });

        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            //add input box
            let options = '<option value="">Sin Asignar</option>';
            tipoIntervenciones.forEach(element => {
                options += `<option value="${element.Id_Tipo_Intervencion}">${element.Nombre_Tipo_Intervencion}</option>`
            });
            var template = `
            <div class="row" id="intervencion-${cantidadIntervenciones}-row">
                <div class="col-12 col-sm-5">
                    <div class="form-group">
                        <label for="intervenciones[${cantidadIntervenciones}][description]">Descripción:</label>
                        <input type="text" required class="form-control" name="intervenciones[${cantidadIntervenciones}][description]" />
                    </div>
                </div>
                <div class="col-10 col-sm-5">
                    <div class="form-group">
                        <label for="intervenciones[${cantidadIntervenciones}][id_tipo_intervencion]">Tipo de intervención</label>
                        <select type="text" required class="form-control" name="intervenciones[${cantidadIntervenciones}][id_tipo_intervencion]">
                            ${options}
                        </select>
                    </div>
                </div>
                <div class="col-2 d-flex align-items-center pt-3">
                    <div>
                        <button type="button" class="btn btn-danger button-click" data-intervencionId="${cantidadIntervenciones}"> Eliminar</button>
                    </div>
                </div>
            </div>
            `;
            cantidadIntervenciones++;
            $(wrapper).append(template);
        });
    });
</script>
@stop
