const registro = document.getElementById('regis');
const inputs2 = document.querySelectorAll('#regis input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,15}$/, // 4 a 15 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos2 = {
    nombre: false,
    email: false,
    password: false
}

const validarRegistro = (p) => {
    switch (p.target.name) {
        case "nombre_admin":
            validarCampo2(expresiones.usuario, p.target, 'nombre');
        break;

        case "correo_administrador":
            validarCampo2(expresiones.correo, p.target, 'email');
        break;

        case "contrasena_administrador":
            validarCampo2(expresiones.password, p.target, 'password');
        break;
    }
}

const validarCampo2 = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`grupo_${campo}`).classList.remove('txtb-error');
        document.getElementById(`grupo_${campo}`).classList.add('txtb-bien');
        document.querySelector(`#grupo__${campo} .error_ins`).classList.remove('error_ins-active');
        campos2[campo] = true;
    }else{
        document.getElementById(`grupo_${campo}`).classList.add('txtb-error');
        document.getElementById(`grupo_${campo}`).classList.remove('txtb-bien');
        document.querySelector(`#grupo__${campo} .error_ins`).classList.add('error_ins-active');
        campos2[campo] = false;
    }
}

inputs2.forEach((input) => {
    input.addEventListener('keyup',validarRegistro);
    input.addEventListener('blur',validarRegistro);
});

registro.addEventListener('submit', (b) => {
    if(campos2.nombre && campos2.email && campos2.password){

    }else{
        b.preventDefault();
    }
});

$(".txtb input").keyup(function(){
    if(campos2.nombre && campos2.email && campos2.password){
        $(".logbtn").attr("disabled", false);
        $(".logbtn").addClass("logbtn-active");
    }else{
        $(".logbtn").attr("disabled", true);
        $(".logbtn").removeClass("logbtn-active");
    }
});