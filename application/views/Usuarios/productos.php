
<!DOCTYPE html>




  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
   
    
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h1 class="panel-title"><h3> <span class="glyphicon glyphicon-th-list" aria-hidden="true"> </span>
         &nbsp Inventario</h3></h1>
      </div>
            
      <div class="panel-body">
       
        
        <h1 class="page-header">Productos:</h1>

        <?php 
          

          $productos = $this->User_model->inventario();
          if ($productos)
          {

            echo '<div class="table-responsive">';
            echo '<table id = "tabla_clientes" class="table table-striped table-bordered">';
            
            echo '<thead>';
              echo '<tr>';
                echo '<th> <span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span> &nbsp Producto</th>';
                echo '<th> <span class="glyphicon glyphicon-registration-mark" aria-hidden="true"> </span> &nbsp Marca</th>';
                echo '<th> <span class="glyphicon glyphicon-object-align-vertical" aria-hidden="true"> </span> &nbsp Peso</th>';    
                echo '<th> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"> </span> &nbsp Cantidad</th>';
                         
          

                       
              echo '</tr>';
            echo '</thead>';

            echo '<tbody>';
            
             



            foreach ($productos->result() as $prod) {

                
               
                
                echo '<tr>';                
                echo '<td>'.$prod->nombre.'</td>';                
                echo '<td>'.$prod->marca.'</td>';
                echo '<td>'.$prod->peso.'</td>';
                echo '<td>'.$prod->cantidad.'</td>';                
                echo '</tr>';
              
               

                
            }
            
          }
          

        ?>
      </div>
      </div>
      </div>
    </div>

</body>
</html>
