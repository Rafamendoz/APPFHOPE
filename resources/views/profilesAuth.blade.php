@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item"><a href="{{route('Usuarios')}}">Autorizacion de Aplicaciones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Perfiles</li>
  </ol>
</nav>
                    <!-- DataTales Example -->
                
                    <div class="row">

                        <div class="col-md-8" id="idCapaPermisos" hidden>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <h5 class=" font-weight-bold text-primary">Permisos</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form>
                                          


                                            
                                            <div class="row mb-3" id="divIntentos">
                                               
                                            </div>


                                    
                                            
                                            <div class="row m-3">
                                                <button type="button" onclick="ActualizarPermisos()" class="btn btn-primary">Guardar Cambios</button>
                                            </div>

                                            
                                        </form>
                                    
                                    </div>
                                    
                                </div>
                        </div>

                        <div class="col-md-4">
                       ` <div class="card-body">

                            <div class="row">
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-primary">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center bg-primary">
                                            </div>
                                        </div>

                                        <div class="card-body bg-white">
                                                <div class="row p-2">
                                                    
                                                        <div class="col-sm-12">
                                                            <form>
                                                            
                                                                <div class="row mb-3">
                                                                    <label for="intentos" class="col-sm-4 col-form-label">Profile:</label>
                                                                    <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="profilename">
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="row">
                                                                    
                                                                    <div class="col-sm-6">
                                                                        <button type="button" onclick="Buscar()" class="btn btn-primary">Buscar</button>    
                                                                    </div>  
                                                                    <div class="col-sm-6">
                                                                        <button type="button" onclick="Cancelar()" class="btn btn-danger">Cancelar</button>    
                                                                    </div> 
                                                                </div>   

                                                                
                                                        
                                                            </form> 
                                                        </div>
                                                    
                                                </div>

                                        
                                        </div>
                                    
                                        
                                        
                                </div>
                            </div>

                            <div class="row" id="idCapaAdicionar" hidden>
                                <div class="card shadow mb-4">
                                        <div class="card-header py-3 bg-primary">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center bg-primary">
                                            </div>
                                        </div>

                                        <div class="card-body bg-white">
                                                <div class="row p-2">
                                                    
                                                        <div class="col-sm-12">
                                                            <form>
                                                            
                                                                <div class="row mb-3">
                                                                    <label for="intentos" class="col-sm-6 col-form-label">Component Name:</label>
                                                                    <div class="col-sm-5">
                                                                        <input type="text" class="form-control" id="componentName">
                                                                    </div>
                                                                </div>
                                            
                                                                <div class="row mb-3">
                                                                    <button type="button" onclick="Adicionar()" class="btn btn-primary">Adicionar</button>
                                                                </div>  
                                                        
                                                            </form> 
                                                        </div>
                                                    
                                                </div>

                                        
                                        </div>
                                    
                                        
                                        
                                </div>
                            </div>

                        </div>

                          
                               
                        </div>
                    </div>
          
        
@endsection
@section('js')
    <script src="{{ asset('build/vendor/jquery/jquery.min.js')}}"></script>
    <script>
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var authorization ="";
        let id_profile;
        let contadorGlobal;
        let contadorUpdate;
        let dataResponse;

        (function(){
                $.ajax({
                method: "GET",
                url: '../../apiCredenciales',
                headers: {
                'X-CSRF-TOKEN': csrfToken
                }
                }).done(function( data ) {
                    let response = JSON.parse(JSON.stringify(data));
                    authorization = response.Token;
                }).fail(function(data){
                    let response = JSON.parse(JSON.stringify(data));
                });

        })();


        function Buscar(){
            let urldinamica;
            let profile_name = $("#profilename").val();
            if(profile_name==""){
                
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                },

                })

                Toast.fire({
                        icon: 'warning',
                        title: 'No ha completado los datos requeridos' 
                        })


            }else{
                let params = {
                    name_profile: profile_name,
                    application_type: "r"
                };
                urldinamica ="../../api/getapplicationsAuth?" + $.param(params);
                $.ajax({
                    method: "GET",
                    url: urldinamica,
                    headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Authorization': 'Basic '+ authorization
                     }
                })
                .done(function( data ) {
                    activarCapas();
                    let response = JSON.parse(JSON.stringify(data));
                    if(response.Data_Respuesta.Codigo ==200){
                        id_profile = response["Profiles"][0].id_profile;
                        $(".capaApp").remove();
                        let cont = 0;
                        response["Profiles"].forEach(element => {
                        cont = cont+1;
                        var nuevoContenido ="<div class=\"row mb-3 capaApp\">\n" +
                            "<div class=\"col-sm-3\">\n" +
                            "<label for=\"profile\" class=\"col-sm-12 col-form-label\">Application N."+element.id+":</label> <input id="+"N"+cont+" value="+element.id+" hidden />\n"+
                            "</div>\n" +
                            "<div class=\"col-sm-7\">\n" +
                            "<label for=\"profile\" class=\"col-sm-12 col-form-label\">Component Name: <b>"+element.view_name+"</b></label>\n" +
                            "</div>\n" +
                            "<div class=\"col-sm-2\">\n" +
                            "<input type=\"text\" class=\"form-control\" id="+"P"+cont+"\>" +
                            "</div>\n" +
                            "</div>";
                        // Agregar el nuevo contenido después del elemento con el ID "divIntentos"
                        $("#divIntentos").before(nuevoContenido);
                        $("#P"+cont).val(element.permissions);

                    });

                    contadorGlobal = cont;


                    }else{
                        mostrarMensaje(response['Data_Respuesta']);
                    }
                }).fail(function(data){
                    let response = JSON.parse(JSON.stringify(data));
                    mostrarMensaje(response['responseJSON']);

                });
            }
        }

        function Cancelar(){
            desactivarCapas();

        }


        function ActualizarPermisosApp(idAuth,permissions ){
            let urldinamica = "../../api/profileuserauthR/update";
            
            $.ajax({
                    method: "PATCH",
                    url: urldinamica,
                    headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Authorization': 'Basic '+ authorization
                     },
                    data: {
                    "permissions":permissions,
                    "application_type":"u",
                    "id":idAuth
                    }
                })
                .done(function( data ) {
                    let response = JSON.parse(JSON.stringify(data));
                    if(response.Data_Respuesta.Codigo ==200){
                        contadorUpdate = contadorUpdate+1;
                        if(contadorGlobal==contadorUpdate){
                            Swal.close(); 
                            mostrarMensaje(response['Data_Respuesta']);

                        }
                    }else{
                        mostrarMensaje(response['Data_Respuesta']);
                    }
                }).fail(function(data){
                    let response = JSON.parse(JSON.stringify(data));
                    mostrarMensaje(response['responseJSON']);

                });
        }

        function ActualizarPermisos(){
            contadorUpdate=0;
            mostrarLoading();
            for (let index = 1; index <=contadorGlobal; index++) {
                let id = $("#N"+index).val();
                let permissions = $("#P"+index).val();
                ActualizarPermisosApp(id,permissions);
                
            }
        

        }



        function Adicionar(){
            let componentName= $("#componentName").val();
            var headers= {
                'X-CSRF-TOKEN': csrfToken,
                'Authorization': 'Basic '+ authorization
            };
                
            $.ajax({
                method: "POST",
                headers: headers,
                url: "../../api/profileuserauthR/add",
                data: {
                    "id_profile":id_profile,
                    "view_name":componentName,
                    "application_type":"w",
                }
            }).done(function( data ) {
                    let response = JSON.parse(JSON.stringify(data));
                    Buscar();
                    mostrarMensaje(response['Data_Respuesta']);
            }).fail(function(data){
                    let response = JSON.parse(JSON.stringify(data));
                    mostrarMensaje(response['responseJSON']);
            });
        }

    
        function activarCapas(){
            $("#idCapaPermisos").attr("hidden",false);
            $("#idCapaAdicionar").attr("hidden",false);

        }

        function desactivarCapas(){
            $("#idCapaPermisos").attr("hidden",true);
            $("#idCapaAdicionar").attr("hidden",true);

        }

        function mostrarMensaje(dataResponse){
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                },
                didClose: (toast) => {
                       
            
                }
            })
            if(dataResponse.Codigo==200){
                            Toast.fire({
                            icon: 'success',
                            title: dataResponse.Estado + "! " + dataResponse.Descripcion 
                            })
            }else{
                        Toast.fire({
                        icon: 'error',
                        title: dataResponse.Estado + "! " + dataResponse.Mapping_Error[0].descripcion 
                        })
            }          
        }



        function mostrarLoading() {
      
            let timerInterval;
            Swal.fire({
            title: "Cargando",
            html: "Actualizando aplicaciones",
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
            }
            });
        }
            
            
    </script>
@endsection