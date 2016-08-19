
<!DOCTYPE html>

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
    
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

   

    
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1 class="panel-title"><h3> <span class="glyphicon glyphicon-home" aria-hidden="true"> </span>
         &nbsp Inicio Usuario</h3></h1>
      </div>
            
      <div class="panel-body">
        <!-- Obtencion pagos en semana a partir del dia actual-->
        
        <h1 class="page-header">Informe semana actual:</h1>

        <?php 
          $dia = date('l');
          
          $inicio = 0;
          $fin = 4;
          if ($dia == 'Monday')
          {
            $inicio = 0;
            $fin = 4;
          } 
          else if ($dia == 'Tuesday')
          {
            $inicio = 1;
            $fin = 3;
          }
          else if ($dia == 'Wednesday')
          {
            $inicio = 2;
            $fin = 2;
          }
          else if ($dia == 'Thursday')
          {
            $inicio = 3;
            $fin = 1;
          }
          else if ($dia == 'Friday')
          {
             $inicio = 4;
             $fin = 0;
          }
          else if ($dia == 'Saturday')
          {
             $inicio = 5;
             $fin = 1;
          }
          else if ($dia == 'Sunday')
          {
             $inicio = 6;
             $fin = 2;
          }

          $datos = array(
            'inicio' => $inicio,
            'fin' => $fin
          );

          $hoy = date('d-m-Y');

          if ($dia != 'Saturday' && $dia != 'Sunday')
          {
            $fecha_inicio = date('d-m-Y', strtotime($hoy.' - '.$inicio.' days'));
            $fecha_limite = date('d-m-Y', strtotime($hoy.' + '.$fin.' days'));
          }
          else
          {
            $fecha_inicio = date('d-m-Y', strtotime($hoy.' - '.$inicio.' days'));
            $fecha_limite = date('d-m-Y', strtotime($hoy.' - '.$fin.' days'));
          }

          echo '<h2><small>Semana comprendida entre: '.$fecha_inicio . ' al '.$fecha_limite.'</small></h2><br><br>';

          $pagos_clientes = $this->User_model->consultar_pagos_rango_actual($datos);
          if ($pagos_clientes)
          {

            echo '<div class="table-responsive">';
            echo '<table id = "tabla_clientes" class="table table-striped table-bordered">';
            
            echo '<thead>';
              echo '<tr>';
                echo '<th> <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span> &nbsp Producto</th>';
                echo '<th> <span class="glyphicon glyphicon-registration-mark" aria-hidden="true"> </span> &nbsp Marca</th>';
                echo '<th> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> </span> &nbsp Proveedor</th>';
                echo '<th> <span class="glyphicon glyphicon-calendar" aria-hidden="true"> </span> &nbsp Fecha de compra</th>';
                echo '<th> <span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"> </span> &nbsp Precio</th>';
                echo '<th> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> </span> &nbsp Cantidad</th>';
                echo '<th> <span class="glyphicon glyphicon-object-align-vertical" aria-hidden="true"> </span> &nbsp Peso Unitario(g)</th>';          
          

                       
              echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
            $suma_semanal = 0;
            
            $lunes = 0;
            $martes = 0;
            $miercoles = 0;
            $jueves = 0;
            $viernes = 0;
            $i=0;
             



            foreach ($pagos_clientes->result() as $pago_actual) {

                $producto=$pago_actual->producto;
                echo $producto."  ";
                $detail=$this->User_model->detalles_producto($producto);
                foreach ($detail->result() as $detalle) {
               
                  echo '<tr>';
                  echo '<td>'.$detalle->nombre.'</td>'; 
                  echo '<td>'.$detalle->marca.'</td>';              
              
                
               // echo '<td>'.$pago_actual->producto.'</td>';                     
                echo '<td>'.$pago_actual->proveedor.'</td>';
                $fecha_pago = date_create($pago_actual->fecha);
                echo '<td>'.date_format($fecha_pago,'d/m/Y').'</td>';      
                echo '<td>'.$pago_actual->precio.'</td>';
                echo '<td>'.$pago_actual->cantidad.'</td>';
                echo '<td>'.$detalle->peso.'</td>';
                echo '</tr>';
              }
                $suma_semanal = $suma_semanal + $pago_actual->precio;

                $fecha = strtotime($pago_actual->fecha);
                $dia =  date("l", $fecha);
                
                if ($dia == 'Monday')
                {
                  $lunes = $lunes + $pago_actual->precio;
                }
                else if($dia == 'Tuesday')
                {
                  $martes = $martes + $pago_actual->precio;
                }
                else if($dia == 'Wednesday')
                {
                  $miercoles = $miercoles + $pago_actual->precio;
                }
                else if($dia == 'Thursday')
                {
                  $jueves = $jueves + $pago_actual->precio;
                }
                else if($dia == 'Friday')
                {
                  $viernes = $viernes + $pago_actual->precio;
                }
            }
            echo '</tbody>';

            echo '</table>';
            echo '</div>';

            // Informacion semanal
            echo '<br>';
            echo '<h1 class="page-header">Compras de la semana:</h1>';

            echo '<div class="table-responsive">';
            echo '<table id = "tabla_semana" class="table table-striped table-bordered">';

            echo '<thead>';
              echo '<tr>';
                echo '<th> Lunes </th>';
                echo '<th> Martes </th>';
                echo '<th> Miercoles </th>';
                echo '<th> Jueves </th>';
                echo '<th> Viernes </th>';
              echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
              echo '<tr>';
                echo '<td>'. $lunes .'</td>';
                echo '<td>'. $martes .'</td>';
                echo '<td>'. $miercoles .'</td>';
                echo '<td>'. $jueves .'</td>';
                echo '<td>'. $viernes .'</td>';
              echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';

            echo '<h4> Total: '.$suma_semanal.'</h4>';
          }
          else
          {
            echo '<h3>No hay pagos realizados</h3>';
          }

        ?>
      </div>
      </div>
      </div>
    </div>

</body>
</html>