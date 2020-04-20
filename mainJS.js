function inc_val(valrangid,rangeid) 
{
	var RangeValue = document.getElementById(rangeid);
	RangeValue.value++;
	update_label(valrangid,rangeid);
}

function dec_val(valrangid,rangeid)
{
	var RangeValue = document.getElementById(rangeid);
	RangeValue.value--;
	update_label(valrangid,rangeid);
}

function change_val(valrangid,rangeid,operation) {
	
	var RangeValue = document.getElementById(rangeid);
	if (operation == 'add' ) {
		console.log(operation);
		for (var i = 10 - 1; i >= 0; i--) {
			RangeValue.value++;
		}
		
	} else {
		console.log(operation);
	  RangeValue.value-=10;
	}
	update_label(valrangid,rangeid);
}

function update_label(valrangid,rangeid) {
	var label = document.getElementById(valrangid);
	var RangeValue = document.getElementById(rangeid);
	label.innerHTML = RangeValue.value;
}
