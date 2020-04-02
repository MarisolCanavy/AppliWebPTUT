var map;

function initMap() {
    //Création carte
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 43.213481, lng: 2.351224 }, //Centre de Carcassonne
        zoom: 15 //zoom de la carte
    });
}

//essayer de faire aparaitre et disparaitre le marqueur

function positionnerMarqueur() {
    // Positionnement marqueur
    var pos = { lat: 43.215789, lng: 2.345170 };
    var marker = new google.maps.Marker({ position: pos, map: map });
}


//affiche les 3 patients
var coordonnesV = [
    [43.215789, 2.345170], //Danielle
    [43.21532, 2.34172], //Jean
    [43.21285, 2.34365] //Armande
];

var message = ['Danielle', 'Jean', 'Armande'];

function affichePlusieursMarqueurs() {
    for (var i = 0; i < 3; ++i) {
        var pos = { lat: coordonnesV[i][0], lng: coordonnesV[i][1] };
        var marker = new google.maps.Marker({ position: pos, map: map });
        attachMessage(marker, message[i]);
    }
}

// Attache une info à un point
function attachMessage(marker, message) {
    var infowindow = new google.maps.InfoWindow({
        content: message
    });
    //sur clic affiche le message
    marker.addListener('click', function () {
        infowindow.open(marker.get('map'), marker);
    });
}

// REALISER Ouverture Fermeture du marker

// if (getComputedStyle(message.InfoWindow) != open){
//     essage.InfoWindow.style.display
// }
// document.getElementById("maCreation").addEventListener("click", () => {
//     if (getComputedStyle(afficherInfosCreation).display != "none") {
//       afficherInfosCreation.style.display = "none";
//     } else {
//       afficherInfosCreation.style.display = "block";
//     }
//   });

var coordonnesTInf1 = [
    {lat: 43.21504, lng: 2.34417}, //Patient1Infi1
    {lat: 43.21848, lng: 2.34395}, //Patient2Infi1
    {lat: 43.21701, lng: 2.3397} //Patient3Infi1
];

function afficheItineraire(){ //crée un polygone qui affiche le chemin à vol d'oiseau et la zone de couverture du patient
    new google.maps.Polygon({
        map: map,
        paths: coordonnesTInf1,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2,
        draggable: true,
        geodesic: true
      });
}


var coordonnesTInf2 = [
    {lat: 43.21437, lng: 2.34708}, //Patient1Infi2
    {lat: 43.21097, lng: 2.34021}, //Patient2Infi2
    {lat: 43.21078, lng: 2.34362} //Patient3Infi2
];

function afficheItineraire2(){ //crée un polygone qui affiche le chemin à vol d'oiseau et la zone de couverture du patient
    new google.maps.Polygon({
        map: map,
        paths: coordonnesTInf2,
        strokeColor: '#00FF00',
        strokeOpacity: 1.0,
        strokeWeight: 2,
        draggable: true,
        geodesic: true
      });
}

function reelItineraire(){
    new DirectionsService.route({
        origin: coordonnesVA
    });
}