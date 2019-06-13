function checkForm(){
  debugger;
  let sendForm = true;
  let ime = document.getElementsByName("title")[1];
  let kratkiSadrzaj = document.getElementsByName("about")[0];
  let tekst = document.getElementsByName("content")[0];
  let slika = document.getElementsByName("pphoto")[0];
  let kategorija = document.getElementsByName("category")[0];

  if(ime.value < 5 || ime.value > 30){
    sendForm = false;
    ime.style.border = "2px solid red";
    document.getElementById("titlePoruka").innerHTML = "Naslov vjesti mora imati između 5 i 30 znakova!<br>";
  }else{
    ime.style.border = "2px solid black";
    let x = document.getElementById("titlePoruka").innerHTML = "";
  }

  if(kratkiSadrzaj.value < 10 || kratkiSadrzaj.value > 100){
    sendForm = false;
    kratkiSadrzaj.style.border = "2px solid red";
    document.getElementById("aboutPoruka").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
  }else{
    kratkiSadrzaj.style.border = "2px solid black";
    document.getElementById("aboutPoruka").innerHTML = "";
  }

  if(!tekst.value){
    sendForm = false;
    tekst.style.border = "2px solid red";
    document.getElementById("contentPoruka").innerHTML = "Sadržaj mora biti unesen!<br>";
  }else{
    tekst.style.border = "2px solid black";
    document.getElementById("contentPoruka").innerHTML = "";
  }

  if(!slika.value){
    sendForm = false;
    slika.style.border = "2px solid red";
    document.getElementById("pphotoPoruka").innerHTML = "Slika mora biti unesena!<br>";
  }else{
    slika.style.border = "2px solid black";
    document.getElementById("pphotoPoruka").innerHTML = "";
  }

  if(!kategorija.value){
    sendForm = false;
    kategorija.style.border = "2px solid red";
  }else{
    kategorija.style.border = "2px solid black";
  }

  return sendForm;
}
