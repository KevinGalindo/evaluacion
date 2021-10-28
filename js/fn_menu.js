const caja = document.querySelector('.box');
var c = 0;

function pop() {
    if(c == 0){
        document.getElementById('.box').style.display = "block";

        c = 1;
    }
}



const btn_menu = document.querySelector('.menu-icon');
const menu =  document.querySelector('.navegacion ul');

btn_menu.addEventListener('click', function(){

    if (menu.classList.contains('show')){
    menu.classList.remove('show');
    }else{
        menu.classList.add('show');
    }
});

