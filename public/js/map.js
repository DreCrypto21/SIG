function initMap() {
    var location = { lat: -9.9335807, lng: 123.4171353 };

    // Buat peta
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 9,
        center: location
    });

    // Load GeoJSON dari public folder
    map.data.loadGeoJson('/geojson/kab_kupang.geojson');

    // Set style untuk GeoJSON
    map.data.setStyle(function(feature) {
        var jumlahStunting = feature.getProperty('stunting');
        var color;

        // Tentukan warna berdasarkan jumlah stunting
        if (jumlahStunting >= 90 && jumlahStunting <= 147) {
            color = '#ffcccc'; // Merah muda
        } else if (jumlahStunting > 147 && jumlahStunting <= 252) {
            color = '#ff9999'; // Sedikit lebih tua
        } else if (jumlahStunting > 252 && jumlahStunting <= 389) {
            color = '#ff6666'; // Lebih tua
        } else if (jumlahStunting > 389 && jumlahStunting <= 591) {
            color = '#ff3333'; // Merah tua
        }

        return {
            fillColor: color,
            strokeColor: color,
            strokeWeight: 1,
            fillOpacity: 0.6
        };
    });

    // Tambahkan info window untuk menampilkan nama kecamatan
    var infoWindow = new google.maps.InfoWindow();

    map.data.addListener('mouseover', function(event) {
        var kecamatanName = event.feature.getProperty('WADMKC');
        var jumlahStunting = event.feature.getProperty('stunting');

        var infoContent = '<div><strong>' + kecamatanName + '</strong></div>' +
                          '<div>Jumlah Stunting: ' + jumlahStunting + '</div>';

        infoWindow.setContent(infoContent);
        infoWindow.setPosition(event.latLng);
        infoWindow.open(map);
    });

    map.data.addListener('mouseout', function() {
        infoWindow.close();
    });
}
