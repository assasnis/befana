<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_data = $this->session->userdata('userdata');

?><!DOCTYPE html>





    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


    <div class="panel panel-info">
      <div class="panel-heading">
        <h1 class="panel-title"><h3> <span class="glyphicon glyphicon-ok" aria-hidden="true"> </span>
         &nbsp Ordenes de compra </h3></h1>
      </div>
            
      <div class="panel-body">
        <?php
          $orden = $this->User_model->ordenes_compra();

          echo '<div class="table-responsive">';
          echo '<table id = "tabla_clientes" class="table table-striped table-bordered">';
          
          echo '<thead>';
            echo '<tr>';
              echo '<th> <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span> &nbsp Producto</th>';
              echo '<th> <span class="glyphicon glyphicon-registration-mark" aria-hidden="true"> </span> &nbsp Marca</th>';
              echo '<th> <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> </span> &nbsp Proveedor</th>';              
              echo '<th> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> </span> &nbsp Cantidad</th>';
              echo '<th> <span class="glyphicon glyphicon-object-align-vertical" aria-hidden="true"> </span> &nbsp Peso Unitario(g)</th>';     
              echo '<th> <span class="glyphicon glyphicon-usd" aria-hidden="true"> </span> &nbsp Precio</th>';  
                 
              echo '<th> <span class="glyphicon glyphicon-ok" aria-hidden="true"> </span> &nbsp Acción</th>';
            echo '</tr>';
          echo '</thead>';

          echo '<tbody>';


          foreach ($orden->result() as $ordenes) {
              echo '<tr>';
              echo '<td>'.$ordenes->producto.'</td>';
              echo '<td>'.$ordenes->marca.'</td>';
              echo '<td>'.$ordenes->proveedor.'</td>';
              echo '<td>'.$ordenes->cantidad.'</td>';
              echo '<td>'.$ordenes->peso.'</td>';
              echo '<td>'.$ordenes->precio.'</td>';       

              
              
              $url_aprobar = base_url() . 'index.php/user_controller/aprobar_orden_compra?id='.$ordenes->id;
              echo '<td><a href= "#" class="btn btn-success" data-toggle="modal" data-target="#modal_aprobar" role="button">Aprobar</a></td>';

              echo '<div class="modal fade" id="modal_aprobar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
              echo '  <div class="modal-dialog" role="document">';
              echo '    <div class="modal-content">';
              echo '      <div class="modal-header">';
              echo '        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
              echo '        <h4 class="modal-title" id="myModalLabel">Confirmación de aprobación</h4>';
              echo '      </div>';
              echo '      <div class="modal-body">';
              echo ' ¿Esta seguro que desea aprobar la orden?';
              echo '      </div>';
              echo '      <div class="modal-footer">';
              echo '        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
              echo '        <a href="' . $url_aprobar . '" "#" class="btn btn-success" role="button">Aprobar compra</a>';
              echo '      </div>';
              echo '    </div>';
              echo '  </div>';
              echo '</div>';

            echo '</tr>';
          }
          echo '</tbody>';

          echo '</table>';
          echo '</div>';
        ?>
      </div>
    </div>
  </div>


  </div>



</body>
</html>
