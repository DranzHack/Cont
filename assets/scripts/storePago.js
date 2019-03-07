function getClient(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	client.innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../controlador/selectClient.php", true);
  xhttp.send();
}

function getProv(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	Prov.innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../controlador/selectProov.php", true);
  xhttp.send();
}

getClient();
getProv();

function insertPago() {
  var form = new FormData(pago);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	alert('El pago ha sido registrado');
    }
  };
  xhttp.open("POST", "../controlador/insertPago/insertPago.php", true);
  xhttp.send(form);
}

send.addEventListener(
	'click',
	insertPago
);