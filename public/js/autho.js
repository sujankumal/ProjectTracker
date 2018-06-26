function authoMFPS(argument) {
	// body...
	var project_id = document.getElementById('project_id').value;
	console.log(typeof(project_id) + "emp ");
	if (project_id == "") {
		console.log("null");
		return;
	}
	$.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/checkPermisionMinute',
        data: {pid:project_id} ,
        success: function(resp) {
            if (resp.checkPermisionMinuteResponse == 0 || resp.checkPermisionMinuteResponse == 1) {
            }else{
            	alert("Sorry!!! Only Leader or Supervisor of the project can Create Minute");
                $("#project_id").val(null).trigger("change");
            }
            // else if (resp.checkPermisionMinuteResponse != 1) {
            //    alert("Sorry!!! Only Leader or Supervisor of the project can Create Minute");
            //    $("#project_id").val(null).trigger("change");
            //    console.log("else");
            // }
            console.log(resp.checkPermisionMinuteResponse+"resp from server");
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}

function authoPTaskSC() {
	// body...
	var project_id = document.getElementById('projID').value;
	if (project_id == "") {
		return;
	}
	$.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/checkPermisionProjectTask',
        data: {pid:project_id} ,
        success: function(resp) {
            if (resp.checkPermisionMinuteResponse == 0 || resp.checkPermisionMinuteResponse == 1) {
            }else{
            	alert("Sorry!!! Only Leader or Supervisor of the project can Create Minute");
                $("#projID").val(null).trigger("change");
            }
            
            console.log(resp.checkPermisionMinuteResponse+"resp from server");
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}