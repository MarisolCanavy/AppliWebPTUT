var afficherInfosCompte = document.getElementById("afficherInfosCompte");

document.getElementById("monCompte").addEventListener("click", () => {
  if (getComputedStyle(afficherInfosCompte).display != "none") {
    afficherInfosCompte.style.display = "none";
  } else {
    afficherInfosCompte.style.display = "block";
  }
});

var afficherInfosCreation = document.getElementById("afficherInfosCreation");

document.getElementById("maCreation").addEventListener("click", () => {
  if (getComputedStyle(afficherInfosCreation).display != "none") {
    afficherInfosCreation.style.display = "none";
  } else {
    afficherInfosCreation.style.display = "block";
  }
});
