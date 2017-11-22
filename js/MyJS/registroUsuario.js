with(document.registroUsuario){
    onsubmit = function(e){
        e.preventDefault();
        ok = true;
        if(ok && image.value == ""){
            ok=false;
            alert("Debe seleccionar una foto de perfil");
            txtConfPass.focus();
        }
        if(ok && txtName.value==""){
            ok=false;
            alert("Debe escribir su nombre");
            txtName.focus();
        }
        if(ok && txtSurnames.value==""){
            ok=false;
            alert("Debe sus apellidos");
            txtSurnames.focus();
        }
        if(ok && txtId.value==""){
            ok=false;
            alert("Debe ingresar el número de cédula");
            txtId.focus();
        }
        if(ok && txtPhone.value==""){
            ok=false;
            alert("Debe escribir su teléfono");
            txtPhone.focus();
        }
        if(ok && txtEmail.value==""){
            ok=false;
            alert("Debe escribir su email");
            txtEmail.focus();
        }
         if(ok && txtAge.value <= 0 || txtAge.value == ""){
            ok=false;
            alert("Edad requerida");
            txtEmail.focus();
        }
         if(ok && txtAdress.value==""){
            ok=false;
            alert("Dirección requerida");
            txtEmail.focus();
        }
        if(ok && txtUser.value==""){
            ok=false;
            alert("Debe escribir su usuario");
            txtUser.focus();
        }
        if(ok && txtPass.value==""){
            ok=false;
            alert("Debe escribir su password");
            txtPass.focus();
        }
        if(ok && txtConfPass.value==""){
            ok=false;
            alert("Debe escribir su confirmacion de password");
            txtConfPass.focus();
        }
        if(ok && txtPass.value!= txtConfPass.value){
            ok=false;
            alert("Los passwords no coinciden");
            txtConfPass.focus();
        }
        if(ok){ submit(); }
    }
}

document.querySelector('#blah').addEventListener('click', fotoPerfil);
function fotoPerfil() {
    var obj = document.getElementById("image");
    if (obj) {
        obj.click();
    }
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('blah').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}







