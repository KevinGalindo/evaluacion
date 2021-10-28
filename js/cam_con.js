const inciar = document.getElementById('cam_con');
const inputs = document.querySelectorAll('#cam_con input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,15}$/, // 4 a 15 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
    password: false 
}

const validariniciar = (e) => {
    switch (e.target.name) {
        case "contrasena_administrador":
            validarCampo(expresiones.password, e.target, 'password');
            validarPassword2();
        break;

        case "password2" :
            validarPassword2();
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

const validarPassword2 = () => {
    const inputpassword1 = document.getElementById('password');
    const inputpassword2 = document.getElementById('password2');

    if(inputpassword1.value !== inputpassword2.value){
        document.getElementById(`grupo__password2`).classList.add('textbox-error');
        document.getElementById(`grupo__password2`).classList.remove('textbox-bien');
        document.querySelector(`#grupo__password2 .error_ins`).classList.add('error_ins-active');
        campos['password'] = false;
    }else{
        document.getElementById(`grupo__password2`).classList.remove('textbox-error');
        document.getElementById(`grupo__password2`).classList.add('textbox-bien');
        document.querySelector(`#grupo__password2 .error_ins`).classList.remove('error_ins-active');
        campos['password'] = true;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup',validariniciar );
    input.addEventListener('blur',validariniciar );
});

inciar.addEventListener('submit', (e) => {
    if(campos.password){

    }else{
        e.preventDefault();
    }
});

$(".textbox input").keyup(function(){
    var inputs = $(".textbox input");
    if(campos.password){
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