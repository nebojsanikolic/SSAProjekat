$(document).ready(function(){

    var i = 2;  
    while(document.getElementById(i)){

        // KOORDINATE
            var lat = document.getElementById('lat'+i).innerHTML;
            var lng = document.getElementById('lng'+i).innerHTML;
        // NAZIV
            var name = document.getElementById('name'+i).innerHTML;
            var map = L.map('map'+i).setView([lat, lng], 15);
            map.zoomControl.remove();
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);
        L.marker([lat, lng]).addTo(map)
        .bindPopup(name)
        .openPopup();
        i++;
        }
    
})