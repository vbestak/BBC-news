let jedinstvenoIme = true;

  document.getElementById("username").addEventListener("keyup", function(event){
    let xhttp = new XMLHttpRequest();
    let username = document.getElementById("username").value;

    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        jedinstvenoIme = (this.responseText == 0);

        if(jedinstvenoIme){
          document.getElementById("username").style.border = "2px solid #bef441";
        }else{
          document.getElementById("username").style.border = "2px solid red";
        }

      }
    };

    xhttp.open("POST", "src/isNameUnique.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("userName=" + username);
  });




//provjera polja kod pritiska gumba
  document.getElementById("slanje").onclick = function(event) {
    var slanjeForme = true;
    var poljeIme = document.getElementById("ime");
    var ime = document.getElementById("ime").value;

    if (ime.length == 0) {
      slanjeForme = false;
      poljeIme.style.border="2px solid red";
      poljeIme.setAttribute("placeholder", "Unesite ime!");
    } else {
      poljeIme.style.border="2px solid green";
    }

    var poljePrezime = document.getElementById("prezime");
    var prezime = document.getElementById("prezime").value;

    if (prezime.length == 0) {
      slanjeForme = false;
      poljePrezime.style.border="2px solid red";
      poljePrezime.setAttribute("placeholder", "Unesite prezime!");
    } else {
      poljePrezime.style.border="2px solid green";
    }

    var poljeUsername = document.getElementById("username");
    var username = document.getElementById("username").value;

    if (username.length == 0) {
      slanjeForme = false;
      poljeUsername.style.border="2px solid red";
      poljeUsername.setAttribute("placeholder", "Unesite korisničko ime!");
    } else {
      poljeUsername.style.border="2px solid green";
    }

    var poljePass = document.getElementById("password");
    var pass = document.getElementById("password").value;
    var poljePassRep = document.getElementById("passRep");
    var passRep = document.getElementById("passRep").value;

    if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
      slanjeForme = false;
      poljePass.style.border="2px solid red";
      poljePassRep.style.border="2px solid red";
      poljePass.setAttribute("placeholder", "Unesite ispravnu lozinku!");
      poljePassRep.setAttribute("placeholder", "Unesite ispravnu lozinku!");
    } else {
      poljePass.style.border="2px solid green";
      poljePassRep.style.border="2px solid green";
    }

    if (slanjeForme === false || jedinstvenoIme === false) {
       event.preventDefault();
     }

  }
