@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
  <li class="breadcrumb-item active" aria-current="page">Inventario</li>
    <li class="breadcrumb-item"><a href="{{route('Inventarios',$id)}}">Inventario por Producto</a></li>

    <li class="breadcrumb-item active" aria-current="page">Agregar Inventario</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <h5 class=" font-weight-bold text-primary">Datos del Inventario</h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                <form class="row g-3" id="formInventory">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="inputEmail4" class="form-label">Codigo Producto:</label>
                                                            <input type="number" class="form-control" id="producto_codigo">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="inputCity" class="form-label">Stock:</label>
                                                            <input type="text" class="form-control" id="stock" readonly>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="inputPassword4" class="form-label">Nombre:</label>
                                                            <input readonly type="text" class="form-control" id="nombre">
                                                        </div>
                                                        <div class="col-12 mb-4">
                                                            <label for="inputAddress" class="form-label">Descripcion:</label>
                                                            <input readonly type="text" class="form-control" id="descripcion">
                                                        </div>

                                                        <div class="col-12 mb-3"  id="CapaDetalleProducto">
                                                     
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="color">Colores</label>
                                                                </div>
                                                                <select class="custom-select" id="color">
                                                                    <option selected value="0">Seleccione...</option>
                                                                    @foreach ($colors as $valor )
                                                                        <option value="{{$valor->id}}">{{$valor->name_color}}</option>
                                                                    @endforeach
                                                                
                                                                </select>

                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="size">Tallas</label>
                                                                </div>
                                                                <select class="custom-select" id="size">
                                                                    <option selected value="0">Seleccione...</option>
                                                                    @foreach ($sizes as $valor )
                                                                        <option value="{{$valor->id}}">{{$valor->name_size}}</option>
                                                                    @endforeach
                                                                
                                                                </select>
                                                            </div>

                                            
                                                        </div>


                                          



                                                
                                                
                                                
                                        </form>

                                        <div class="col-12" id="CapaBotonBuscarProducto">
                                                        <button onclick="BuscarProducto()" class="btn btn-primary">Buscar</button>
                                        </div>

                                        <div class="col-12" id="CapaBotonAgregar" hidden>
                                                        <button onclick="Guardar()" class="btn btn-warning">Agregar</button>
                                                        <button onclick="Cancelar()" class="btn btn-danger">Cancelar</button>

                                                    </div>
                            

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
                                                 <h4 class="text-center font-weight-bold text-primary">Panel de Moneda</h4>
                                                  <p class="text-justify">El siguiente panel esta destinado a registrar la informacion de las monedas, por favor introduzca la informacion solicitada.
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
        let nombreTipoCuenta = $("#nombreTipoCuenta").val().toUpperCase();
        let estado = $("#estado").val();
        const valueEntry = 'YWRtaW5AZmhvcGUub25saW5lOmFkbWluMTIzNDU=';

      
		
        $.ajax({
        method: "POST",
        headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Authorization': 'Basic '+ authorization
        },
        url: "../../api/cuentaR/add",
        data: {
            "cuenta_nombre": nombreTipoCuenta,
            "estado": estado,
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

     
    function BuscarProducto(){

let codigoproducto = $("#producto_codigo").val();

if(codigoproducto==""){
    
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
    
    $.ajax({
    method: "GET",
    headers: {
        'X-CSRF-TOKEN': csrfToken,
        'Authorization':'Basic '+authorization
    

    },
    url: "../../api/productoR/"+codigoproducto,
    })
    .done(function( data ) {
        let response = JSON.parse(JSON.stringify(data));
        if(response['Data_Respuesta'].Codigo==200){
            productoactual = response;
            $("#nombre").val(response['Producto'].producto_nom);
            $("#descripcion").val(response['Producto'].producto_des);
            mostrarMensaje(response['Data_Respuesta']);
            $("#CapaBotonBuscarProducto").attr('hidden',true);
            $("#CapaBotonAgregar").attr('hidden',false);
            $("#stock").attr('readonly',false);

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

function Cancelar(){
    $("#CapaBotonBuscarProducto").attr('hidden',false);
    $("#CapaBotonAgregar").attr('hidden',true);
    $("#stock").attr('readonly',true);
    $("#formInventory").trigger('reset');

}    
    
</script>
@endsection