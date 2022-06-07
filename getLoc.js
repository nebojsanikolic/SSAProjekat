		var x = document.getElementById("demo");

		function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else {
		        x.innerHTML = "Geolocation is not supported by this browser.";
		    }
		}

		function showPosition(position) {
		    console.log(position);
            // KOORDINATE
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;    
            // NAZIV
            setTimeout(function(){ map.invalidateSize()}, 100);
            var map = L.map('mapmain', {scrollWheelZoom: false}).setView([lat, lng], 16);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            }).addTo(map);
            L.marker([lat, lng]).addTo(map)
            // DODAVANJE OSTALIH PARKINGA NA VELIKU MAPU
            for(i=2;i<5 ;i++){
                var a = document.getElementById('lat'+i).innerHTML;
                var b = document.getElementById('lng'+i).innerHTML;

                var rastojanje = getDistanceFromLatLonInKm(lat,lng,a,b)
                console.log(rastojanje);

                L.marker([a, b]).addTo(map)
                
            }
                
            L.circle([lat, lng], {radius: 50}).addTo(map);

            document.getElementById('mapmain').style.display = "";
            // FUNKCIJA
            function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
                var R = 6371; // Radius of the earth in km
                var dLat = deg2rad(lat2-lat1);  // deg2rad below
                var dLon = deg2rad(lon2-lon1); 
                var a = 
                  Math.sin(dLat/2) * Math.sin(dLat/2) +
                  Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                  Math.sin(dLon/2) * Math.sin(dLon/2)
                  ; 
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
                var d = R * c; // Distance in km
                return d;
              }
              
              function deg2rad(deg) {
                return deg * (Math.PI/180)
              }
		}
        

