 $(document).ready(function(){



    function obtener_datos()
    {
        $.ajax({
            url: "../controlador/Usuarios/UserTable.php",
            method: "POST",
            success: function(data)
            {
                $("#Mostrar").html(data);
            }
        });
    }
    obtener_datos();

    $(document).on("click","#Eliminar",function (){
        if(confirm("¿Esta seguro que desea elminar este usuario?"))
        {
            var id = $(this).data("id");
            //alert(id);
            $.ajax({
                url: "../controlador/Usuarios/Eliminar.php",
                method: "POST",
                data: {id: id,},
                success: function(data){
                    //obtener_datos();
                    obtener_datos();
                    //var nota = alertify.notify(data,'success',5,function(){console.log('dissmissed');});
                    alert(data);
                }
            });
        }
    });
//Esta webada manda el id haciendo la consulta para mostrar los datos del id seleccionado alv :v
    $(document).on('click','.edit',function(){
        var id=$(this).attr("id");

        $.ajax({
            url: "../controlador/Usuarios/ConsultaEditar.php",
            method: "POST",
            data: {id: id,},
            dataType: "json",
            success: function(data)
            {
                $('#mcode').val(data.Id_Usuario);
                $('#mUsuario').val(data.Usuario);
                $('#mTipoU').val(data.tipo_usuario);
            }
        });

    });
//Con los datos mostrados en modal esta es la Actualizacion alv :v 
$("#EditarDatos").submit(EditarCliente);

function EditarCliente(event)
{
    event.preventDefault();

    var Datos=new FormData($("#EditarDatos")[0]);
    var Ruta="../controlador/Usuarios/Editar.php"

    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            //var nota = alertify.notify(Datos,'success',5,function(){console.log('dissmissed');});
            alert(Datos);
            obtener_datos();
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+''+Datos.statusText);
        }
    })
}

$("#Users").submit(IsertarEquipo);

function IsertarEquipo(event)
{
    event.preventDefault();

    var Datos=new FormData($("#Users")[0]);
    var Ruta="../controlador/Usuarios/Usuarios.php"
    var Reset=document.getElementById('Users').reset();
    $.ajax({
        url: Ruta,
        type: 'POST',
        data: Datos,
        contentType: false,
        processData: false,
        success: function(Datos)
        {
            //var nota = alertify.notify(Datos,'success',5,function(){console.log('dissmissed');});
            alert(Datos);
            obtener_datos();
            Reset;
        },
        error: function(Datos)
        {
            console.log("ERROR "+Datos.status+' '+Datos.statusText);
        }
    })
}


});