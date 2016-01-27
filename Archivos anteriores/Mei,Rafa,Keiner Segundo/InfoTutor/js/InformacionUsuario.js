function habilitarEdicion(){//habilita edicion de form en InformacionUsuario.php y Configuracion.php
    
    $("#nombre").prop( "disabled", false );
    $("#apellidos").prop( "disabled", false );
    $("#usuario").prop( "disabled", false );
    $("#correo").prop( "disabled", false );
    $("#nivel").prop( "disabled", false );
    $("#id").prop( "disabled", false );
    $("#id").prop( "readonly", true );
    
    $("#cambiar").css('visibility', 'visible');
    $("#cancelar").css('visibility', 'visible');
    
}

function cancelarEdicion(){//desabilita edicion de form en InformacionUsuario.php y Configuracion.php
    
    $("#nombre").prop( "disabled", true );
    $("#apellidos").prop( "disabled", true );
    $("#usuario").prop( "disabled", true );
    $("#correo").prop( "disabled", true );
    $("#nivel").prop( "disabled", true );
    $("#id").prop( "readonly", false );
    $("#id").prop( "disabled", true );
    
    $("#cambiar").css('visibility', 'hidden');
    $("#cancelar").css('visibility', 'hidden');
    
}

function cambiarFormularioDatos(){//muestra form de datos personales en configuracion.php
    
    $("#datos").css('visibility', 'visible');
    $("#datosPass").css('visibility', 'hidden');
    cancelarEdicion();
    
}

function cambiarFormularioPass(){//muestra form de cambiar contraseña en configuracion.php
    
    $("#datos").css('visibility', 'hidden');
    $("#datosPass").css('visibility', 'visible');
    cancelarEdicion();
    
}

function comprobarPass($pass){//comprueba la validez del cambio de contraseña en configuracion.php
    
    if(($("#pass1").val())!== ""+$pass){
        alert("La contraseña actual no es correcta");
    }else{
        $("#cambiarPassForm").submit();
    }
    
}

