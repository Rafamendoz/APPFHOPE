<!DOCTYPE html>
<html>
<head>
<style !!important>
      body {
        font-family: "Courier New", monospace;
        font-size: 12px;
        margin: 0;
        padding: 0;
        text-align: center;

      }


      .header {
        text-align: center;
        margin-bottom: 20px;
      }


      .title {
        font-weight: bold;
        font-size: 16px;
        text-align: center;

      }


      .address, .contact {
        margin-bottom: 5px;
        text-align: center;

      }


      .content {
        margin-bottom: 10px;
        text-align: center;

      }


      .customer-info, .invoice-info {
        display: flex;
        justify-content: center;
        margin-bottom: 5px;
        align-items: center;

      }


      .info-label {
        font-weight: bold;

      }


      .item-table {
        width: 100%;
        border-collapse: collapse;        
        text-align: center;


      }


      .item-table th, .item-table td {
        text-align: center;

        border: 1px solid #000;
        padding: 5px;
      }


      .item-table th {
        background-color: #f0f0f0;
        text-align: center;
      }


      .item-table td {
        text-align: center;
      }


      .total-row {
        font-weight: bold;
      }

      .btn {
  background-color: #ff0000; /* Color de fondo del botón */
  color: #ffffff; /* Color del texto del botón */
  border: none; /* Eliminar el borde */
  padding: 10px 20px; /* Espaciado interno del botón */
  border-radius: 4px; /* Añadir esquinas redondeadas */
  cursor: pointer; /* Cambiar el cursor al pasar por encima del botón */
  text-decoration:none;

}

      

    </style>

  <title>Report PostCierre</title>
  
</head>
<body>
  
  <div class="header">
    <div class="title">REPORTE DE REGISTROS DEL CIERRE</div>
    <hr>
  </div>
    <hr>
  <div class="content">
 
      <div class="customer-info">
        <div class="info-label">VALOR:</div>
        <div class="info-value">TABLAS OPERATIVAS</div>
      </div>

  </div>
  

  <table class="item-table">
    <thead>
      <tr>
        <th>ENTIDAD</th>
        <th>TOTAL HISTORICA</th>
        <th>TOTAL ACTUAL</th>
      </tr>
    </thead>
    <tbody>
        @foreach($reporteFinal as $valor)
      <tr>
        <td>{{$valor['TableName']}}</td>
        <td>{{$valor['HistoricaTotal']}}</td>
        <td>{{$valor['ActualTotal']}}</td>
  
      </tr>
      @endforeach
 
    </tbody>
    <tfoot>
  
      <tr class="total-row">
        <td colspan="3">CIERRE</td>
  
      </tr>

    </tfoot>
  </table>

<br>
<br>
  <div class="col-md-12 ">
          <a href="{{route('Ventas')}}" class="btn btn-primary">Regresar</a>
  </div>
  
      @section('js')
      @endsection
</body>
</html>




