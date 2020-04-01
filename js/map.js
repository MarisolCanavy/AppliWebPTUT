var map;

function initMap() {
    //Création carte
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 43.213481, lng: 2.351224 }, //Centre de Carcassonne
        zoom: 15 //zoom de la carte
    });
}

function positionnerMarqueur() {
        console.log("hello");
    // Positionnement marqueur
    var pos = { lat: 43.215789, lng: 2.345170 };
    var marker = new google.maps.Marker({ position: pos, map: map });
}
