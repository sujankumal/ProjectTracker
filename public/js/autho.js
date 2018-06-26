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
            	alert("Sorry!!! Only Leader or Supervisor of the project can Update/Add Tasks");
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
function authoQRPS() {
	// body...
	var project_id = document.getElementById('project_id').value;
	if (project_id == "") {
		return;
	}
	$.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/checkPermisionProjectQRGen',
        data: {pid:project_id} ,
        success: function(resp) {
            if (resp.checkPermisionProjectQRGen == 1) {
            }else{
            	alert("Sorry!!! Only Head of the project can Generate QR");
                $("#project_id").val(null).trigger("change");
            }
            
            console.log(resp.checkPermisionProjectQRGen+"resp from server");
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}
function authoQRScanPS(){
	// body...
	var project_id = document.getElementById('project_id').value;
	if (project_id == "") {
		return;
	}
	$.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/checkPermisionProjectQRScan',
        data: {pid:project_id} ,
        success: function(resp) {
            if (resp.checkPermisionProjectQRScan == 0 || resp.checkPermisionProjectQRScan == 1) {
            }else{
            	alert("Sorry!!! \nOnly Leader or Supervisor or Members of the project can perform this Tasks.\nPlease select appropriate project");
                $("#project_id").val(null).trigger("change");
            }
            
            console.log(resp.checkPermisionProjectQRScan+"resp from server");
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}