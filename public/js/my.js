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
                var btn = document.createElement("BUTTON");
                var bname = document.createTextNode("delete");
                
                li.appendChild(document.createTextNode(value['task']));
                btn.appendChild(bname);
                btn.onclick=function(){
                    console.log(this.value);
                    $.ajax({
                        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
                        type: "POST",
                        url: '/projectTaskDelete',
                        data: {task:this.value} ,
                        success: function(resp) {
                            if (resp.taskDelMessage == 100) {
                                document.getElementById('messageDisp').innerHTML = "task deleted";
                            }else if (resp.taskDelMessage == 200) {
                                document.getElementById('messageDisp').innerHTML = "task delete error";
                            }
                            selectionChange();
                        },
                        error: function(jqXHR, textStatus, errorThrown) { 
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                    return false;
                };
                btn.setAttribute("id","btn"+2);
                btn.setAttribute("value",value['task']);
                li.appendChild(btn);
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
            }else if (resp.taskAddMessage == 3) {
                document.getElementById('messageDisp').innerHTML = " Error!! Failed to add, Possible Duplicate Entry";
            }
            task.value = '';
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}