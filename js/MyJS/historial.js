with(document.registroUsuario){
    onsubmit = function(e){
        e.preventDefault();
        ok = true;
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








