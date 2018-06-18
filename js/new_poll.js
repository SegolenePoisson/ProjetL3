document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  }); //initialization for datepicker



var textarea = document.getElementById("texte").parentNode.removeChild(document.getElementById("texte")),
	calendar = document.getElementById("date").parentNode.removeChild(document.getElementById("date"));

var answers = document.getElementById("rep").cloneNode(true);


/*
function setOpt(optId){
	switch (optId) {
		case "rep":
			document.querySelector("form").replaceChild(answers, document.querySelector("form div"));
		break;
		case "texte":
			document.querySelector("form").replaceChild(textarea, document.querySelector("form div"));
		break;
		case "date":
			document.querySelector("form").replaceChild(calendar, document.querySelector("form div"));
		break;
}

//setOpt("rep");
*/

var optrep = document.getElementById("opt_rep"),
	opttexte = document.getElementById("opt_texte"),
	optdate = document.getElementById("opt_date");


optrep.addEventListener("click", function() {
	if(optrep.checked){
		document.querySelector("form").replaceChild(answers, document.querySelector("form div"));
	}
});
opttexte.addEventListener("click", function() {
	if(opttexte.checked){
		document.querySelector("form").replaceChild(textarea, document.querySelector("form div"));
	}
});
optdate.addEventListener("click", function() {
	if(optdate.checked){
		document.querySelector("form").replaceChild(calendar, document.querySelector("form div"));
	}
});