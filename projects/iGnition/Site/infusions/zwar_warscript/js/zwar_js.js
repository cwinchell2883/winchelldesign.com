//Javscript Functions by Zezoar
function zwar_show_hide(obj_id) {
	document.getElementById('listitem_' + obj_id).style.display = document.getElementById('listitem_' + obj_id).style.display == 'none' ? '' : 'none';
	if (document.images['zwarl_' + obj_id].src.indexOf('down.') == -1) {
		tmp = document.images['zwarl_' + obj_id].src.replace('up.', 'down.');
		document.images['zwarl_' + obj_id].src = tmp;
	} else {
		tmp = document.images['zwarl_' + obj_id].src.replace('down.', 'up.');
		document.images['zwarl_' + obj_id].src = tmp;
	}
}

function zwar_show_calinfo(obj_id, curobj) {
	for(var i=1; i<32; i++) {
		if (document.getElementById('zwar_calinfo_' + i)) {
			document.getElementById('zwar_calinfo_' + i).style.display = 'none';
		}
	}
	overlay(curobj, 'zwar_calinfo_' + obj_id, 'bottomright');
}

function zwar_hide_calinfo(obj_id) {
	document.getElementById('zwar_cal_' + obj_id).style.display = 'none';
}


function zwar_showcolor(obj) {
	if (obj.value != '') {
		obj.style.borderColor = '#' + obj.value;
	} else {
		obj.style.borderColor = '#000000';
	}
}

function zwar_showpi() {
	if (document.zwar_optform.zwar_options.value == "join") {
		document.zwar_optform.zpassinput.style.display = '';
	} else {
		document.zwar_optform.zpassinput.style.display = 'none';
	}
}

function zwar_setlink(elname, elvalue) {
	document.zwar_linkform.zwar_linkbox.value = elvalue;
}

function zwar_golink() {
	var temp1 = document.zwar_linkform.zwar_baseurl.value;
	var temp2 = document.zwar_linkform.zwar_linkbox.value;
	window.location.href = temp1 + temp2;
}

function zwar_sh_slide(obj_id) {
	$("#listitem_" + obj_id).slideToggle(400);
	if (document.images['zwarl_' + obj_id].src.indexOf('down.') == -1) {
		tmp = document.images['zwarl_' + obj_id].src.replace('up.', 'down.');
		document.images['zwarl_' + obj_id].src = tmp;
	} else {
		tmp = document.images['zwarl_' + obj_id].src.replace('down.', 'up.');
		document.images['zwarl_' + obj_id].src = tmp;
	}
}

function zwar_setlang(language) {
	document.inputform.action = document.inputform.action + "&lang=" + language;
	document.inputform.submit();
}

function zwar_add_muploads(limit) {
	if(!document.zwar_uploadform.elements['zmediafile[]'].length) {
		var count = 1;
	} else {
		count = document.zwar_uploadform.elements['zmediafile[]'].length;
	}
	if (count<limit) {
		var temp1 = document.getElementById('zmfirst').innerHTML;
		var temp2 = document.getElementById('zwar_muploads').innerHTML;
		document.getElementById('zwar_muploads').innerHTML = temp1 + temp2;
	}
	if (count>=(limit-1)) {
		document.getElementById('zmuplink').style.display = 'none';
		document.getElementById('zmuplimit').style.display = '';
	}
}

$(document).ready(function(){
	length = 200;
	for(var i=0; i<15; i++) {
		$(".zwarblink").fadeOut(length).fadeIn(length);
	}
});