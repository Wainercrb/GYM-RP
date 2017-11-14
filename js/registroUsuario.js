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
        if(ok && txtHeight.value <= 0 || txtHeight.value == ""){
            ok=false;
            alert("Debe agregar su altura válida");
            txtHeight.focus();
        }
        if(ok && txtNeck.value <= 0 || txtNeck.value == ""){
            ok=false;
            alert("Debe agregar la medida de su cuello valida");
            txtNeck.focus();
        }
        if(ok && txtShoulders.value <= 0 || txtShoulders.value == ""){
            ok=false;
            alert("Debe agregar la medida de  sus hombros válida");
            txtShoulders.focus();
        }
        if(ok && txtChest.value <= 0 || txtChest.value == ""){
            ok=false;
            alert("Debe agregar la medida de su pecho válida");
            txtChest.focus();
        }
        if(ok && txtWaist.value <= 0 || txtWaist.value == ""){
            ok=false;
            alert("Debe agregar la medida de su cintura válida");
            txtWaist.focus();
        }
        if(ok && txtForearms.value <= 0 || txtForearms.value == ""){
            ok=false;
            alert("Debe agregar la medida de sus antebrazos válida");
            txtForearms.focus();
        }
        if(ok && txtThigh.value =="" || txtThigh.value == ""){
            ok=false;
            alert("Debe agregar la medida de sus pantorillas válida");
            txtThigh.focus();
        }
        if(ok && txtBiceps.value =="" || txtBiceps.value == ""){
            ok=false;
            alert("Debe agregar la medida de sus biceps válida");
            txtBiceps.focus();
        }
         if(ok && txtButtocks.value =="" || txtButtocks.value == ""){
            ok=false;
            alert("Debe agregar la medida de sus gluteos válida");
            txtButtocks.focus();
        }
         if(ok && txtHips.value =="" || txtHips.value == ""){
            ok=false;
            alert("Debe agregar la medida de su cadera válida");
            txtHips.focus();
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







