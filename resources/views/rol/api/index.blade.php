@include('layouts.heder')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">api</h1>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="align-content-md-center">
                            <div class="card flex-fill">
                                <div class="card-header">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Filtro Nivel Entidad</label>
                                                <select class="select2 form-control" id="nivel_entidad"
                                                    onchange="filtrosE()">
                                                    <option value=""></option>
                                                    <option>Territorial</option>
                                                    <option>Nacional</option>
                                                    <option>TERRITORIAL</option>
                                                    <option>NACIONAL</option>
                                                    <option>No Definido</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Palabra clave</label>
                                                <input type="text" class="select2 form-control" id="source"
                                                    onchange="filtrosE()">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"><br>
                                                <input type='button' class="btn btn-info" onclick="reiniciarFiltros()"
                                                    value="Reiniciar Filtros">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body " id="div-tabla">
                                    @include('rol.api.table')
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" value="100" id="pagination">

                                    <button class="btn btn-secondary" onclick="pagination(1)"
                                        id="btnA">Anterior</button>
                                    <button class="btn btn-secondary" onclick="pagination(2)"
                                        id="btnS">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
window.onload = filtrosE;

function filtrosE(){
    // var pag = $("#pagination").val();
    var nivel_entidad = $("#nivel_entidad").val();
    var source = $("#source").val();
    var filtrof = "";
    var link = "https://www.datos.gov.co/resource/rpmr-utcd.json?";

    if (nivel_entidad != "") {
        filtrof += "&nivel_entidad=" + nivel_entidad;
        link += filtrof;
        mostarDatos(link);
        cont(link);
    }
    else{
        mostarDatos(link);
        cont(link);
    }
}

function mostarDatos(link){
    var pag = $("#pagination").val();
    $.ajax({
        url: link,
        type: "GET",
        data: {
            // filtrof,
            "$limit" : 100,
            "$offset" : pag,
            // "$where" : "Activo",
            "$$app_token" : "LtsohJslsewBjbllw3kep7R42",
        }
    })
    .done(function(data) {
    // console.log(data);
    // console.log(Object.keys(data));
        var i;
        var html = "";
        for(i=0; i<data.length; i++){
            html += '<tr>' +
                // '<td>' + i + '</td>' +
                '<td>' + data[i].nivel_entidad  + '</td>' +
                '<td>' + data[i].nombre_de_la_entidad+ '</td>' +
                '<td>' + data[i].nit_de_la_entidad  + '</td>' +
                '<td>' + data[i].estado_del_proceso + '</td>' +
                '<td>' + data[i].modalidad_de_contrataci_n + '</td>' +
                '<td>' + data[i].objeto_a_contratar + '</td>' +
                '<td>' + data[i].tipo_de_contrato + '</td>' +
                '<td>' + data[i].fecha_de_firma_del_contrato+ '</td>' +
                '<td>' + data[i].numero_del_contrato + '</td>' +
                '<td>' + data[i].numero_de_proceso  + '</td>' +
                '<td>' + data[i].valor_contrato  + '</td>' +
                '<td>' + data[i].nom_raz_social_contratista + '</td>' +
                '<td>' + data[i].url_contrato + '</td>' +
                '</tr>';
        }
            $('#tabla_registros_api').html(html);
    });
        
        noAnte();
}

function cont(link){
    $.ajax({
        url: link,
        type: "GET",
        data: {
            "$select" : "count(nit_de_la_entidad)",
            "$$app_token" : "LtsohJslsewBjbllw3kep7R42"
        }
    })
    .done(function(data){
        var html1 = "";
        html1 +=  data[0].count_nit_de_la_entidad;
        $('#cont').html(html1);
        // console.log(data);
    });
}

function noAnte() {
    if (document.getElementById('pagination').value <= 100) {
        document.getElementById('btnA').disabled = true;
    }else{
        document.getElementById('btnA').disabled = false;
    }
}

function pagination(direc) {
    var pag = $("#pagination").val();

    if(direc == 1){
        var pag = $("#pagination").val(pag-100);
    }else if(direc == 2){
        var pag = $("#pagination").val(parseInt(pag,10)+100);
    }
    filtrosE();
    noAnte();
}
function reiniciarFiltros() {
    var nivel_entidad = $("#nivel_entidad").val('');
    var source = $("#source").val('');
    var parametros = {
        "nivel_entidad" : '',            
        "source" : '',            
        "filtro": 1
    };
    filtrosE();
}

</script>

@include('layouts.footer')