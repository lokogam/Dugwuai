<div class="portlet-title">
    <div class="caption" style="margin-top: 10px; margin-bottom: 10px;"> 
        <span style="font-size: 20px;">Registros:</span>
        {{-- <a style="font-size: 20px;">{{ number_format($contador[0]->count_nit_de_la_entidad) }}</a> --}}
        <a style="font-size: 20px;" id="cont"></a>
    </div>
</div>
<div >
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="">id</th>
                <th class="">Nivel Entidad</th>
                <th class="">Nombre de entidad</th>
                <th class="">Nit de la entidad</th>
                <th class="">Estado del proceso</th>
                <th class="">Modalidad de contracion</th>
                <th class="">Objeto a contratar</th>
                <th class="">Tipo de contrato</th>
                <th class="">fecha de firma de contrato</th>
                <th class="">Numero de contrato</th>
                <th class="">Numero de proceso</th>
                <th class="">Valor contrato</th>
                <th class="">Non raz Social contratista</th>
                <th class="">URL</th>
            </tr>
        </thead>
        <tbody id="tabla_registros_api">
    </table>
</div>