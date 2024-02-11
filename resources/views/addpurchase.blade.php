@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item"><a href="{{route('Usuarios')}}">Compras</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Compra</li>
  </ol>
</nav>


                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <h5 class=" font-weight-bold text-primary">Cabecera de Compra</h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="dni" id="id_label" class="col-sm-2 col-form-label">DNI:</label>
                                            <div class="col-sm-3">
                                            <input type="number" class="form-control" id="dni">
                                            </div>
                                            <div class="col-sm-7">
                                            <input type="text" class="form-control" id="nombreCliente" readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-2" id="capaTotal" >
                                                        <label for="orden" class="form-label">Tipo de Identificacion:</label>
                                            </div>

                                  

                                            <div class="col-md-12 mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onclick="MostrarIdentificacion()">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            DNI
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  onclick="MostrarIdentificacion()">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Codigo Cliente
                                                            </label>
                                                    </div>
                                            </div>

                                        </div>
                                

                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Moneda:</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                            <label class="input-group-text" for="estado">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="tipoMoneda">
                                                        <option selected value="0">Seleccione un tipo...</option>
                                                        @foreach ($monedas as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->moneda_nombre}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Compra:</label>
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                            <label class="input-group-text" for="estado">Opciones</label>
                                                    </div>
                                                    <select class="custom-select" id="tipoCompra">
                                                        <option selected value="0">Seleccione un tipo...</option>
                                                        @foreach ($tipoCompra as $valor )
                                                            <option value="{{$valor->id}}">{{$valor->nombre}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                
                                        
                                        <div class="col-12" id="CapaBotonBuscarProducto">
                                            <button type="button" onclick="Buscar()" class="btn btn-primary">Buscar Cliente</button>
                                        </div>

                                        <div class="row mb-3" id="CapaEnviarComprar" hidden>
                                            
                                            <button type="button" onclick="ValidarDatos()" class="btn btn-warning">Agregar</button>
                                            <button  type="button" onclick="ResetFormProductos()" class="btn btn-danger">Cancelar</button>

                                        </div>
                                    
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
                                                 <h4 class="text-center font-weight-bold text-primary">Panel de Usuarios</h4>
                                                  <p class="text-justify">El siguiente panel esta destinado a registrar la informacion de los usuarios, por favor introduzca la informacion solicitada.
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
let idcliente;

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
        let tipoCompra = $("#tipoCompra").val();
        let tipoMoneda = $("#tipoMoneda").val();
    

        var headers= {
        'X-CSRF-TOKEN': csrfToken,
        'Authorization': 'Basic '+ authorization

         };
		
        $.ajax({
        method: "POST",
        headers: headers,
        url: "../../api/compraHeader/add",
        data: {
            "id_cliente":idcliente,
            "id_tipoCompra": tipoCompra,
            "id_tipoMoneda":tipoMoneda,
            "total":0.00,
            "estado":1
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

    function MostrarIdentificacion(){
        if($('#flexRadioDefault1').is(':checked')){
            $('#id_label').html("DNI:")
        }else{
            $('#id_label').html("Codigo Cliente:")
        }
    }

    function ResetFormProductos(){
        $("#CapaEnviarComprar").attr('hidden',true);
        $("#CapaBotonBuscarProducto").attr('hidden',false);
        
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
                }else{
                    console.log("NULL");

                }
    
        }
        })

        switch(dataResponse.Codigo){
            case "200":
                Toast.fire({
                    icon: 'success',
                    title: dataResponse.Estado + "! " + dataResponse.Descripcion 
                });
                break;

            case "202":
                Toast.fire({
                    icon: 'info',
                    title: dataResponse.Descripcion 
                });
                break;

            default:
                Toast.fire({
                icon: 'error',
                title: dataResponse.Estado + "! " + dataResponse.Mapping_Error[0].descripcion 
                });
                break;



        }

       
             
    }

    function Buscar(){

let dni = $("#dni").val();
if(dni==""){
     
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
    let urldinamica="";
    if($('#flexRadioDefault1').is(':checked')){
        urldinamica ="../../api/clienteR/dni/"+dni;
    }else{
        urldinamica ="../../api/clienteR/active/"+dni;
    }
    
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
        $("#nombreCliente").val(response['Cliente'][0].cliente_nom);
        idcliente = response['Cliente'][0].id;
        $("#CapaBotonBuscarProducto").attr('hidden',true);
        $("#CapaEnviarComprar").attr('hidden',false);

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

function ValidarDatos(){
        let compra = $("#tipoCompra").val();
        let moneda = $("#tipoMoneda").val();
 
        let mensaje = "";
        if(moneda=="" || compra =="" || moneda<=0 || compra<=0){
            mensaje = {"Codigo":"202","Estado":"Aceptado", "Descripcion":"Los campos ingresados no son permitidos, favor revisar"};
            mostrarMensaje(mensaje);
        }else{
            Guardar();
        }

    }
    
    
</script>
@endsection