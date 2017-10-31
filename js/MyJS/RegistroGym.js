with (document.registroGym) {
    onsubmit = function (e) {
        e.preventDefault();
        ok = true;

        if (ok && txtNombre.value == "") {
            ok = false;
            alert("debe ingresar un Nombre");
            txtNombre.focus();
        }
        if (ok && txtEmail.value == "") {
            ok = false;
            alert("Debe Ingresar Una Direccion");
            txtEmail.focus();
        }
        if (ok && txtTelefono.value == "") {
            ok = false;
            alert("Debe ingresar un Numero de Telefono ");
            txtTelefono.focus();
        }
        if (ok && txtLatitud.value == "") {
            ok = false;
            alert("Debe ingresar  el apellido correspondiente");
        }
        if (ok && txtLongitud.value == "") {
            ok = false;
            alert("Debe ingresar el apellido correspondiente");
            txtApellidoDos.focus();
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

