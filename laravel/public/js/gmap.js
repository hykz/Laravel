var latlng = new google.maps.LatLng(48.856614, 2.3522219000000177);

var options = {
    center : latlng,
    zoom : 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};



var carte = new google.maps.Map(document.getElementById("carte"), options);



//// PARIS 2EME
//var marqueur = new google.maps.Marker({
//    position: new google.maps.LatLng(48.8326563, 2.3859320),
//    map: carte
//});
//
//// PATHE 5EME
//var marqueur2 = new google.maps.Marker({
//    position: new google.maps.LatLng(48.8711193, 2.3339550),
//    map: carte
//});
//
//// GAUMONT 15EME PARIS
//var marqueur3 = new google.maps.Marker({
//    position: new google.maps.LatLng(48.8314841, 2.2775155),
//    map: carte
//});
//
//// Le Grand Rex Paris 2eme
//var marqueur4 = new google.maps.Marker({
//    position: new google.maps.LatLng(48.8705638, 2.3474873),
//    map: carte
//});
//
//// Cinema Saint Michel
//var marqueur5 = new google.maps.Marker({
//    position: new google.maps.LatLng(48.8523959, 2.3439604),
//    map: carte
//});
//
//// Les 7 Parnassiens
//var marqueur6 = new google.maps.Marker({
//    position: new google.maps.LatLng(48.8420420, 2.3274098),
//    map: carte
//});
//
//// CNP Terreaux
//var marqueur7 = new google.maps.Marker({
//    position: new google.maps.LatLng(45.7652848, 4.8339499),
//    map: carte
//});
//
//// Pathé Lyon - Cordeliers
//var marqueur8 = new google.maps.Marker({
//    position: new google.maps.LatLng(45.7616387, 4.8350065),
//    map: carte
//});
//
//// Pathé Lyon - Bellecour
//var marqueur9 = new google.maps.Marker({
//    position: new google.maps.LatLng(45.7586979, 4.8350368),
//    map: carte
//});
//
//// UGC Astoria
//var marqueur10 = new google.maps.Marker({
//    position: new google.maps.LatLng(45.7698556, 4.8530039),
//    map: carte
//});
//
//// UGC Lyon Part Dieu
//var marqueur11 = new google.maps.Marker({
//    position: new google.maps.LatLng(45.7613861, 4.8557680),
//    map: carte
//});
//
//// UGC Ciné Cité Internationale
//var marqueur12 = new google.maps.Marker({
//    position: new google.maps.LatLng(45.7858110, 4.8546885),
//    map: carte
//
//});
//
//
//function attachSecretMessage(marker, secretMessage) {
//    var infowindow = new google.maps.InfoWindow({
//        content: secretMessage
//    });
//
//    marker.addListener('click', function() {
//        infowindow.open(marker.get('carte'), marker);
//    });
//
//}
//
//$(document).ready(function() {
//
//    $(".cinemap").each(function () {
//        var coucouez = this.dataset.title;
//        var salut = this.dataset.id;
//        console.log(salut);
//        console.log(coucouez);
//
//    });
//});
//
//
//var test = '<div id="firstHeading"> AZOIRJOAIJEOIEAJA </div>';
//
//attachSecretMessage(marqueur12,test);


$('.cinemap').each(function(){

    var title = $(this).attr('data-title');
    var position = $(this).attr('data-adresse');
    var film = $(this).attr('data-content');

    var geocoder = new google.maps.Geocoder();

    // Infobulle
    var contentString = '<div id="content">' +
        '<div id="siteNotice">' +
        '</div>' +
        '<h1 id="firstHeading" class="firstHeading">' + title + '</h1>' +
        '<div id="bodyContent">' +
        '<p>Nombre de film actuellement en salle : ' + film +
        '<p><i> Prochaines séances : </i><i>' + '</p>' +
        '<p>Adresse : ' + position +
        '</p>' +
        '</div>' ;

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    // Affichage marker
    geocoder.geocode({'address': position}, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            carte.setCenter(results[0].geometry.location);

            var marker = new google.maps.Marker({
                map: carte,
                position: results[0].geometry.location
            });

            marker.addListener('click', function () {
                infowindow.open(carte, marker);
            });

        } else {
            alert('Erreur de localisation : ' + status);
        }
    });

});
