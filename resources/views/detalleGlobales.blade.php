@extends('panelp')


@section('tablabase')
 <!-- Page Heading -->

 <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb bg-white shadow p-3 mb-4 rounded">
    <li class="breadcrumb-item active" aria-current="page">Resumen Operativo</li>
  </ol>
</nav>


                    <!-- DataTales Example -->

                        <div class="row">
                     
                      

                        
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Ingresos Vs Egresos</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                                        <div class="chart-pie pt-4 pb-2">
                                                            <canvas id="myPieChart"></canvas>
                                                        </div>
                                                        <div class="mt-4 text-center small">
                                                            <span class="mr-2">
                                                                <i class="fas fa-circle text-primary"></i> Ingresos
                                                            </span>
                                                            <span class="mr-2">
                                                                <i class="fas fa-circle text-success"></i> Egresos
                                                            </span>
                                                        </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Flujo de Efectivo</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                              
                                                <div id="dataElement" class="card text-white bg-primary shadow mb-4"  data-entradas="{{ $totalEntradas[0]->total }}" data-salidas="{{ $totalSalidas[0]->total }}" data-totat="{{ $totalneto}}">
                                                    

                                                    <div class="card-body">
                                                    
                                                        <div class="p-2">
                                                                    <i class="fas fa-fw fa-arrow-down"></i>
                                                                    <span>Ingresos Globales: </span>
                                                                    <span><b>L.{{$totalEntradas[0]->total}}
                                                                

                                                                    </b></span>

                                                        </div>
                                                        
                                                    
                                                    </div>
                                                </div>

                                                <div class="card text-white bg-primary shadow mb-4">
                                                    

                                                    <div class="card-body">
                                                    
                                                            <div class="p-2">
                                                                <i class="fas fa-fw fa-arrow-up"></i>
                                                                <span>Egresos Globales:  </span>
                                                                <span><b>L.{{$totalSalidas[0]->total}}
                                                            

                                                            </div>
                                                        
                                                    
                                                    </div>
                                                </div>

                                                <div class="card text-white bg-primary shadow mb-4">
                                                    

                                                    <div class="card-body">
                                                        
                                                    
                                                        <div class="row p-2">
                                                            <div class="p-2">
                                                                <i class="fas fa-fw fa-equals"></i>
                                                                <span>Utilidades: </span>
                                                                <span><b>L.{{$totalneto}} </b></span>
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
<script src="build/js/demo/chart-pie-demo.js" async></script>

<script src="{{ asset('build/vendor/jquery/jquery.min.js')}}"></script>
<script src="build/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="build/vendor/chart.js/Chart.min.js"></script>
<script src="build/js/demo/chart-area-demo.js"></script>





@endsection




