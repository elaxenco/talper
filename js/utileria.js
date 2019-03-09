$(document).ready(function(){

 

});

function soloNumeros(e){
	let key = window.Event ? e.which : e.keyCode
	return ((key>=48 && key <=57) || (key==8) || (key==46) )
}

function soloLetras(e){
	let key = window.Event ? e.which : e.keyCode
	return ((key>=65 && key <=90) || (key==32) || (key==8) || (key>=97 && key <=122) || (key>=192 && key<=250) )
}