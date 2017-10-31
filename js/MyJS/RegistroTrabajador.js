with (document.registroTrabajador) {
    onsubmit = function (e) {
        e.preventDefault();
        ok = true;
        if (ok && txtNombre.value == "") {
            ok = false;
            alert("debe ingresar un Nombre");
            txtNombre.focus();
        }
        if (ok && txtApellidoUno.value == "") {
            ok = false;
            alert("Debe ingresar  el apellido correspondiente");
            txtApellidoUno.focus();
        }
        if (ok && txtApellidoDos.value == "") {
            ok = false;
            alert("Debe ingresar el apellido correspondiente");
            txtApellidoDos.focus();
        }
        if (ok && txtCedula.value == "") {
            ok = false;
            alert("Debe ingresar una Cedula");
            txtCedula.focus();
        }
        if (ok && txtDireccion.value == "") {
            ok = false;
            alert("Debe Ingresar Una Direccion");
            txtDireccion.focus();
        }
        if (ok && txtEmail.value == "") {
            ok = false;
            alert("Debe Ingresar una dirección de correo correcta");
            txtEmail.focus();
        }
        if (ok && txtTelefono.value == "") {
            ok = false;
            alert("Debe ingresar un Numero de Telefono ");
            txtTelefono.focus();
        }
        if (ok && txtUsuario.value == "") {
            ok = false;
            alert("Debe  ingresar un usuario");
            txtUsuario.focus();
        }
        if (ok && txtContrasena.value == "") {
            ok = false;
            alert("Debe  ingresar una contraseña");
            txtContrasena.focus();
        }
        if (ok && txtContrasena.value != txtConfContrasenna.value) {
            ok = false;
            alert("Los passwords no coinciden");
            txtContrasena.focus();
        }
        if (ok) {
            submit();
        }
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
        alert(input.files[0].src);
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('blah').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
