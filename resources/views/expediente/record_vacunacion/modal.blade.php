<!-- Modal unicamente para mostrar informacion y para el borrar-->
<div id="modal_record" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar record de vacunacion</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <form action="/record" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input name="expediente_id" type="text" value="{{ $datos['expediente']->id }}" hidden>
                    <div class="form-group">
                        <label for="vacuna_id">Vacuna:</label>
                        <div class="form-group">
                            <select class="form-control" name="vacuna_id" id="form-vacuna" required>
                                @foreach ($datos['vacunas'] as $vacuna)
                                    @foreach ($datos['especie_vacunas'] as $especie_vacuna)
                                        @if ($especie_vacuna->vacuna_id == $vacuna->id)
                                            <option value="{{ $vacuna->id }}">{{ $vacuna->nombreVacuna }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Por favor ingrese un dato válido
                            </div>
                            <div class="valid-feedback">
                                Dato válido
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <div class="form-group">
                            <input class="form-control" type="date" name="fecha" id="form-fecha" required>
                            <div class="valid-feedback">
                                Fecha correcta
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese una fecha válida
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso:</label>
                        <div>
                            <input class="form-control" type="number" name="peso" id="form-peso" min="1"
                                step="0.1">
                            <div class="valid-feedback">
                                Dato valido
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese un peso válido
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="refuerzo">Refuerzo:</label>
                        <div>
                            <input class="form-control" type="date" name="refuerzo" id="form-refuerzo" required>
                            <div class="valid-feedback">
                                Fecha correcta
                            </div>
                            <div class="invalid-feedback">
                                Por favor ingrese una fecha válida
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="contenedor-botones">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    @can('crear-RecordVacunacion')
                        <input type="submit" class="btn btn-success" value="Guardar">
                    @endcan
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- <div class="record-space_modal none">
    <div class="record-modal">
        <h4>Record de vacunacion</h4>
        <form action="/record" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            @csrf
            <input name="expediente_id" type="text" value="{{$datos['expediente']->id}}" hidden>
            <div class="form-group">
                <label for="vacuna_id">Vacuna:</label>
                <div class="form-group">
                    <select class="form-control" name="vacuna_id" id="form-vacuna" required>
                        @foreach ($datos['vacunas'] as $vacuna)
                            @foreach ($datos['especie_vacunas'] as $especie_vacuna)
                                @if ($especie_vacuna->vacuna_id == $vacuna->id)
                                    <option value="{{$vacuna->id}}">{{$vacuna->nombreVacuna}}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Por favor ingrese un dato válido
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <div class="form-group">
                    <input class="form-control" type="date" name="fecha" id="form-fecha" required>
                    <div class="valid-feedback">
                        Fecha correcta
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <div>
                    <input class="form-control" type="number" name="peso" id="form-peso" min="1" step="0.1">
                    <div class="valid-feedback">
                        Dato validp
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="refuerzo">Refuerzo:</label>
                <div>
                    <input class="form-control" type="date" name="refuerzo" id="form-refuerzo" required>
                    <div class="valid-feedback">
                        Fecha correcta
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>
                </div>
            </div>
            <div class="contenedor-botones">
                <div id="modal-cerrar" class="btn btn-danger">Cerrar</div>
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </form>
    </div>
</div> --}}
