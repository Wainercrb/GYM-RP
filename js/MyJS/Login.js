with(document.ingresoLogin){
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
        if(ok){ submit(); }
  }
}
