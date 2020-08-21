function validacaoEmail(field) {
	usuario = field.value.substring(0, field.value.indexOf("@"));
	dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
	if ((usuario.length >=1) &&
		(dominio.length >=3) && 
		(usuario.search("@")==-1) && 
		(dominio.search("@")==-1) &&
		(usuario.search(" ")==-1) && 
		(dominio.search(" ")==-1) &&
		(dominio.search(".")!=-1) &&      
		(dominio.indexOf(".") >=1)&& 
		(dominio.lastIndexOf(".") < dominio.length - 1)) {
		document.getElementById("msgemail").innerHTML="E-mail válido";
		alert("email valido");
	}else{
		document.getElementById("msgemail").innerHTML="<font color='red'>Email inválido </font>";
		alert("E-mail invalido");
	}
}

function validarCPF(cpf) {	
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') alert("CPF invalido!");

	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999") alert("CPF invalido!");

	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++) add += parseInt(cpf.charAt(i)) * (10 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	rev = 0;	
	if (rev != parseInt(cpf.charAt(9))) alert("CPF invalido!");

	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++) add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	rev = 0;	
	if (rev != parseInt(cpf.charAt(10))) alert("CPF invalido!");

	alert("email valido");
}