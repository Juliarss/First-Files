function createObject() {
var tipo_richiesta;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
tipo_richiesta = new ActiveXObject("Microsoft.XMLHTTP");
}else{
tipo_richiesta = new XMLHttpRequest();
}
return tipo_richiesta;
}

var http = createObject();

function verifica(valore) {
// add image progress
var par = window.parent.document;
var images = par.getElementById('dati');
var new_div = par.createElement('div');
var new_img = par.createElement('img');
new_img.src = 'indicator.gif';
new_div.appendChild(new_img);
images.appendChild(new_div);
http.open('get', 'verifica.php?valore='+valore);
http.onreadystatechange = handleResponse;
http.send(null);
}

function handleResponse() {
if(http.readyState == 4){
var response = http.responseText;
document.getElementById('dati').innerHTML = response;
}
}