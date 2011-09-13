var tactics = {list:[{'name':'Directed Attack'
		,'cost':10
		,'is_melee':true,'is_defence':false,'is_missle':true,'description':'After an succesful attack, the attacker chooses hit location'}
	,{'name':'Second Attack','cost':5,'is_melee':true,'is_defence':false,'is_missle':false,'description':'Allows attacker to make an addtional attack.'}
	,{'name':'Counter Attack','cost':5,'is_melee':false,'is_defence':true,'is_missle':false,'description':'Allows defender to attack a split second before being attacked.'}
	,{'name':'Second Attack','cost':5,'is_melee':true,'is_defence':false,'is_missle':true,'description':'After sucessful attack, this attacker\'s next attack can only be dodged'}
	]};

function showTactics() {

	var atkGrp = '';
	var defGrp = '';
	var misGrp = '';
	$.each(tactics.list, function(i,tactic) {
		atkGrp = atkGrp + addlistItem(i,tactic);
	});
	$('ul#melee-tactics').append(atkGrp);

};

function addlistItem(i,tactic) {
	item= '<li role="option" tabindex="'+i+'" data-theme="e" data-spliticon="plus"><h3>'+tactic.name+'</h3><a href="#"></a></li>';
	return item;
};

$(document).ready( function() {
	showTactics();
});