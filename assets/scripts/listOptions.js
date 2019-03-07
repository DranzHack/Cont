function edit(form){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	console.log(JSON.parse(this.responseText))
    }
  };
  xhttp.open("POST", "../controlador/getAccount/getAccount.php", true);
  xhttp.send(form);
}

function actions(x){
	var form = new FormData();
	form.append("account",x.value);
	form.append("persona",actualVal);
	if(x.classList.contains("edit")){
		edit(form);
	}
	else if(x.classList.contains("eliminar")){
		console.log("delete "+x.value);
	}
}

document.addEventListener(
	'click',
	(x)=>actions(x.target)
);
