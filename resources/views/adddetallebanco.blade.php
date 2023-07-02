@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item"><a href="{{route('detalleBancario',1)}}">Detalle Banco</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Detalle</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <h5 class=" font-weight-bold text-primary">Datos de la Transaccion</h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Transaccion:</label>
                                        <div class="col-sm-10">
                                            <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                    <label class="input-group-text" for="tipoTransaccion">Opciones</label>
                                                </div>
                                                <select class="custom-select" id="tipoTransaccion">
                                                    <option selected value="0">Seleccione un tipo...</option>
                                                    @foreach ($transacciones as $valor )
                                                        <option value="{{$valor->id}}">{{$valor->trans_nombre}}</option>
                                                    @endforeach
                                                
                                                </select>
                                            </div>

                                        
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="referencia" class="col-sm-2 col-form-label">Referencia:</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" id="referencia">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="monto" class="col-sm-2 col-form-label">Monto:</label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control" id="monto">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fecha" class="col-sm-2 col-form-label">Fecha de Transaccion:</label>
                                            <div class="col-sm-10">
                                            <input type="date" class="form-control" id="fecha">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="descripcion" class="col-sm-2 col-form-label">Descripcion:</label>
                                            <div class="col-sm-10">
                                            <textarea type="text" class="form-control" id="descripcion"></textarea>
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
                                                 <h4 class="text-center font-weight-bold text-primary">Panel de Detalles Bancarios</h4>
                                                  <p class="text-justify">El siguiente panel esta destinado a registrar las entradas y salidas de las transacciones de las cuentas bancarias, por favor introduzca la informacion solicitada.
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
        let idTipoTransaccion = $("#tipoTransaccion").val();
        let referencia = $("#referencia").val().toUpperCase();
        let monto = $("#monto").val();
        let fecha = $("#fecha").val();
        let descripcion = $("#descripcion").val().toUpperCase();

        var headers= {
        'X-CSRF-TOKEN': csrfToken,
        'Authorization': 'Basic '+ authorization

         };
        $.ajax({
        method: "POST",
        headers: headers,
        url: "../../../api/dbancoR/add",
        data: {
            "id_cuentaBancaria": {{$idCuentaBancaria}},
            "id_tipoTransaccion": idTipoTransaccion,
            "monto": monto,
            "referencia":referencia,
            "descripcion": descripcion,
            "fecha":fecha,
            "estado": 1
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
