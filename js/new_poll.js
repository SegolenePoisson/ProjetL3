document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  }); //initialization for datepicker

function setOpt(optId){
	var opt;
	switch (optId) {
		case "rep":
			opt = answers;
		break;
		case "texte":
			opt = textarea;
		break;
		case "date":
			opt = calendar;
		break;
	}
	document.querySelectorAll("form").replaceChild(opt, document.querySelectorAll("form div"));
}

var textarea = document.getElementById("texte").parentNode.removeChild(document.getElementById("texte")),
	calendar = document.getElementById("date").parentNode.removeChild(document.getElementById("date"));

var answers = document.getElementById("rep").cloneNode(true);

var optrep = document.getElementById("opt_rep"),
	opttexte = document.getElementById("opt_texte"),
	optdate = document.getElementById("opt_date");

var opt = document.querySelectorAll('input[type=radio]');
optrep.addEventListener("click", function() {
	if(optrep.checked){
		setOpt("rep");
	}
});
opttexte.addEventListener("click", function() {
	if(opttexte.checked){
		setOpt("texte");
	}
});
optdate.addEventListener("click", function() {
	if(optdate.checked){
		setOpt("date");
	}
});