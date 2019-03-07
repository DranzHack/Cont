var actualVal = 0;
var currentPage = 0;

function insertCuenta(page) {
  var form = new FormData();
  	form.append("persona",actualVal);
  	if(page){
  		form.append("indice", page);
  	}
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	listAccounts.innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../controlador/ListAccounts/ListAccounts.php", true);
  xhttp.send(form);
  setPagination(form);
}

function setPagination(form) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      paginas.innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../controlador/pagesNumber.php", true);
  xhttp.send(form);
}

function setType(x){
	actualVal = x;
	insertCuenta();
}

function inactive(){
	(Array.from(document.getElementsByClassName('page-item active'))).forEach(x=>console.log(x.classList.remove('active')));
}

function changePage(x){
  currentPage = x.getAttribute('title');
	inactive();
	insertCuenta(x.getAttribute('title'));
  x.parentElement.classList.add('active');
  console.log(x.parentElement);
}

document.addEventListener(
	'click',
	(x)=>x.target.classList.contains('btn-outline-primary')?setType(x.target.value):0
);

document.addEventListener(
	'click',
	(x)=>x.target.classList.contains('page-link')?changePage(x.target):0
);

insertCuenta();

/*

var actualVal = 0;

function insertCuenta(page) {
  var form = new FormData();
  	form.append("persona",actualVal);
  	if(page){
  		form.append("indice", page);
  	}
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	listAccounts.innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../controlador/ListAccounts/ListAccounts.php", true);
  xhttp.send(form);
}

function setType(x){
	actualVal = x;
	insertCuenta();
}

function changePage(x){
	insertCuenta(x);
}

document.addEventListener(
	'click',
	(x)=>x.target.classList.contains('btn-outline-primary')?setType():0
);

document.addEventListener(
	'click',
	(x)=>x.target.classList.contains('page-link')?changePage(x.target.getAttribute('title')):0
);

insertCuenta();

 */