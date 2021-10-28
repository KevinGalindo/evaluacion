const inciar = document.getElementById('re_con');
const inputs = document.querySelectorAll('#re_con input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,15}$/, // 4 a 15 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
    email: false 
}

const validariniciar = (e) => {
    switch (e.target.name) {
        case "email":
            validarCampo(expresiones.correo, e.target, 'email');
        break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('textbox-error');
        document.getElementById(`grupo__${campo}`).classList.add('textbox-bien');
        document.querySelector(`#grupo__${campo} .error_ins`).classList.remove('error_ins-active');
        campos[campo] = true;
    }else{
        document.getElementById(`grupo__${campo}`).classList.add('textbox-error');
        document.getElementById(`grupo__${campo}`).classList.remove('textbox-bien');
        document.querySelector(`#grupo__${campo} .error_ins`).classList.add('error_ins-active');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup',validariniciar );
    input.addEventListener('blur',validariniciar );
});

inciar.addEventListener('submit', (e) => {
    if(campos.email){

    }else{
        e.preventDefault();
    }
});

$(".textbox input").keyup(function(){
    var inputs = $(".textbox input");
    if(campos.email){
        $(".re_btn").attr("disabled", false);
        $(".re_btn").addClass("active");
    }else{
        $(".re_btn").attr("disabled", true);
        $(".re_btn").removeClass("active");
    }
});

$("#alert").click(function(){
    $(this).toggleClass("active");
});