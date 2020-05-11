function edit_event(id_of_event){
    var node_of_event = document.getElementById(id_of_event);
    var children_nodes = node_of_event.childNodes;
    var description = children_nodes[1].innerText;
    var time = children_nodes[3].innerText;
    var date = children_nodes[5].innerText;
    var location = children_nodes[7].innerText;
    
    //creating a textbox for description node
    var input1 = document.createElement("textarea");
    input1.value = description;
    input1.id = "active_description";
    //replacing with text box
    node_of_event.replaceChild(input1, children_nodes[1]);

    //creating a textbox for description node
    var input2 = document.createElement("textarea");
    input2.value = time;
    input2.id = "active_time";
    //replacing with text box
    node_of_event.replaceChild(input2, children_nodes[3]);
    
    //creating a textbox for description node
    var input3 = document.createElement("textarea");
    input3.value = date;
    input3.id = "active_date";
    //replacing with text box
    node_of_event.replaceChild(input3, children_nodes[5]);

    //creating a textbox for description node
    var input4 = document.createElement("textarea");
    input4.value = location;
    input4.id = "active_location";
    //replacing with text box
    node_of_event.replaceChild(input4, children_nodes[7]);
    
    var node_of_control_div = document.getElementById(id_of_event+"_control_div");
    var children_nodes_button = node_of_control_div.childNodes;
    var save_button = document.createElement("input");
    save_button.type="button";
    save_button.value = "Save";
    save_button.onclick = function(cursor_id,req_id = id_of_event) {
        if (confirm("Are sure, you want to update the event data?")) {
            var node_of_event = document.getElementById(req_id);
            var children_nodes = node_of_event.childNodes;
            var updated_description = children_nodes[1].value;
            var updated_time = children_nodes[3].value;
            var updated_date = children_nodes[5].value;
            var updated_location = children_nodes[7].value;
        
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "edit_event.php", false);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Update successful !");
                window.location.replace("http://vbp2538.uta.cloud/assignment4/event_management.php");
            }
    };
    var formData = "description="+updated_description+"&time="+updated_time+"&date="+updated_date+"&location="+updated_location+"&eventId="+req_id;
    xhttp.send(formData);
            } 
        else {
            window.location.replace("http://vbp2538.uta.cloud/assignment4/event_management.php");
        }
        };
    node_of_control_div.replaceChild(save_button, children_nodes_button[1]);
}

function del_event(id_of_event){
    if (confirm("Are sure, you want to Delete the event ?")) {
        var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "delete_event.php", false);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Delete successful !");
                window.location.replace("http://vbp2538.uta.cloud/assignment4/event_management.php");
            }
        };
        var formData = "eventId="+id_of_event;
        xhttp.send(formData);
    }
}

function login_toggle(){
    let id_of_login_floater = document.getElementById("login_window");
    if(id_of_login_floater.classList == "hide_login"){
        id_of_login_floater.classList.replace("hide_login","show_login");
    }
    else{
        id_of_login_floater.classList.replace("show_login","hide_login");
    }
}