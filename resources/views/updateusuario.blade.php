@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item"><a href="{{route('Usuarios')}}">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modificar Usuario</li>
  </ol>
</nav>
                    <!-- DataTales Example -->
                    <div class="row">

                        <div class="col-md-7">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <h5 class=" font-weight-bold text-primary">Datos del Usuario</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                                <label for="nombreProducto" class="col-sm-2 col-form-label">Email:</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email">
                                                </div>
                                            </div>


                                            
                                            <div class="row mb-3" id="divIntentos">
                                                <label for="intentos" class="col-sm-2 col-form-label">Intentos:</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="intentos">
                                                </div>
                                            </div>


                                    
                                            
                                            <div class="row m-3">
                                                <button type="button" onclick="Guardar()" class="btn btn-primary">Guardar</button>
                                            </div>

                                            
                                        </form>
                                    
                                    </div>
                                    
                                </div>
                        </div>

                        <div class="col-md-5">
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
                                                                <label for="intentos" class="col-sm-3 col-form-label">Usuario:</label>
                                                                <div class="col-sm-9">
                                                                <input type="text" class="form-control" id="username">
                                                                </div>
                                                            </div>
                                        
                                                            <div class="row mb-3">
                                                                <button type="button" onclick="Buscar()" class="btn btn-primary">Buscar</button>
                                                            </div>  
                                                    
                                                        </form> 
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
        (function(){
                $.ajax({
                method: "GET",
                url: '../../apiCredenciales',
                headers: {
                'X-CSRF-TOKEN': csrfToken,

                }
                })
                .done(function( data ) {
                    let response = JSON.parse(JSON.stringify(data));
                    authorization = response.Token;
                
                }).fail(function(data){
                    let response = JSON.parse(JSON.stringify(data));
                    console.log(response);
                    

                });

            })();


        function Buscar(){
            let urldinamica;

            let username = $("#username").val();
            if(username==""){
                
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
                    username: username,
                    application_type: "r"
                };
                urldinamica ="../../api/usuarioR/user?" + $.param(params);
                    $.ajax({
            method: "GET",
            url: urldinamica,
            headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Authorization': 'Basic '+ authorization
            }
            })
            .done(function( data ) {

                let response = JSON.parse(JSON.stringify(data));
                if(response.Data_Respuesta.Codigo ==200){
                    $("#email").val(response['Usuario'][0].email);
                    $("#intentos").val(response['Usuario'][0].intentos);
                    $(".capaProfile").remove();
                    let cont = 0;
                    response["Profiles"].forEach(element => {
                        cont = cont+1;
                        console.log(element.name_profile);
                        var nuevoContenido = "<div class=\"row mb-3 capaProfile\">\n" +
                    "    <label for=\"profile\" class=\"col-sm-3 col-form-label\">Profile N."+cont+":</label>\n" +
                    "    <div class=\"col-sm-9\">\n" +
                    "        <input type=\"text\" class=\"form-control\" id="+element.name_profile+"\>" +
                    "    </div>\n" +
                    "</div>";
                    // Agregar el nuevo contenido después del elemento con el ID "divIntentos"
                    $("#divIntentos").after(nuevoContenido);
                    $("#"+element.name_profile).val(element.name_profile);

                    });
                   
                    $("#intentos").val(response['Usuario'][0].intentos);


                    mostrarMensaje(response['Data_Respuesta']);

                }else{
                    mostrarMensaje(response['Data_Respuesta']);


                }
            


            }).fail(function(data){
                let response = JSON.parse(JSON.stringify(data));
                console.log(response);
                mostrarMensaje(response['responseJSON']);

            });

                }
                
           
            }



        


            function Guardar(){
                let email = $("#email").val();
                let password = $("#password").val();
                let user = $("#usuario").val();
                let intentos = $("#estado").val();
                let estado = $("#estado").val();

                var headers= {
                'X-CSRF-TOKEN': csrfToken,
                'Authorization': 'Basic '+ authorization

                };
                
                $.ajax({
                method: "POST",
                headers: headers,
                url: "../../api/usuarioR/add",
                data: {
                    "email":email,
                    "password": password,
                    "user":user,
                    "intentos":intentos,
                    "estado":estado
                }
                })
                .done(function( data ) {
                    let response = JSON.parse(JSON.stringify(data));
                    mostrarMensaje(response['Data_Respuesta'])
                
                }).fail(function(data){
                    let response = JSON.parse(JSON.stringify(data));
                    mostrarMensaje(response['responseJSON']);

                });
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

            
            
    </script>
@endsection