<div class="portlet-title">
    <div class="caption" style="margin-top: 10px; margin-bottom: 10px;"> 
        <span style="font-size: 20px;">Registros:</span>
        <a style="font-size: 20px;">{{ number_format($contador[0]->count_nit_de_la_entidad) }}</a>
    </div>
</div>
<div id="tabla_registros_api">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
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
        <tbody>
            @foreach ($datos as $d)
            <tr>
                <td>{{ $d->nivel_entidad }}</td>
                <td>{{ $d->nombre_de_la_entidad }}</td>
                <td>{{ $d->nit_de_la_entidad }}</td>
                <td>{{ $d->estado_del_proceso }}</td>
                <td>{{ $d->modalidad_de_contrataci_n }}</td>
                <td>{{ $d->objeto_a_contratar }}</td>
                <td>{{ $d->tipo_de_contrato }}</td>
                <td>{{ isset($d->fecha_de_firma_del_contrato) != '' ? $d->fecha_de_firma_del_contrato : '' }}
                </td>
                <td>{{ $d->numero_del_contrato }}</td>
                <td>{{ $d->numero_de_proceso }}</td>
                <td>{{ $d->valor_contrato }}</td>
                <td>{{ $d->nom_raz_social_contratista }}</td>
                <td>{{ $d->url_contrato }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>