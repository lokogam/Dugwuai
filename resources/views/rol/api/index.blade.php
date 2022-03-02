@include('layouts.heder')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Usuarios</h1>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="align-content-md-center">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Usuarios registrados</h5>
                                </div>
                                <div class="card-body " id="tableApi">
                                    @include('rol.api.table')
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" value="{{ $valI}}" id="paginationI"  >
                                    <input type="hidden" value="{{ $valS}}" id="paginationS"  >
                                    <button class="btn btn-secondary" onclick="paginationA()" >Anterior</button>
                                    <button class="btn btn-secondary"  onclick="paginationS()">Sigiente</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script>
    function paginationA(){
        var pagI = $("#paginationI").val();
        var pagS = $("#paginationS").val();
        pagI = pagI - pagS;
        console.log( pagI);

        var parametros = {
                    "valIn": pagI,
                    "paginate": 1
                };

            $.ajax({
                data: parametros,
                url: " {{ route('appi') }}",
                type: 'get',

                success: function(response) {
                    $("#tableApi").html(response);
                }
            });
        
    }

    function paginationS(){
        var pagI = $("#paginationI").val();
        var pagS = $("#paginationS").val();
        pagI = pagI + pagS;
        console.log( pagI);

        var parametros = {
                    "valIn": pagI,
                    "paginate": 2
                };

            $.ajax({
                data: parametros,
                url: " {{ route('appi') }}",
                type: 'get',

                success: function(response) {
                    $("#tableApi").html(response);
                }
            });
    }
</script>
@include('layouts.footer')