function addImageModal(valor) {
    if (valor === "IC") {
        document.getElementById("imagenModal").src = "http://www.cometamagico.com.ar/images/IMC-medidas-peso.png";
    } else if (valor === "FC") {
        document.getElementById("imagenModal").src = "https://k44.kn3.net/taringa/3/2/4/9/6/9//tntoni/2A7.jpg?6082";
    } else if (valor === "ICC") {
        document.getElementById("imagenModal").src = "https://nutriclub.files.wordpress.com/2016/05/calcula-tu-peso-ideal-imc-icc1.jpg?w=247&h=156";
    }
}


function indiceMasaT(valor2) {
    if (valor2 < 18.5) {
        return  "BAJO PESO";
    } else if (valor2 > 18.5 && valor2 < 24.9) {
        return "NORMAL";
    } else if (valor2 > 25 && valor2 < 29.9) {
        return "SOBREPESO";
    } else if (valor2 > 30 && valor2 < 34.9) {
        return "OBECIDAD I";
    } else if (valor2 > 35 && valor2 < 39.9) {
        return "OBECIDAD II";
    } else if (valor2 > 40 && valor2 < 49.9) {
        return "OBECIDAD III";
    } else if (valor2 > 50) {
        return "OBECIDAD IV";
    }
    return "ERROR";
}
function indiceMasa(icc, gn) {
    if (gn === "Masculino") {
        if (icc < 0.85) {
            return "SIN RIESGO";
        } else if (icc > 0.85) {
            return "CON RIESGO";
        }
    } else if (gn === "Masculino") {
        if (icc < 0.94) {
            return "SIN RIESGO";
        } else if (icc > 0.85) {
            return "CON RIESGO";
        }
    }
    return "ERROR";
}

function indiceFrecuenciaCardiaca(edad, fc, gn) {
    if (edad > 20 && edad < 29 && gn === "Masculino") {
        if (fc > 86) {
            return  "MALA";
        } else if (fc > 70 && fc < 84) {
            return  "NORMAL";
        } else if (fc > 62 && fc < 68) {
            return  "BIEN";
        } else if (fc < 60) {
            return  "EXCELENTE";
        }
    } else if (edad > 30 && edad < 39 && gn === "Masculino") {
        if (fc > 86) {
            return  "MALA";
        } else if (fc > 72 && fc < 84) {
            return  "NORMAL";
        } else if (fc > 64 && fc < 68) {
            return  "BIEN";
        } else if (fc < 62) {
            return  "EXCELENTE";
        }
    } else if (edad > 40 && edad < 49 && gn === "Masculino") {
        if (fc > 89) {
            return  "MALA";
        } else if (fc > 74 && fc < 88) {
            return  "NORMAL";
        } else if (fc > 66 && fc < 72) {
            return  "BIEN";
        } else if (fc < 66) {
            return  "EXCELENTE";
        }
    } else if (edad > 50 && edad < 59 && gn === "Masculino") {
        if (fc > 90) {
            return  "MALA";
        } else if (fc > 74 && fc < 88) {
            return  "NORMAL";
        } else if (fc > 68 && fc < 74) {
            return  "BIEN";
        } else if (fc < 66) {
            return  "EXCELENTE";
        }
    } else if (edad > 60 && gn === "Masculino") {
        if (fc > 94) {
            return  "MALA";
        } else if (fc > 76 && fc < 90) {
            return  "NORMAL";
        } else if (fc > 70 && fc < 76) {
            return  "BIEN";
        } else if (fc < 68) {
            return  "EXCELENTE";
        }
    }
    if (edad > 20 && edad < 29 && gn === "Femenino") {
        if (fc > 96) {
            return  "MALA";
        } else if (fc > 78 && fc < 94) {
            return  "NORMAL";
        } else if (fc > 72 && fc < 76) {
            return  "BIEN";
        } else if (fc < 70) {
            return  "EXCELENTE";
        }
    } else if (edad > 30 && edad < 39 && gn === "Femenino") {
        if (fc > 98) {
            return  "MALA";
        } else if (fc > 80 && fc < 96) {
            return  "NORMAL";
        } else if (fc > 72 && fc < 78) {
            return  "BIEN";
        } else if (fc < 70) {
            return  "EXCELENTE";
        }
    } else if (edad > 40 && edad < 49 && gn === "Femenino") {
        if (fc > 100) {
            return  "MALA";
        } else if (fc > 80 && fc < 98) {
            return  "NORMAL";
        } else if (fc > 74 && fc < 78) {
            return  "BIEN";
        } else if (fc < 72) {
            return  "EXCELENTE";
        }
    } else if (edad > 50 && edad < 59 && gn === "Femenino") {
        if (fc > 104) {
            return  "MALA";
        } else if (fc > 84 && fc < 102) {
            return  "NORMAL";
        } else if (fc > 76 && fc < 82) {
            return  "BIEN";
        } else if (fc < 74) {
            return  "EXCELENTE";
        }
    } else if (edad > 60 && gn === "Femenino") {
        if (fc > 108) {
            return  "MALA";
        } else if (fc > 88 && fc < 106) {
            return  "NORMAL";
        } else if (fc > 78 && fc < 88) {
            return  "BIEN";
        } else if (fc < 78) {
            return  "EXCELENTE";
        }
    }
    return "ERROR";

}


