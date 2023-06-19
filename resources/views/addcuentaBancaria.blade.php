@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item"><a href="{{route('cuentasBancarias')}}">Cuentas Bancarias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Cuentas Bancarias</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <h5 class=" font-weight-bold text-primary">Datos de la Cuenta</h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="numeroCuenta" class="col-sm-4 col-form-label">Numero de Cuenta:</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="numeroCuenta">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="bancoLabel" class="col-sm-3 col-form-label">Banco Perteneciente:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="opcionesBanco">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="banco">
                                                        <option selected value="0">Seleccione un banco...</option>
                                                        @foreach ($bancos as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->banco_nombre}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>

                                        
                                            </div>

                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="tipoCuentaLabel" class="col-sm-3 col-form-label">Tipo de la Cuenta:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="opcionesTipoCuenta">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="tipoCuenta">
                                                        <option selected value="0">Seleccione un tipo...</option>
                                                        @foreach ($tipoCuentas as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->cuenta_nombre}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>

                                        
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="monedaLabel" class="col-sm-4 col-form-label">Moneda de la Cuenta:</label>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="opcionesCuenta">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="moneda">
                                                        <option selected value="0">Seleccione una moneda...</option>
                                                        @foreach ($monedas as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->moneda_nombre}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>

                                        
                                            </div>

                                        </div>

                                        
                                        <div class="row mb-3">
                                            <label for="estado" class="col-sm-3 col-form-label">Estado:</label>
                                            <div class="col-sm-9">
                                                <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="opciones">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="estado">
                                                        <option selected value="0">Seleccione un estado...</option>
                                                        @foreach ($estados as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->valor}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>

                                        
                                            </div>

                                        </div>
                                
                                
                                
                                        <button type="button" onclick="Guardar()" class="btn btn-primary">Guardar</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-primary">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center bg-primary">
                                    </div>
                                </div>

                                <div class="card-body bg-white">
                                    
                                        <div class="row p-2">
                                            
                                                <div class="col-sm-12">
                                                 <h4 class="text-center font-weight-bold text-primary">Panel de Cuentas Bancarias</h4>
                                                  <p class="text-justify">El siguiente panel esta destinado a registrar la informacion de las cuentas bancarias, por favor introduzca la informacion solicitada.
                                                  </p>
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
    

    function Guardar(){
        let numeroCuenta = $("#numeroCuenta").val().toUpperCase();
        let idbanco = $("#banco").val();
        let idtipoCuenta = $("#tipoCuenta").val();
        let idtipoMoneda = $("#moneda").val();
        let estado = $("#estado").val();
        $.ajax({
        method: "POST",
        headers:{        'X-CSRF-TOKEN': csrfToken,
            'Authorization':'Basic '+authorization},
        url: "../../api/cuentaBancariaR/add",
        data: {
            "cBancaria_nCuenta":numeroCuenta,
            "cBancaria_idBanco":idbanco,
            "cBancaria_tipoCuenta":idtipoCuenta,
            "cBancaria_tipoMoneda":idtipoMoneda,
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
                if(dataResponse.Codigo==200){
                    location.reload();
                }else{
                    console.log("NULL");

                }
    
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

