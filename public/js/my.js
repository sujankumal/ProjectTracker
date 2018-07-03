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
    tsendDataToController();
    tselectionChange();
}
function tsendDataToController() {
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
                    var acheckbox = document.createElement('input'); 
                    var alabel = document.createElement('label');
                    acheckbox.type= 'checkbox';
                    acheckbox.name = "leadername[]";
                    acheckbox.value = value.id;
                    acheckbox.id = "leadercheckbox"+value.id;
                    alabel.setAttribute("for","leadercheckbox"+value.id);
                    alabel.innerHTML = value.task;
                    alabel.appendChild(acheckbox);
                    var span = document.createElement('span');
                    span.setAttribute("class","minuteCheckbox")
                    span.appendChild(alabel);
                    document.getElementById('leader_acheivement').appendChild(span);  
                    var bcheckbox = document.createElement('input'); 
                    var blabel = document.createElement('label');
                    bcheckbox.type= 'checkbox';
                    bcheckbox.name = "m1name[]";
                    bcheckbox.value = value.id;
                    bcheckbox.id = "m1checkbox"+value.id;
                    blabel.setAttribute("for","m1checkbox"+value.id);
                    blabel.innerHTML = value.task;
                    blabel.appendChild(bcheckbox);
                    var span1 = document.createElement('span');
                    span1.setAttribute("class","minuteCheckbox")
                    span1.appendChild(blabel);
                    document.getElementById('member_i_acheivement').appendChild(span1); 
                    var ccheckbox = document.createElement('input'); 
                    var clabel = document.createElement('label');
                    ccheckbox.type= 'checkbox';
                    ccheckbox.name = "m2name[]";
                    ccheckbox.value = value.id;
                    ccheckbox.id = "m2checkbox"+value.id;
                    clabel.setAttribute("for","m2checkbox"+value.id);
                    clabel.innerHTML = value.task;
                    clabel.appendChild(ccheckbox);
                    var span2 = document.createElement('span');
                    span2.setAttribute("class","minuteCheckbox")
                    span2.appendChild(clabel);
                    document.getElementById('member_ii_acheivement').appendChild(span2); 
                    var dcheckbox = document.createElement('input'); 
                    var dlabel = document.createElement('label');
                    dcheckbox.type= 'checkbox';
                    dcheckbox.name = "lrname[]";
                    dcheckbox.value = value.id;
                    dcheckbox.id = "lrcheckbox"+value.id;
                    dlabel.setAttribute("for","lrcheckbox"+value.id);
                    dlabel.innerHTML = value.task;
                    dlabel.appendChild(dcheckbox);
                    var span3 = document.createElement('span');
                    span3.setAttribute("class","minuteCheckbox")
                    span3.appendChild(dlabel);
                    document.getElementById('leader_responsibility').appendChild(span3); 
                    var echeckbox = document.createElement('input'); 
                    var elabel = document.createElement('label');
                    echeckbox.type= 'checkbox';
                    echeckbox.name = "m1rname[]";
                    echeckbox.value = value.id;
                    echeckbox.id = "m1rcheckbox"+value.id;
                    elabel.setAttribute("for","m1rcheckbox"+value.id);
                    elabel.innerHTML = value.task;
                    elabel.appendChild(echeckbox);
                    var span4 = document.createElement('span');
                    span4.setAttribute("class","minuteCheckbox")
                    span4.appendChild(elabel);
                    document.getElementById('member_i_responsibility').appendChild(span4); 
                    var fcheckbox = document.createElement('input'); 
                    var flabel = document.createElement('label');
                    fcheckbox.type= 'checkbox';
                    fcheckbox.name = "m2rname[]";
                    fcheckbox.value = value.id;
                    fcheckbox.id = "m2rcheckbox"+value.id;
                    flabel.setAttribute("for","m2rcheckbox"+value.id);
                    flabel.innerHTML = value.task;
                    flabel.appendChild(fcheckbox);
                    var span5 = document.createElement('span');
                    span5.setAttribute("class","minuteCheckbox")
                    span5.appendChild(flabel);
                    document.getElementById('member_ii_responsibility').appendChild(span5); 
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