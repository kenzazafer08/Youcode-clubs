var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

function verification() {
  alert('test');
  var f = document.formulaire;
  var nom = f.name.value;
  var mail = f.Email.value;
  var Object = f.object.value;
  var Message = f.message.value;

  var Ermail = /^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/
  var erreurs = [];

  if (!nom) erreurs.push("Le nom n'est pas renseigné.");
  if (!mail) erreurs.push("L'email n'est pas renseigné.");
  if (!Object) erreurs.push("L'object n'est pas renseigné.");
  if (!Message) erreurs.push("Le message n'est pas renseigné.");
  if (mail && Ermail.test(mail)) erreurs.push("Le format de l'email n'est pas valide.");
  if (erreurs.length > 0) {
     console.log("Le formulaire n'a pas pu être validé car :\n\n" + erreurs.join("\n"));
     console.log(nom)
  }
  return (erreurs.length == 0);
}
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}