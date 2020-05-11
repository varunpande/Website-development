function login_toggle(){
    let id_of_login_floater = document.getElementById("login_window");
    if(id_of_login_floater.classList == "hide_login"){
        id_of_login_floater.classList.replace("hide_login","show_login");
    }
    else{
        id_of_login_floater.classList.replace("show_login","hide_login");
    }
}

function mobile_menu(select_ref){
    if (select_ref != "Inicio de Sesion"){
    eval("location = '"+select_ref+"'");
    }
    else{
       login_toggle();
    }
}

function contact_us(){
    let formData = new FormData(document.forms.contact);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "contact_us_mail.php", false);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("We will shortly contact you !!");
            location.reload();
        }
    }
    xhttp.send(formData);
}

function contacto_submit(){
    let formData = new FormData(document.forms.contacto);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "contacto_form.php", false);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("We will shortly contact you !!");
            location.reload();
        }
    }
    xhttp.send(formData);
}

function reg_button_event(id_of_event){
if (confirm("Sure you want to register for  the event ?")) {
    let formData = "eventId="+id_of_event;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "register_eventos.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        var action = id_of_event.split("_")[0];
        if(action == "reg"){
            alert("Registration successful !");
        }
        else{
            alert("De-Registration successful !");
        } 
        window.location.replace("http://vbp2538.uta.cloud/assignment4/eventos.php");
        }
    };
    xhttp.send(formData);
    }
}

function event_remind(){
    let formData = new FormData(document.forms.eventReminder);
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "event_remind.php", false);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("You have been added to the event reminder list!!");
            location.reload();
        }
    }
    xhttp.send(formData);
}