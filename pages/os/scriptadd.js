let pai = document.querySelector('#addInput')
let index = 1
let row = document.createElement('div');
let col10 = document.createElement('div');
let formgroup1 = document.createElement('div');
let label1 = document.createElement('label');
let input1 = document.createElement('input');

let col2 = document.createElement('div');
let formgroup2 = document.createElement('div');
let label2 = document.createElement('label');
let input2 = document.createElement('input');


function add (){
pai.appendChild(row);
row.setAttribute('class','row');   
row.setAttribute('id',"row"+index);
document.querySelector('#row'+index).appendChild(col10);
col10.setAttribute('class','col-md-10');
col10.setAttribute('id','col10'+ index);
document.querySelector('#col10'+ index).appendChild(formgroup1);
formgroup1.setAttribute('class','form-group');
formgroup1.setAttribute('id','formgroup1'+ index);
document.querySelector('#col10'+ index).appendChild(label1);
label1.setAttribute('class','form-control-label');
label1.setAttribute('id','formgroup1'+ index);
label1.innerText = 'Descrição'
document.querySelector('#formgroup1'+ index).appendChild(input1);
input1.setAttribute('class','form-control');
input1.setAttribute('id','input'+ index);

col2.setAttribute('class','col-md-2');
col2.setAttribute('id','col2'+ index);
document.querySelector('#col2'+ index).appendChild(formgroup2);
formgroup2.setAttribute('class','form-group');
formgroup2.setAttribute('id','formgroup1'+ index);
document.querySelector('#col2'+ index).appendChild(label2);
label2.setAttribute('class','form-control-label');
label2.setAttribute('id','formgroup1'+ index);
label2.innerText = 'Quantidade'
document.querySelector('#formgroup1'+ index).appendChild(input2);
input2.setAttribute('class','form-control');
input2.setAttribute('id','input'+ index);
index++
}