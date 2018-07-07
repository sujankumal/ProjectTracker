$('#projectTask').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});
function tselectionChange(){
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
                    var p_id = document.getElementById('projID').value;
                    $.ajax({
                        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
                        type: "POST",
                        url: '/projectTaskDelete',
                        data: {pid:p_id, task:this.value} ,
                        success: function(resp) {
                            if (resp.taskDelMessage == 100) {
                                document.getElementById('messageDisp').innerHTML = "task deleted";
                            }else if (resp.taskDelMessage == 200) {
                                document.getElementById('messageDisp').innerHTML = "task delete error";
                            }
                            tselectionChange();
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
    var check = tsendDataToController();
    if (check == 0) {
        location.reload();
        return;
    }
    tselectionChange();
}
function tsendDataToController() {
    var p_id= null;
    try{
        p_id = document.getElementById('projID').value;
    }catch(error){
        return 0;
    }
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
function projectSelected() {
    var project_id = document.getElementById('project_id').value;
    $(document.getElementsByClassName('minuteFormDispTask')).empty();
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/projectTaskShowMinute',
        data: {pid:project_id} ,
        success: function(resp) {
            console.log(typeof(resp.forMinuteResponseTask));
            $.each(resp.forMinuteResponseTask, function(index, value) {
                if (value.task_complete==null) {
                    $('#leader_acheivement').append(
                        "<div class=\"form-check \">"+
                        "<span  for=\"leadercheckbox"+value.id+"\">"+
                        "</span>"+
                        "<input type=\"checkbox\" class=\"form-check-input \" name=\"leadername[]\" value=\""+value.id+"\" id=\"leadercheckbox"+value.id+"\">"+
                        value.task+
                        "</div>");
                    $('#member_i_acheivement').append(
                        "<div class=\"form-check \">"+
                        "<span  for=\"m1checkbox"+value.id+"\">"+
                        "</span>"+
                        "<input type=\"checkbox\" class=\"form-check-input \" name=\"m1name[]\" value=\""+value.id+"\" id=\"m1checkbox"+value.id+"\">"+
                        value.task+
                        "</div>");
                    
                    $('#member_ii_acheivement').append(
                        "<div class=\"form-check \">"+
                        "<span  for=\"m2checkbox"+value.id+"\">"+
                        "</span>"+
                        "<input type=\"checkbox\" class=\"form-check-input \" name=\"m2name[]\" value=\""+value.id+"\" id=\"m2checkbox"+value.id+"\">"+
                        value.task+
                        "</div>");
                    
                    $('#leader_responsibility').append(
                        "<div class=\"form-check \">"+
                        "<span  for=\"lrcheckbox"+value.id+"\">"+
                        "</span>"+
                        "<input type=\"checkbox\" class=\"form-check-input \" name=\"lrname[]\" value=\""+value.id+"\" id=\"lrcheckbox"+value.id+"\">"+
                        value.task+
                        "</div>");
                    
                    $('#member_i_responsibility').append(
                        "<div class=\"form-check \">"+
                        "<span  for=\"m1rcheckbox"+value.id+"\">"+
                        "</span>"+
                        "<input type=\"checkbox\" class=\"form-check-input \" name=\"m1rname[]\" value=\""+value.id+"\" id=\"m1rcheckbox"+value.id+"\">"+
                        value.task+
                        "</div>");
                    
                   $('#member_ii_responsibility').append(
                        "<div class=\"form-check \">"+
                        "<span  for=\"m2rcheckbox"+value.id+"\">"+
                        "</span>"+
                        "<input type=\"checkbox\" class=\"form-check-input \" name=\"m2rname[]\" value=\""+value.id+"\" id=\"m2rcheckbox"+value.id+"\">"+
                        value.task+
                        "</div>");
                    
                    }
             }); 
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}

function createNewCheckbox(name, id){
    var checkbox = document.createElement('input'); 
    checkbox.type= 'checkbox';
    checkbox.name = name;
    checkbox.id = id;
    return checkbox;
}
function sidebarProjectSelect() {
    // body...
    
    var p_id = document.getElementById('side_project_id').value;
    $.ajax({
        headers: {'X-CSRF-Token': $('meta[name="_token"]').attr('content')},
        type: "POST",
        url: '/sidebarProjectSelected',
        data: {pid:p_id} ,
        success: function(resp) {
           location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }

    });
}