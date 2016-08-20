<body>
  <link rel="stylesheet"
  href= <?php echo base_url() . 'css/estilo.css'; ?> ></style>
  
  <link rel="stylesheet"
  href= <?php echo base_url() . 'css/otros/dataTables.bootstrap.min'; ?>></style>

  <script src=<?php echo base_url() . 'css/otros/jquery.min.js'; ?>></script>

  <link rel="stylesheet"
  href= <?php echo base_url() . 'css/otros/jquery.dataTables.min.css'; ?> ></style>

  <script type="text/javascript" 
  src= <?php echo base_url() . 'css/otros/jquery.dataTables.min.js'; ?>></script>

  <script>
  $(document).ready(function(){
      $('#tabla_clientes').dataTable({
          "order": [[ 1, "asc" ]]
      });
  });
  </script>

    </script>
    
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
      <li class = "active"><a href=<?php echo base_url()?>>
        <h4><span class="glyphicon glyphicon-home" aria-hidden="true"> </span>
        &nbsp &nbsp Inicio</h4>
      </a></li>
    </ul>

    <ul class="nav nav-sidebar">
      <li><a href="">
        <h5> <span class="glyphicon glyphicon-file" aria-hidden="true"> </span>
         &nbsp &nbsp Informes</h5>
      </a></li>

      <li><a href=<?php echo base_url().'index.php/user_controller/inventario'?>>
        <h5> <span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span>
         &nbsp &nbsp Inventario</h5>
      </a></li>

      <li><a href="ver_solicitud_bajas">
       <h5> <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>
         &nbsp &nbsp Solicitudes de baja</h5>
      </a></li>

      <li><a href="aprobar_pagos">
        <h5> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> </span>
         &nbsp &nbsp Aprobar compras</h5>
      </a></li>

      <li><a href="historial_pagos">
        <h5> <span class="glyphicon glyphicon-usd" aria-hidden="true"> </span>
         &nbsp &nbsp Historial de pagos</h5>
      </a></li>

      <li><a href="servicio">
        <h5> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span>
        &nbsp &nbsp Agregar servicio</h5>
      </a></li>

      <li><a href="serv_chg">
        <h5> <span class="glyphicon glyphicon-repeat" aria-hidden="true"> </span>
         &nbsp &nbsp Modificar servicio</h5>
      </a></li>
    </ul>
  </div>
