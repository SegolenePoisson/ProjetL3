//--------------- Modification dynamique du formulaire selon l'option de réponse sélectionnée
var textarea = document.getElementById("texte").parentNode.removeChild(document.getElementById("texte")),
	calendar = document.getElementById("date").parentNode.removeChild(document.getElementById("date"));

var answers = document.getElementById("rep").cloneNode(true);

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

//--------------- Ajout d'un module
var nbMod = 1;

var mod = document.getElementById("module");

document.getElementById("add_mod").addEventListener("click", function() {
	nbMod++;
	var addMod = mod.cloneNode(true);
	addMod.id = "module"+nbMod.toString();
	document.getElementById("list_area").appendChild(addMod);
});

//--------------- Ajout d'un champ de réponse
/*
var nbAnswers = 2;

function addAnswer(){
	nbAnswers++;

	var addDiv = document.createElement('div');
	addDiv.id = 'add_answer';

	var newAnswerLabel = document.createElement('label'),
		labelText = document.createTextNode("Réponse : ");
	var newAnswerInput = document.createElement('input');
	var br = document.createElement('br');

	var nameAnswer = 'choice'+nbAnswers.toString();
	newAnswerLabel.htmlFor = nameAnswer;

	newAnswerLabel.appendChild(labelText);

	newAnswerInput.type = 'text';
	newAnswerInput.name = nameAnswer;
	newAnswerInput.id = nameAnswer;

	addDiv.appendChild(newAnswerLabel);
	addDiv.appendChild(newAnswerInput);
	addDiv.appendChild(br);

	document.querySelector("form div").appendChild(addDiv);
}

document.getElementById("add_button").addEventListener('click', addAnswer, false);
*/