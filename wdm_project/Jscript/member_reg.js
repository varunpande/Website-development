function submitReg() {
  let formData = new FormData(document.forms.reg);
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "user_reg.php", false);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     window.location.assign("http://vbp2538.uta.cloud/new/registration_page.php");
     alert(this.responseText);
     window.history.replaceState({},"Registro","?submission=done");
    }
  }
  xhttp.send(formData);
}