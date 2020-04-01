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

var coordonnesV = [
    [43.220934, 2.337686], //Patient1
    [43.222685, 2.349477], //Patient2
    [43.218146, 2.346757] //Patient3
];

var message = ['Patient 1', 'Patient 2', 'Patient 3'];

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

