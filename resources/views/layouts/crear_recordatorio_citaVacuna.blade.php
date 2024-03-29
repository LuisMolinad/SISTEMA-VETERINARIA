<br>
<center>
    <h5>Recordatorio</h5>
</center>
<br>
<section class="recordatorio_crear_seccion">
    <div class="form-row">
        <div class="form-group col-md-6">
            <strong> <label for="ConceptoCirugia" style="color:black">Anticipacion:</label></strong>
            <select name="dias_de_anticipacion" class="form-control" id="dias_de_anticipacion"
                onclick="actualizar_mensaje_al_crear_vacuna();">
                <option value="0">No, no deseo un recordatorio</option>
                <option value="1">1 dias de anticipacion</option>
                <option value="2">2 dias de anticipacion</option>
                <option value="3">3 dias de anticipacion</option>
            </select>
            <div class="invalid-feedback">
                <!--Validacion -->
                Por favor ingrese información sobre el concepto de cirugía
            </div>
            <div class="valid-feedback">
                Dato válido sobre concepto de cirugía
            </div> <!-- Fin de la validacion -->
        </div>

        <div class="form-group col-md-6">
            <strong> <label style="color:black">Pre visualizacion del mensaje</label></strong>
            <div id="mensaje-recordatorio">
                <div id="mensaje-recordatorio-limpieza">
                </div>
            </div>
        </div>
</section>
