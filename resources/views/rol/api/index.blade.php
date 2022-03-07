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
                                                    onchange="tabla()">
                                                    <option value=""></option>
                                                    <option>Territorial</option>
                                                    <option>Nacional</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Palabra clave</label>
                                                <input type="text" class="select2 form-control" id="source"
                                                    onchange="tabla()">
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
    // window.onload = noAnte;
    window.onload = mostarDatos;

function mostarDatos(){
    $.ajax({
        url: "https://www.datos.gov.co/resource/rpmr-utcd.json",
        type: "GET",
        data: {
            "$limit" : 5,
            "$$app_token" : "LtsohJslsewBjbllw3kep7R42"
        }
    })
    .done(function(data) {
        console.log(data);
        console.log(Object.keys(data));
            var i;
            var html = "";
            for(i=0; i<data.length; i++){
                html += '<tr>' +
                    '<td>' + i + '</td>' +
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
            cont();
    
}

function cont(){
    $.ajax({
        url: "https://www.datos.gov.co/resource/rpmr-utcd.json?",
        type: "GET",
        data: {
            "$select" : "count(nit_de_la_entidad)",
            // "$limit" : ,
            "$$app_token" : "LtsohJslsewBjbllw3kep7R42"
        }
    })
    .done(function(data){
        var html = "";
        html +=  data[0].count_nit_de_la_entidad;
        $('#cont').html(html);
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

    var nivel_entidad = $("#nivel_entidad").val();
    var source = $("#source").val();

    var fecha_desde = $("#fecha_desde").val();
    // var fecha_hasta = $("#fecha_hasta").val();

    if(direc == 1){
        var pag = $("#pagination").val(pag-100);
    }else if(direc == 2){
        var pag = $("#pagination").val(parseInt(pag,10)+100);
    }

    var parametros = {
        "pag": pag.val(),
        "nivel_entidad": nivel_entidad,
        "source": source,
        "fecha_desde": fecha_desde,
        // "fecha_hasta": fecha_hasta,
        "filtro": 1
    };

    $.ajax({
        data: parametros,
        url: "appi",
        type: 'get',

        success: function(response) {
            $("#div-tabla").html(response);
        }
    });

    noAnte();
}

function tabla() {
    var pag = $("#pagination").val();

    var nivel_entidad = $("#nivel_entidad").val();
    var source = $("#source").val();
    

    var fecha_desde = $("#fecha_desde").val();
    // var fecha_hasta = $("#fecha_hasta").val();

    // if (fecha_desde != "") {
    //     if (fecha_hasta == "") {
    //         $('#fecha_hasta').focus();
    //         return;
    //     }
    // }

    // if (fecha_hasta != "") {
    //     if (fecha_desde == "") {
    //         $('#fecha_desde').focus();
    //         return;
    //     }
    // }

    var parametros = {
        "pag": pag,
        "nivel_entidad": nivel_entidad,
        "source": source,
        "fecha_desde": fecha_desde,
        // "fecha_hasta": fecha_hasta,
        "filtro": 1
    };

    $.ajax({
        data: parametros,
        url: "appi",
        type: 'get',

        success: function(response) {
            $("#div-tabla").html(response);
        }
    });
}

function reiniciarFiltros() {
    var nivel_entidad = $("#nivel_entidad").val('');
    var source = $("#source").val('');
    

    var parametros = {
        "nivel_entidad" : '',            
        "source" : '',            
        "filtro": 1
    };

    $.ajax({
        data: parametros,
        url: "appi",
        type: 'get',

        success: function(response) {
            $("#div-tabla").html(response);
        }
    });
}

</script>

@include('layouts.footer')