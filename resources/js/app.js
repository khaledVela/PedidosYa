import './bootstrap';
const sumar = document.getElementById("sum");
const restar = document.getElementById("res");
const contador = document.getElementById("cantidadgen");
const total = document.getElementById('total');
const stock = document.getElementById('stock');


const precio_venta = document.getElementById('precio_venta');
const precio_total = document.getElementById('precio_total');
const cantidad = document.getElementById("cantidad");


contador.value = 1;
let precio = precio_venta.value;
let numero = 1;

sumar.addEventListener("click", function (e){
    e.preventDefault();
    if(numero == parseInt(stock.innerHTML)){
        numero = parseInt(stock.innerHTML);
    }
    else{
        numero++;
        contador.innerHTML = numero;
        cantidad.value = numero;
        precio_total.value = precio * numero;
        total.innerHTML = precio_total.value;
    }
});

restar.addEventListener("click", function (e){
    e.preventDefault();
    if(numero==0){}
    else{
        numero--;
        contador.innerHTML = numero;
        cantidad.value = numero;
        precio_total.value = precio * numero;
        total.innerHTML = precio_total.value;
    }

});

