<!DOCTYPE html>
<html>
<head>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMW0Zg_K7LthAMmLiUjF_XsEaWcQOgqa0&callback=initMap" async defer></script>

<script>
    let map;
    let courierMarker, pickupMarker, deliveryMarker;
    let directionsService, directionsRenderer;
    let locationData = JSON.parse('<?= $locationData ?>');

    let distanceToPickup = locationData.distanceToPickup;
    let distanceToDelivery = locationData.distanceToDelivery;


    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: locationData.courier,
            zoom: 10,
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        // Markers
        courierMarker = new google.maps.Marker({
            position: locationData.courier,
            map,
            icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
            title: "Courier"
        });

        pickupMarker = new google.maps.Marker({
            position: locationData.pickup,
            map,
            title: "Pickup"
        });

        deliveryMarker = new google.maps.Marker({
            position: locationData.delivery,
            map,
            title: "Delivery"
        });

        // Click events
        pickupMarker.addListener("click", () => {
            showRoute(courierMarker.getPosition(), pickupMarker.getPosition());
        });

        deliveryMarker.addListener("click", () => {
            showRoute(courierMarker.getPosition(), deliveryMarker.getPosition());
        });

        // Start live update
        setInterval(updateCourierLocation, 5000); // update every 5 seconds

        // ✨✨ Add this: Show distances directly on page when map loads
    document.getElementById("pickup-distance").innerText = distanceToPickup + " km";
    document.getElementById("delivery-distance").innerText = distanceToDelivery + " km";
    }

    function showRoute(origin, destination) {
        const request = {
            origin: origin,
            destination: destination,
            travelMode: google.maps.TravelMode.DRIVING
        };

        directionsService.route(request, (result, status) => {
            if (status === "OK") {
                directionsRenderer.setDirections(result);
                // Distance show
                const distance = result.routes[0].legs[0].distance.text;
                document.getElementById("distance-info").innerText = "Distance: " + distance;
            } else {
                alert("Route error: " + status);
            }
        });
    }

    function updateCourierLocation() {
        fetch("/Map/getCourierLocation")
            .then(res => res.json())
            .then(data => {
                const newPos = new google.maps.LatLng(data.lat, data.lng);
                courierMarker.setPosition(newPos);
                map.setCenter(newPos);
            });
    }
</script>

</head>
<body onload="initMap()">
    
    <h1>Pickup & Delivery Locations</h1>
    
    <div id="map" style="height: 600px; width: 80%; margin: auto;"></div>

        <div id="distance-info" style="text-align:center; font-size:18px; margin-top:20px;">
            <p>"📦 Distance to Pickup: <span id="pickup-distance">Km</span></p>
            <p>🚚 Distance to Delivery: <span id="delivery-distance">Km</span></p>
            
        </div>
    </div>
</body>
</html>
