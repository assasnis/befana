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
     

      <li><a href=<?php echo base_url().'index.php/user_controller/inventario'?>>
        <h5> <span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span>
         &nbsp &nbsp Inventario</h5>
      </a></li>

      <li><a href=<?php echo base_url().'index.php/user_controller/ordenes_compra'?>>
        <h5> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> </span>
         &nbsp &nbsp Aprobar ordenes de compra</h5>
      </a></li>

      
      
    </ul>
  </div>
