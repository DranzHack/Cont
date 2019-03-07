<?php
#header("location: a/login.php");
$title="Login";
include_once 'conf/path.php';
?>

<!DOCTYPE html>
<html>
	<?php include_once __DIR__.'/vistas/resources/head.php'; ?>
    
    <body class="hm-gradient">
    
    <main>
        
        
        
        <div class="container mt-4">

            <div class="text-center darken-grey-text mb-4">
                <h1 class="font-bold mt-4 mb-3 h5">Start Session</h1>
                
            </div>

            
            <form id="loginForm" method="POST" onsubmit="return Login();">
                <div class="col-md-12 mb-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center default-text py-3"><i class="fa fa-lock"></i> Login:</h3>
                            
                            <div class="md-form">
                                <i class="fa fa-user prefix grey-text"></i>
                                <input type="text" id="defaultForm-email" name="User" class="form-control" required>
                                <label for="defaultForm-email">Your username</label>
                            </div>
                            <div class="md-form">
                                <i class="fa fa-lock prefix grey-text"></i>
                                <input type="password" id="defaultForm-pass" name="Pass" class="form-control" required>
                                <label for="defaultForm-pass">Your password</label>
                            </div>
                            <div class="text-center">
                                <div id="alert" style="color:red"></div>
                                <input type="submit" class="btn btn-default waves-effect waves-light" value="Start Session">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
          
            

        </div>

     
      
    </main>
    
      
      
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
    
  
</body>


<script type="text/javascript">

	

	function Login()
{
	var formulario=document.getElementById("loginForm");
	var formData=new FormData($("#loginForm")[0]);
	var Ruta="controlador/Login/Session.php";
	var Limpiar=document.getElementById('loginForm').reset();
		$.ajax({
			url: Ruta,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			success: function(datos)
			        {
				   $('#alert').html(datos);

				   Limpiar;
			        },
			error: function (datos)
			        {
			           console.log("ERROR "+ datos.status + '' + datos.statusText);
			        }
		});
		return false
}


</script>

</html>

