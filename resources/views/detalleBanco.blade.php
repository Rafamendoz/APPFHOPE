@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
  <li class="breadcrumb-item"><a href="{{route('cuentasBancarias')}}">Cuentas Bancarias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detalle de Cuenta Bancaria</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                        @hasanyrole('ADMINISTRADOR|MANAGER')
                        <div class="row">
                            @foreach ($datosCuenta as $valor)
                                            <div class="col-md-12 mb-3">
                                                <button onclick="Buscar()" class="btn btn-primary">Editar Cuenta</button>
                                                <button onclick="ConsultarEliminar({{$valor->id}})" class="btn btn-danger">Desactivar Cuenta</button>
                                                <a href="../detalleBancario/adddetallebanco?destination=AddDetalleBanco&value=r&id={{$valor->id}}" class="btn btn-primary">Registrar Transaccion</a>

                                            </div>
                            @endforeach
                        </div>
                        @endhasanyrole

                        

                        <div class="row">
                            <div class=" col-md-7">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <h5 class=" font-weight-bold text-primary">Datos de la Cuenta</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                    
                                        <div class="row p-2">
                                            <form class="row g-3">
                                                @foreach ($datosCuenta as $valor)
                                                <div class="col-md-6 mb-3 hidden">
                                                        <label for="idCuenta" class="form-label">IdCuenta:</label>
                                                        <input type="text" class="form-control" readonly id="idCuenta" value="{{$valor->id}}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="numeroCuenta" class="form-label">Numero de Cuenta:</label>
                                                        <input type="text" class="form-control" readonly id="numeroCuenta" value="{{$valor->cBancaria_nCuenta}}">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="inputPassword4" class="form-label">Entidad Bancaria:</label>
                                                        <input type="text" class="form-control"  readonly id="inputPassword4" value="{{$valor->banco_nombre}}">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="inputAddress" class="form-label">Tipo de Moneda:</label>
                                                        <input type="text" class="form-control" id="inputAddress" readonly value="{{$valor->moneda_nombre}}">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="inputAddress" class="form-label">Tipo de Cuenta:</label>
                                                        <input type="text" class="form-control" id="inputAddress" readonly value="{{$valor->cuenta_nombre}}">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputAddress2" class="form-label">Total en Cuenta:</label>
                                                        <input type="text" class="form-control" id="inputAddress2" readonly value="{{$valor->cBancaria_total}}">
                                                    </div>
                                                @endforeach
                                            
                                               
                                            </form>
                                        </div>
                                     
                                    
                                    </div>
                                </div>
                            </div>


                            <div class=" col-md-5">
                                <div class="card text-white bg-primary shadow mb-4">
                                   

                                    <div class="card-body">
                                    
                                        <div class="p-2">
                                                    <i class="fas fa-fw fa-arrow-down"></i>
                                                    <span>Total Entradas: </span>
                                                    <span><b>L.
                                                    @foreach($totalEntradas as $valor)
                                                        {{$valor->totalEntradas}}
                                                    @endforeach

                                                    </b></span>

                                        </div>
                                     
                                    
                                    </div>
                                </div>

                                <div class="card text-white bg-primary shadow mb-4">
                                   

                                    <div class="card-body">
                                    
                                            <div class="p-2">
                                                <i class="fas fa-fw fa-arrow-up"></i>
                                                <span>Total Salidas: </span>
                                                <span><b>L.
                                                    @foreach($totalSalidas as $valor)
                                                        {{$valor->totalSalidas}}
                                                    @endforeach</b></span>

                                            </div>
                                     
                                    
                                    </div>
                                </div>

                                <div class="card text-white bg-primary shadow mb-4">
                                   

                                   <div class="card-body">
                                   
                                       <div class="row p-2">
                                            <div class="p-2">
                                                <i class="fas fa-fw fa-equals"></i>
                                                <span>Total Neto: </span>
                                                <span><b>L. {{$totalNeto}}</b></span>
                                            </div>
                                   
                                          
                                       </div>
                                    
                                   
                                   </div>
                               </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" onclick="MostrarFiltros()">
                                    <label class="form-check-label" for="gridCheck">
                                        Filtros
                                    </label>
                                </div>
                            </div>

                            

                           
                        </div>
                        <div id="Capafiltros" class="row" hidden>
                                <div class="col-md-6 mb-3">
                                                        <label for="fechaInicial" class="form-label">Fecha Inicial:</label>
                                                        <input type="date" class="form-control" id="fechaInicial">
                                </div>

                                <div class="col-md-6 mb-3">
                                                        <label for="fechaFinal" class="form-label">Fecha Final:</label>
                                                        <input type="date" class="form-control" id="fechaFinal">
                                </div>

                                <div class="col-md-12 mb-3">
                                                    <button onclick="BuscarDetallePorFecha()" class="btn btn-primary">Filtrar</button>
                                </div>

                            </div>

                        <div class="row">
                            <div class=" col-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header  bg-primary   py-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <h5 class=" font-weight-bold text-white ">Entradas</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                    
                                        <div class="row p-2">
                                            <div class="table-responsive">
                                                <table class="align-middle text-center" id="tableEntradas" width="100%" cellspacing="0">
                                                    <thead class="table">
                                                        <tr>
                                                            <th>Referencia</th>
                                                            <th>Monto</th>
                                                            <th>Concepto</th>
                                                            <th>Fecha</th>


                                                        </tr>
                                                    </thead>
                                            
                                                    <tbody class="text-center align-middle" id="tbodyEntradas">  
                                                        @foreach ($entradasBancarias as $valor)
                                                        <tr style="font-size:0.7vmax;">
                                                            <td>{{$valor->referencia}}</td>
                                                            <td>{{$valor->monto}}</td>
                                                            <td>{{$valor->descripcion}}</td>
                                                            <td>{{$valor->fecha}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                 
                                
                                    </div>

                                </div>
                            </div>

                            <div class=" col-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header text-white  bg-danger py-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <h5 class=" font-weight-bold text-white">Salidas</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                    
                                        <div class="row p-2">
                                            <div class="table-responsive">
                                                <table class="align-middle text-center" id="tableSalidas" width="100%" cellspacing="0">
                                                    <thead class="table">
                                                        <tr>
                                                            <th>Referencia</th>
                                                            <th>Monto</th>
                                                            <th>Concepto</th>
                                                            <th>Fecha</th>


                                                        </tr>
                                                    </thead>
                                            
                                                    <tbody id="tbodySalidas" class="text-center">  
                                                    @foreach ($salidasBancarias as $valor)
                                                        <tr style="font-size:0.7vmax;text-align: center;">
                                                            <td>{{$valor->referencia}}</td>
                                                            <td>{{$valor->monto}}</td>
                                                            <td>{{$valor->descripcion}}</td>
                                                            <td>{{$valor->fecha}}</td>
                                                        </tr>
                                                        @endforeach 
                                                    </tbody>
                                                </table>
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
    


    
   

    function BuscarDetallePorFecha(){
        let idCuenta = $("#idCuenta").val();
        let fechaInicial = $("#fechaInicial").val();
        let fechaFinal = $("#fechaFinal").val();
        if(fechaInicial=="" || fechaFinal=="" || fechaInicial>fechaFinal ){
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                }})

                Toast.fire({
                     icon: 'warning',
                     title: 'Por favor revise las fechas ingresadas' 
                })
        }else{
            $.ajax({
        method: "POST",
        url: "../api/dbancoR/entradas/date/"+idCuenta,
        headers: {
        'X-CSRF-TOKEN': csrfToken,
        'Authorization': 'Basic '+ authorization

         },
         data:{'fechaInicial':fechaInicial, 
        'fechaFinal':fechaFinal}
        })
        .done(function( data ) {

            let response = JSON.parse(JSON.stringify(data));
            if(response.Data_Respuesta.Codigo ==200){
                $("#tbodyEntradas").empty();
                response.EntradasBancarias.forEach(function callback(value, index) {

                $("#tableEntradas tbody").append("<tr><td>"+`${value.referencia}`+"</td>"+
               "<td>"+`${value.monto}`+"</td>"+
               "<td>"+`${value.descripcion}`+"</td>"+
               "<td>"+`${value.fecha}`+"</td></tr>");
                });
                

            }else{
                if(response.Data_Respuesta.Codigo ==202){
                    $("#tbodyEntradas").empty();


                }


            }
          

        
        }).fail(function(data){
            let response = JSON.parse(JSON.stringify(data));
            console.log(response);
            mostrarMensaje(response['responseJSON']);

        });

        $.ajax({
        method: "POST",
        url: "../api/dbancoR/salidas/date/"+idCuenta,
        headers: {
        'X-CSRF-TOKEN': csrfToken,
        'Authorization': 'Basic '+ authorization

         },
         data:{'fechaInicial':fechaInicial, 
        'fechaFinal':fechaFinal}
        })
        .done(function( data ) {

            let response = JSON.parse(JSON.stringify(data));
            if(response.Data_Respuesta.Codigo ==200){
                $("#tbodySalidas").empty();
                response.SalidasBancarias.forEach(function callback(value, index) {

                $("#tbodySalidas").append("<tr><td>"+`${value.referencia}`+"</td>"+
               "<td>"+`${value.monto}`+"</td>"+
               "<td>"+`${value.descripcion}`+"</td>"+
               "<td>"+`${value.fecha}`+"</td></tr>");
                });
                

            }else{
                if(response.Data_Respuesta.Codigo ==202){
                    $("#tbodySalidas").empty();


                }


            }
          

        
        }).fail(function(data){
            let response = JSON.parse(JSON.stringify(data));
            console.log(response);
            mostrarMensaje(response['responseJSON']);

        });
        

        }
        
       


      
    }
    
    

   

    function MostrarFiltros(){
        if($("#gridCheck").is(":checked")){
            $("#Capafiltros").attr('hidden',false);
        }else{
            $("#Capafiltros").attr('hidden',true);
        }
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
       
         })
 
         if(dataResponse.Codigo==200){
                     Toast.fire({
                     icon: 'success',
                     title: dataResponse.Estado + "! " + dataResponse.Descripcion 
                     })
         }else{
            if(dataResponse.Codigo==202){
                Toast.fire({
                 icon: 'info',
                 title: dataResponse.Descripcion 
                 })

            }else{
                Toast.fire({
                 icon: 'error',
                 title: dataResponse.Estado + "! " + dataResponse.Mapping_Error[0].descripcion 
                 })
            }
                 
         }
              
     }

     function ConsultarEliminar(id){
        Swal.fire({
                    title: '¿Está seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Eliminar(id);
                    }
        })
    }

    function mostrarMensajeEliminar(dataResponse){
         
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
                     location.href="../cuentasBancarias";
                 }else{
                   
 
                 }
     
         }
         })
 
         if(dataResponse.Codigo==200){
                     Toast.fire({
                     icon: 'success',
                     title: dataResponse.Estado + "! " + dataResponse.Descripcion 
                     })
         }else{
            if(dataResponse.Codigo==202){
                Toast.fire({
                 icon: 'info',
                 title: dataResponse.Descripcion 
                 })

            }else{
                Toast.fire({
                 icon: 'error',
                 title: dataResponse.Estado + "! " + dataResponse.Mapping_Error[0].descripcion 
                 })
            }
                 
         }
              
     }

     function ConsultarEliminar(id){
        Swal.fire({
                    title: '¿Está seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Eliminar(id);
                    }
        })
    }

    function Eliminar(id){

        $.ajax({
        method: "PUT",
        url: "../../api/cuentaBancariaR/delete/"+id,
        headers: {
        'X-CSRF-TOKEN': csrfToken,
        'Authorization': 'Basic '+ authorization

         },
        data: { "estado":2}
        })
        .done(function( data ) {
            let response = JSON.parse(JSON.stringify(data));
            console.log(response);
            mostrarMensajeEliminar(response['Data_Respuesta']);
        
        }).fail(function(data){
            let response = JSON.parse(JSON.stringify(data));
            console.log(response);
            mostrarMensaje(response['responseJSON']);

        });
            
    }
 
   
    
    
</script>

@endsection




