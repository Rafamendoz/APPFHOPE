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
                    <div class="container">
                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <button onclick="Buscar()" class="btn btn-primary">Editar Cuenta</button>
                                                <button onclick="Buscar()" class="btn btn-danger">Desactivar Cuenta</button>
                                            </div>
                        </div>

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
                                                <div class="col-md-6 mb-3">
                                                    <label for="inputEmail4" class="form-label">Numero de Cuenta</label>
                                                    <input type="email" class="form-control" id="inputEmail4">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="inputPassword4" class="form-label">Entidad Bancaria</label>
                                                    <input type="password" class="form-control" id="inputPassword4">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="inputAddress" class="form-label">Tipo de Moneda</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="inputAddress" class="form-label">Tipo de Cuenta</label>
                                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputAddress2" class="form-label">Total en Cuenta:</label>
                                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                </div>
                                              
                                            
                                               
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
                                                    <span><b>Total Neto:</b></span>

                                        </div>
                                     
                                    
                                    </div>
                                </div>

                                <div class="card text-white bg-primary shadow mb-4">
                                   

                                    <div class="card-body">
                                    
                                            <div class="p-2">
                                                <i class="fas fa-fw fa-arrow-up"></i>
                                                <span>Total Salidas: </span>
                                                <span><b>Total Neto:</b></span>

                                            </div>
                                     
                                    
                                    </div>
                                </div>

                                <div class="card text-white bg-primary shadow mb-4">
                                   

                                   <div class="card-body">
                                   
                                       <div class="row p-2">
                                            <div class="p-2">
                                                <i class="fas fa-fw fa-equals"></i>
                                                <span>Total Neto: </span>
                                                <span><b>Total Neto:</b></span>
                                            </div>
                                   
                                          
                                       </div>
                                    
                                   
                                   </div>
                               </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Filtros
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header  bg-primary   py-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <h5 class=" font-weight-bold text-white ">Entradas</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                    
                                        <div class="row p-2">
                                            <div class="table-responsive">
                                                <table class="table table-bordered " id="tableEntradas" width="100%" cellspacing="0">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Codigo Transaccion</th>
                                                            <th>Monto</th>
                                                            <th>Concepto</th>
                                                            <th>Fecha</th>


                                                        </tr>
                                                    </thead>
                                            
                                                    <tbody class="text-center">   
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                 
                                
                                    </div>

                                </div>
                            </div>

                            <div class=" col-md-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header text-white  bg-danger py-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                            <h5 class=" font-weight-bold text-white">Salidas</h5>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                    
                                        <div class="row p-2">
                                            <div class="table-responsive">
                                                <table class="table table-bordered " id="tableSalidas" width="100%" cellspacing="0">
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Codigo Transaccion</th>
                                                            <th>Monto</th>
                                                            <th>Concepto</th>
                                                            <th>Fecha</th>


                                                        </tr>
                                                    </thead>
                                            
                                                    <tbody class="text-center">   
                                                    </tbody>
                                                </table>
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
    


    let productoactual;
    let contadorf=0;
    let idcliente=0;
 
            $( document ).ready(function() {
        $( "#table2" ).bind( "click", function( event ) {
            if(event.target.matches(".eliminarRow")){
                const index =event.target.parentNode.parentNode.rowIndex;
                let tabla = document.getElementById("table2");
                tabla.deleteRow(index);
               total();
            }
         
        });
        });
   
  

    
   

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
                urldinamica ="../../api/clienteR/"+dni;
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
                $("#correo").val(response['Cliente'][0].cliente_correo);
                $("#nombrecliente").val(response['Cliente'][0].cliente_nom);
                idcliente = response['Cliente'][0].id;
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
                productoactual = response;
                $("#nombre").val(response['Producto'].producto_nom);
                $("#descripcion").val(response['Producto'].producto_des);
                mostrarMensaje(response['Response']);
                $("#CapaBotonBuscarProducto").attr('hidden',true);
                $("#CapaBotonAgregar").attr('hidden',false);
                $("#CapaDescuento").attr('hidden',false);
                $("#cantidad").attr('readonly',false);

                console.log(productoactual);
            }).fail(function(data){
                let response = JSON.parse(JSON.stringify(data));
                console.log(response);
                mostrarMensaje(response['responseJSON']);

            });

        }



    }

   

    function MostrarDescuento(){
        if($("#gridCheck").is(":checked")){
            $("#CapaCantidadDescuento").attr('hidden',false);
        }else{
            $("#CapaCantidadDescuento").attr('hidden',true);
        }
    }

    function MostrarIdentificacion(){
        if($('#flexRadioDefault1').is(':checked')){
            $('#id_label').html("DNI:")
        }else{
            $('#id_label').html("Codigo Cliente:")
        }
    }

    function AdicionarProducto(){
        let precio = productoactual["Producto"].precio;
        let cantidad = $("#cantidad").val();
        let descuentounitario = $("#descuento").val();
        let descuentot = descuentounitario*cantidad;
        let isv = 0.00;
        let subtotal = (precio*cantidad)-descuentot;
        if(contadorf ==0){
            $("#tbody tr").remove();
            contadorf+=1;
            $("#tbody").append("<tr><td>"+productoactual["Producto"].id+"</td>"+
            "<td>"+productoactual["Producto"].producto_nom+"</td>"+
            "<td>"+precio+"</td>"+
            "<td>"+cantidad+"</td>"+
            "<td>"+descuentot+"</td>"+
            "<td>"+isv+"</td>"+
            "<td>"+subtotal+"</td>"+
            "<td><button class=\"btn btn-danger btn-sm eliminarRow\" type=\"button\"><i class=\"fas fa-trash\"></i></button></td>"+
            "</tr>");
            $("#capaTotal").attr("hidden", false);

            $("#CapaEnviarOrden").attr("hidden", false);
            ResetFormProductos();
        }else{
            $("#tbody").append("<tr><td>"+productoactual["Producto"].id+"</td>"+
            "<td>"+productoactual["Producto"].producto_nom+"</td>"+
            "<td>"+precio+"</td>"+
            "<td>"+cantidad+"</td>"+
            "<td>"+descuentot+"</td>"+
            "<td>"+isv+"</td>"+
            "<td>"+subtotal+"</td>"+
            "<td><button class=\"btn btn-danger btn-sm eliminarRow\" type=\"button\"><i class=\"fas fa-trash\"></i></button></td>"+
            "</tr>");
            contadorf+=1;
            ResetFormProductos();

        }
        total();
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
                    title: dataResponse.Estado + "! " + dataResponse.Descripcion 
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

    function mostrarMensajeRecibo(dataResponse){
         
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
                    $("#CapaEnviarOrden").attr("hidden", true);
                    $("#CapaBotonBuscarProducto").attr("hidden", true);
                    $("#CapaBotonBuscarVz").attr("hidden", true);

                    
                    ConsultarVerRecibo();
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
 

    function ResetFormProductos(){
        $("#CapaBotonBuscarProducto").attr('hidden',false);
        $("#gridCheck").prop("checked",false);
        $("#CapaCantidadDescuento").attr('hidden',true);
        $("#CapaBotonAgregar").attr('hidden',true);
        $("#cantidad").attr('readonly',true);
        $("#nombre").val('');
        $("#descripcion").val('');
        $("#cantidad").val('');
        $("#CapaDescuento").attr('hidden',true);
        $("#descuento").val("0.00");

        
       
    
        

        
    }
    
    function recorrer(){
            let count =0;
            let conteoexito = 0;
            let pos = $('#table2 tr').length-1
            $('#table2 tr').each(function () {

                        if(count>0){
                            var codigo = $(this).find("td").eq(0).html();
                            var precio = $(this).find("td").eq(2).html();
                            var cantidad = $(this).find("td").eq(3).html();
                            var descuento = $(this).find("td").eq(4).html();
                            var isv = $(this).find("td").eq(5).html();
                            var subtotal = $(this).find("td").eq(6).html();
                            var request = {"codigo":codigo, "nombre":nombre, "precio":precio, "cantidad":cantidad, "descuento":descuento, "isv":isv, "subtotal":subtotal};
                            console.log(request);
                            GuardarDetalleVenta(codigo,precio,cantidad, descuento, subtotal, count, pos);
                            

                        }
                        count+=1;
                        
                

            });
    }

    function total(){
            let count =0;
            var subtotal =0;
            $('#table2 tr').each(function () {

                        if(count>0){
               
                             subtotal += parseFloat($(this).find("td").eq(6).html());
                        

                        }
                        count+=1;
                

            });
            $("#total").val(subtotal);

    }



    function GuardarDetalleVenta(producto_id, precio, cantidad, descuento, subtotal, count, pos){
        let idorden = $("#orden").val();

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Authorization': 'Basic '+ authorization
            },
            url: "../../api/detalleVentaR/add",
            data: {
                "venta_id": idorden,
                "producto_id": producto_id,
                "precio": precio,
                "cantidad": cantidad,
                "descuento": descuento,
                "isv": 0.00,
                "subtotal": subtotal,
                "estado":1
            }
        })
        .done(function( data ) {
            let response = JSON.parse(JSON.stringify(data));
            if(response['Data_Respuesta'].Codigo==200){
                if(count==pos){
                            response = {"Codigo":200, "Estado":"Exitoso", "Descripcion": "Venta Registrada"};
                            mostrarMensajeRecibo(response);

                }
            }
            
        
        }).fail(function(data){
            return 2;

        });

    }

    function Guardar(){
        let idorden = $("#orden").val();
        let cliente_id = idcliente;
        let idusuario = {{auth()->user()->id}};
        let fecha = $("#estado").val();
        let direccion = $("#direccion").val();
        let total = $("#total").val();
        var d = new Date();
        var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate()+ " "+d.getHours()+"-"+d.getMinutes()+"-"+d.getSeconds();
      
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Authorization': 'Basic '+ authorization

            },
            url: "../../api/ventaR/add",
            data: {
                "fecha": strDate,
                "cliente_id": cliente_id,
                "usuario_id": idusuario,
                "direccionEnvio": direccion,
                "total": total,
                "estado": 1,


            }
        })
        .done(function( data ) {
            let response = JSON.parse(JSON.stringify(data));
            if(response['Data_Respuesta'].Codigo==200){
                   recorrer();
            }
            
        
        }).fail(function(data){
            let response = JSON.parse(JSON.stringify(data));
            mostrarMensaje(response['responseJSON']);

        });
    }

   
    function ConsultarVerRecibo(){
         
        Swal.fire({
        title: 'Venta Registrada!',
        text: "Desea ver el recibo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, mostrarlo!'
        }).then((result) => {
        if (result.isConfirmed) {
            location.href = "../ver/recibo/"+$("#orden").val();

        }else{
            location.href = "../dashboard";
        }
        })
    }
    
    
</script>

@endsection




