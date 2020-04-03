const allInfo = document.querySelectorAll('.read-more');
const allKlein = document.querySelectorAll('.profile-post');

let allIndex = [];

for(let i=0; i<allInfo.length; i++){
	allIndex.push(allInfo[i]);
	allInfo[i].remove();
}

function sluitModaal(){
	document.getElementById('modaal').remove();
}

function maakModaal(num){
	console.log(allIndex[num]);
	let modaal = document.createElement('div');
	modaal.className = 'modaal';
	modaal.id = 'modaal';
	modaal.addEventListener('click', sluitModaal);
	// sluitknop maken
	let sluitKnop = document.createElement('i');
	sluitKnop.className = 'far fa-times-circle sluit-knop';
	sluitKnop.addEventListener('click', sluitModaal);
	let modaalCon = document.createElement('div');
	modaalCon.className = 'modaal-con';
	modaalCon.innerHTML = allIndex[num].innerHTML;
	// dit zorgt ervoor dat je alleen buiten het modaalCon kan klikken om te sluiten
	modaalCon.addEventListener('click', function(e){
		e.stopPropagation();
	});
	modaalCon.prepend(sluitKnop);
	modaal.append(modaalCon);
	document.body.append(modaal);
}

for(let i=0; i<allKlein.length; i++){
	allKlein[i].addEventListener('click', function(){
		maakModaal(i);
	});
}