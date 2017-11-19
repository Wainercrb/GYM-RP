var usuariosCargados = [];
var rutinaCargadas = [];
$("#btnMembers").on("click", function () {
    $("#modalMiembros").modal();
});

function usuarioExiste() {
    var input = document.getElementById("btnBuscarUsuario").value;
    for (var i = 0; i < usuariosAñadidos.length; i++) {
        if (usuariosAñadidos[i].usuario === input) {
            anadirColumna(usuariosAñadidos[i]);
            return;
        }
    }
    alert("no existe");
}

function usuarioAgregado() {
    var input = document.getElementById("btnBuscarUsuario").value;
    for (var i = 0; i < usuariosCargados.length; i++) {
        if (usuariosCargados[i] === input) {
            return true;
        }
    }
    return false;
}
function anadirColumna(usu) {
    if (usuarioAgregado()) {
        alert("Usuario  ya esta agregado");
        return;
    }
    var table = document.getElementById("tblGrid");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = '<input type="text" readonly id = "input-table" value=' + usu.id + ' class="form-control" name="usuario[]"  />';
    cell2.innerHTML = '<input type="text" readonly id = "input-table" value=' + usu.nombreCompleto + ' class="form-control" name="" />';
    cell3.innerHTML = '<input type="text" readonly id = "input-table" value=' + usu.usuario + ' class="form-control" name="" onclick="eliminarFilaUsuario(this);" />';
    document.getElementById("btnBuscarUsuario").value = "";
    usuariosCargados.push(usu.usuario);
}

function agregarEjercicio() {
    if (document.getElementById("txtSeries").value <= 0 || document.getElementById("txtRepeticiones").value <= 0) {
        alert("Error verifica la rutina");
        return;
    } else if (document.getElementById('tblGrid').rows.length === 1) {
        alert("No hay usuarios para esta rutina");
        return;
    }
    var table = document.getElementById("tbRutina");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var tipo = document.getElementById("tipoEjercicio").value;
    var cuerpo = document.getElementById("tipoCuerpo").value;
    var maquina = document.getElementById("tipoMaquina").value;
    cell1.innerHTML = '<input type="text" readonly id = "input-table" value=' + tipo + ' class="form-control" name="lugarTonificar[]" onclick="eliminarFilaRutina(this);" />';
    cell2.innerHTML = '<input type="text" readonly id = "input-table" value=' + cuerpo + ' class="form-control" name="equipo[]" onclick="eliminarFilaRutina(this);"/>';
    cell3.innerHTML = '<input type="text" readonly id = "input-table" value=' + maquina + ' class="form-control" name="tipo[]" onclick="eliminarFilaRutina(this);"/>';
    cell4.innerHTML = '<input type="text" readonly id = "input-table" value=' + document.getElementById("txtSeries").value + ' class="form-control" name="series[]" onclick="eliminarFilaRutina(this);"/>';
    cell5.innerHTML = '<input type="text" readonly id = "input-table" value=' + document.getElementById("txtRepeticiones").value + ' class="form-control" name="repeticiones[]" onclick="eliminarFilaRutina(this);"/>';

}



function eliminarFilaRutina(btndel) {
    var alertConf = confirm("¿Quieres eliminar la fila que contiene a : " + btndel.value + "?");
    if (alertConf === true) {
        if (typeof (btndel) == "object") {
            $(btndel).closest("tr").remove();
        } else {
            return false;
        }
    }
}

function eliminarFilaUsuario(btndel) {
    var alertConf = confirm("¿Quieres eliminar la fila que contiene a : " + btndel.value + "?");
    if (alertConf === true) {
        for (var i = 0; i < usuariosCargados.length; i++) {
            if (usuariosCargados[i] === btndel.value) {
                usuariosCargados.splice(i, 1);
            }
        }
        if (typeof (btndel) == "object") {
            $(btndel).closest("tr").remove();
        } else {
            return false;
        }
    }
}
function grupoCompleto() {
    alert(usuariosCargados.length);
    if (usuariosCargados.length === 0) {
        alert("Erro :( No hay usuarios agregados");
        return;
    }
    var alC = confirm("¿Quieres cerra el grupo?");
    if (alC === true) {
        document.getElementById("btnAnadir").disabled = true;

        for (var i = 0; i < usuariosCargados.length; i++) {
            var table = document.getElementById("tabla_medidas");
            var row = table.insertRow(1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            var cell9 = row.insertCell(8);
            var cell10 = row.insertCell(9);
            var cell11 = row.insertCell(10);
            var cell12 = row.insertCell(11);
            var cell13 = row.insertCell(12);
            cell1.innerHTML = '<input  type="text" style="width: 7em;" id = "txt_usuario" value= ' + usuariosCargados[i] + ' class="form-control" name="md[]" />';
            cell2.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_altura" value= "" class="form-control" name="md[]" />';
            cell3.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_peso" value= "" class="form-control" name="md[]" />';
            cell4.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_cuello" value= "" class="form-control" name="md[]" />';
            cell5.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_hombros" value= "" class="form-control" name="md[]" />';
            cell6.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_pecho" value= "" class="form-control" name="md[]" />';
            cell7.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_cintura" value= "" class="form-control" name="md[]" />';
            cell8.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_antebrazo" value= "" class="form-control" name="md[]" />';
            cell9.innerHTML = '<input  type="number" style="width: 7em;" step=0.01  id = "txt_muzlo" value= "" class="form-control" name="md[]" />';
            cell10.innerHTML = '<input type="number" style="width: 7em;" step=0.01  id = "txt_pantorrilla" value= "" class="form-control" name="md[]" />';
            cell11.innerHTML = '<input type="number" style="width: 7em;" step=0.01  id = "txt_biceps" value= "" class="form-control" name="md[]" />';
            cell12.innerHTML = '<input type="number" style="width: 7em;" step=0.01  id = "txt_cluteos" value= "" class="form-control" name="md[]" />';
            cell13.innerHTML = '<input type="number" style="width: 7em;" step=0.01  id = "txt_caera" value= "" class="form-control" name="md[]" />';
        }

    }
}


function anadirColumnaComida() {
    var cantidad = document.getElementById("txtCantidadComida").value;
    var comida = document.getElementById("tipoComida").value;
    var hora = document.getElementById("txtTiempo").value;
    var fecha = document.getElementById("txtFecha").value;
    var detalles = document.getElementById("txtDetalle").value;
    alert(hora);
    if (cantidad <= 0 || comida === "" || hora === "" || !Date.parse(fecha) || detalles === "") {
        alert("Error :( Verifica los datos de las comidas");
        return;
    }
    var table = document.getElementById("tabla_comidas");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<input type="text" style="width: 3em;" readonly id = "input-table" value="' + cantidad + '" class="form-control" name="cantidadComida[]" onclick="eliminarFilaComida(this);" />';
    cell2.innerHTML = '<input type="text" style="width: 10em;" readonly id = "input-table" value="' + comida + '" class="form-control" name="comida[]" onclick="eliminarFilaComida(this);" />';
    cell3.innerHTML = '<input type="text" style="width: 6em;" readonly id = "input-table" value="' + hora + '" class="form-control" name="horaC[]" onclick="eliminarFilaComida(this);" />';
    cell4.innerHTML = '<input type="text" style="width: 7em;" readonly id = "input-table" value="' + fecha + '" class="form-control" name="fechaC[]" onclick="eliminarFilaComida(this);" />';
    cell5.innerHTML = '<input type="text" style="width: 25em;" readonly id = "input-table" value= "' + detalles + '" class="form-control" name="detalle[]" onclick="eliminarFilaComida(this);" />';
    cantidad.value = "";
    detalles.value = "";
    hora.value = "";
    fecha.value = "";
}


function eliminarFilaComida(btndel) {
    var alertConf = confirm("¿Quieres eliminar la fila que contiene a : " + btndel.value + "?");
    if (alertConf === true) {
        if (typeof (btndel) == "object") {
            $(btndel).closest("tr").remove();
        } else {
            return false;
        }
    }
}
}


