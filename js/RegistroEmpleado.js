with(document.registroEmpleado){
    onsubmit = function(e){
        e.preventDefault();
        ok = true;
       
        if(ok && txtUsuario.value==""){
            ok=false;
            alert("Debe  ingresar un usuario");
            txtUsuario.focus();
        }
        if(ok && txtContraseña.value==""){
           ok= false;
            alert("Debe  ingresar una contraseña");
            txtUsuario.focus();
        }
        if(ok && txtNombre.value==""){
         ok=false;
          alert("debe ingresar un Nombre");
          txtNombre.focus();
        }
        if(ok&& txtApellidoUno.value==""){
         ok= false;
        alert("Debe ingresar  el apellido correspondiente");
        txtApellidoUno.focus();
        }
        if(ok && txtApellidoDos.value==""){
        ok=false;
         alert("Debe ingresar el apellido correspondiente");
         txtApellidoDos.focus();
        }
        if(ok && txtCedula.value==""){
         ok=false;
         alert("Debe ingresar una Cedula");
         txtCedula.focus();
        }
        if(ok && txtDireccion.value==""){
        ok=false;
        alert("Debe Ingresar Una Direccion");
        txtDireccion.focus();
        }
        if(ok && txtTelefono.value==""){
         ok= false;
          alert("Debe ingresar un Numero de Telefono ");
          txtTelefono.focus();
        }
        if(ok){ submit(); }
  }
}