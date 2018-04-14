$('#projectTask').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});
function selectionChange(){
    var ol = document.getElementById("taskList");
    var projID = document.getElementById('projID');
    $(ol).empty();
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/taskJSDyView',
        data: {pid:projID.value} ,
        success: function(resp) {
            
            $.each(resp.taskJSDyViewDatamessage, function(index, value) {
                var li = document.createElement("li");
                li.appendChild(document.createTextNode(value['task']));
                ol.appendChild(li);
            }); 
            
        },
        error: function(jqXHR, textStatus, errorThrown) { 
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
   
}
function submitClicked(){
    sendDataToController();
    selectionChange();
}
function sendDataToController() {
    var p_id = document.getElementById('projID').value;
    var task = document.getElementById('enteredTask');
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/projectTaskCreate',
        data: {pid:p_id, enteredTask:task.value} ,
        success: function(resp) {
            if (resp.taskAddMessage == 0) {
                document.getElementById('messageDisp').innerHTML = "Project Not Selected";
            }else if (resp.taskAddMessage == 1) {
                document.getElementById('messageDisp').innerHTML = "Please enter task";
            }else if (resp.taskAddMessage == 2) {
                document.getElementById('messageDisp').innerHTML = "Task Added!";
            }
            task.value = '';
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}