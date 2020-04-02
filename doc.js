let monCompte = document.getElementById("monCompte");
let afficherInfosCompte = document.getElementById("afficherInfosCompte");

monCompte.addEventListener("click", () => {
    if(getComputedStyle(afficherInfosCompte).display != "none"){
        afficherInfosCompte.style.display = "none";
      } else {
        afficherInfosCompte.style.display = "block";
      }
});