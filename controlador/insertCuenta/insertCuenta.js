/*instr.addEventListener
(
	'click',
	insertCuenta
);

document.addEventListener(
	'click',
	(x)=>x.target.tagName=='INPUT'&&x.target.getAttribute("type")=='radio'?showForm():0
);

function showForm(){
	if(document.querySelector('input[name="tipoc"]:checked').value==1)
	{
		clientForm.style="display:none";
		proovForm.style="display:block";
	}
	else {
		proovForm.style="display:none";
		clientForm.style="display:block";
	}

}

function insertCuenta() {
  var form = new FormData(cuentaForm);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	cuentaForm.reset();
    	alert("Cuenta registrada");
    }
  };
  xhttp.open("POST", "insert.php", true);
  xhttp.send(form);
}*/

function showForm(){
	if(document.querySelector('input[name="tipoc"]:checked').value==1)
	{
		clientForm.style="display:none";
		proovForm.style="display:block";
	}
	else {
		proovForm.style="display:none";
		clientForm.style="display:block";
	}

}

function insertCuentas() {
  var form = new FormData(cuentaForm);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	cuentaForm.reset();
    	alert(this.responseText);
    }
  };
  xhttp.open("POST", "/VicomNet/cont/controlador/insertCuenta/insert.php", true);
  xhttp.send(form);
}


document.getElementById('instr').addEventListener('click',insertCuentas);

document.addEventListener(
	'click',
	(x)=>x.target.tagName=='INPUT'&&x.target.getAttribute("type")=='radio'?showForm():0
);
