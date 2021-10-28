const inciar = document.getElementById('iniciar');
const inputs = document.querySelectorAll('#iniciar input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,15}$/, // 4 a 15 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
    email: false,
    password: false
}

const validariniciar = (e) => {
    switch (e.target.name) {
        case "correo_administrador":
            validarCampo(expresiones.correo, e.target, 'email');
        break;

        case "contrasena_administrador":
            validarCampo(expresiones.password, e.target, 'password');
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
    if(campos.email && campos.password){

    }else{
        e.preventDefault();
    }
});

/** ----------------------Esto es para registrar datos--------------------------*/

const registro = document.getElementById('regis');
const inputs2 = document.querySelectorAll('#regis input');

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
        document.getElementById(`grupo2__${campo}`).classList.remove('register-error');
        document.getElementById(`grupo2__${campo}`).classList.add('register-bien');
        document.querySelector(`#grupo2__${campo} .error_ins`).classList.remove('error_ins-active');
        campos2[campo] = true;
    }else{
        document.getElementById(`grupo2__${campo}`).classList.add('register-error');
        document.getElementById(`grupo2__${campo}`).classList.remove('register-bien');
        document.querySelector(`#grupo2__${campo} .error_ins`).classList.add('error_ins-active');
        campos2[campo] = false;
    }
}

inputs2.forEach((input) => {
    input.addEventListener('keyup',validarRegistro);
    input.addEventListener('blur',validarRegistro);
});

/*termino.validarinp(() =>{
    if(campos2.nombre && campos2.email && campos2.password && terminos.checked){
        document.querySelector('#grupo2__terminos .regist_btn').attr("disabled", false);
        document.querySelector('#grupo2__terminos .regist_btn').classList.add('active');
    }else{
        document.querySelector('#grupo2__terminos .regist_btn').attr("disabled", true);
        document.querySelector('#grupo2__terminos .regist_btn').classList.remove('active');
    }
});*/

const terminos = document.getElementById('terminos');
registro.addEventListener('submit', (b) => {

    
    if(campos2.nombre && campos2.email && campos2.password && terminos.checked){
        console.log("bien");
    }else{      
        b.preventDefault();
        console.log("mla");
    }
});

/**-----------------------Esto hace que facos y checbox------------------------- */

/*$(".textbox input").focusout(function(){
    if($(this).val() == ""){
      
        $(this).css("border","2px solid #e74c3c");
    }else{

       // $(this).css("border","2px solid #afafaf");
    }
});*/

/*$(".register-box input").focusout(function(){
    if($(this).val() == ""){
        
        $(this).css("border","2px solid #e74c3c");
    }else{
       /*$(this).siblings().addClass("hidden");
        $(this).css("border","2px solid #afafaf");
    }
});*/

$(".textbox input").keyup(function(){
    var inputs = $(".textbox input");
    if(campos.email && campos.password){
        $(".login-btn").attr("disabled", false);
        $(".login-btn").addClass("active");
    }else{
        $(".login-btn").attr("disabled", true);
        $(".login-btn").removeClass("active");
    }
});

$(".register-box input").keyup(function(){
    var inputs = $(".register-box input");
    if(campos2.nombre && campos2.email && campos2.password ){
        $(".regist-btn").attr("disabled", false);
        $(".regist-btn").addClass("active");
    }else{
        $(".regist-btn").attr("disabled", true);
        $(".regist-btn").removeClass("active");
    }
});

$("#alert").click(function(){
    $(this).toggleClass("active");
});

$(".dont-have-account").click(function(){
$(this).toggleClass("active");
$(".login-insert").toggleClass("active");
$(".login-form").toggleClass("active");
});
