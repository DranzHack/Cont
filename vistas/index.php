<?php
session_start();

$Role=$_SESSION['Privilegios'];

if(isset($_SESSION['Privilegios']))
    {

    }else{
        session_destroy();
        header('location: ../'); 
    }
?>
<!DOCTYPE html>
<html>
  <?php
    $title="Sistema Contable";
    include_once 'resources/head.php';
    include_once 'resources/navbar.php';
  ?>
  <body>
    <br>
    <br>
  	  <div class="container">
  <div class="card-group">
    <?php
        $html='';

    if($Role=='Capturista'){
      $html .='<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
      <div class="card-header">Cartera de Clientes</div>    
      <div class="card-body">
            <a title="cartera" href="cartera.php"><img class="card-img-top" src="../a/img/cartera.png" alt="Card image cap"></a>      
      </div>
    </div>
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
      <div class="card-header">Ingresar Un Movimiento</div>    
      <div class="card-body">
            <a title="cartera" href="storePago.php"><img class="card-img-top" src="../a/img/cobrar.png" alt="Card image cap"></a>      
      </div>
    </div>
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
      <div class="card-header">Ver Movimientos</div>    
      <div class="card-body">
            <a title="cartera" href="datosgenerales.php"><img class="card-img-top" src="../a/img/pagar.png" alt="Card image cap"></a>      
      </div>
    </div>';
        
    }
    elseif ($Role=='Administrador') {
      $html .='<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
      <div class="card-header">Usuarios</div>    
      <div class="card-body">
            <a title="usuarios" href="Usuarios.php"><img class="card-img-top" src="../a/img/usuarios.png" alt="Card image cap"></a>      
      </div>
    </div>';
    }

    echo $html;
?>
    

  </div>
</div>
      <?php include_once 'resources/footer.php'; ?>
  </body>
</html>