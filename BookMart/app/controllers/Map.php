<?php

class Map extends Controller {

    public function index() {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];
        
        

        $ordersModel = new Orders();
        $orders = $ordersModel->where(['order_id' => $order_id]);
        }
        //var_dump($orders);

        $pickupLocation = $orders[0]->pickup_location;
        //echo $pickupLocation;
        $deliveryLocation =$orders[0]->shipping_address;
        //echo $deliveryLocation;


        $courier = new Courier();
        $courierDetails = $courier->where(['user_id' =>  $_SESSION['user_id']],);

        //var_dump( $courierDetails);

        $driver = $courierDetails[0]; // stdClass object

        $fullAddress = $driver->address_line_1 . ', ' . $driver->address_line_2 . ', ' . $driver->city;
        //echo "Full Address: " . $fullAddress;

        // $pickupLocation = $orders['pickup_location'];
        // var_dump($pickupLocation);

        function getCoordinates($placeName) {
            $apiKey = 'AIzaSyCMW0Zg_K7LthAMmLiUjF_XsEaWcQOgqa0';
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($placeName) . "&key=" . $apiKey;

            $response = file_get_contents($url);
            $data = json_decode($response);

            if ($data->status === 'OK') {
                $location = $data->results[0]->geometry->location;
                return ['lat' => $location->lat, 'lng' => $location->lng];
            } else {
                return null;
            }
        }

        // Distance calculation using Haversine formula
        function calculateDistance($coord1, $coord2) {
            $earthRadius = 6371; // Earth radius in kilometers

            $lat1 = deg2rad($coord1['lat']);
            $lon1 = deg2rad($coord1['lng']);
            $lat2 = deg2rad($coord2['lat']);
            $lon2 = deg2rad($coord2['lng']);

            $deltaLat = $lat2 - $lat1;
            $deltaLon = $lon2 - $lon1;

            $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
                 cos($lat1) * cos($lat2) *
                 sin($deltaLon / 2) * sin($deltaLon / 2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

            $distance = $earthRadius * $c;

            return round($distance, 2); // km , 2 decimal point
        }

        // Get Coordinates 
        $pickupLocation = getCoordinates($pickupLocation);
        $deliveryLocation = getCoordinates($deliveryLocation);
        $currentCourierLocation = getCoordinates($fullAddress);

        // Calculate Distance 
        $distanceToPickup = calculateDistance($currentCourierLocation, $pickupLocation);
        $distanceToDelivery = calculateDistance($currentCourierLocation, $deliveryLocation);

        //var_dump( $distanceToPickup);
        //var_dump($distanceToDelivery);
        
        echo "📦Distance to Pickup: " . $distanceToPickup ."Km<br>";
        echo "🚚Distance to Delivery: " . $distanceToDelivery;


        // JSON format -> frontend 
        $locationData = json_encode([
            'pickup' => $pickupLocation,
            'delivery' => $deliveryLocation,
            'courier' => $currentCourierLocation,
            'distanceToPickup' => $distanceToPickup,
            'distanceToDelivery' => $distanceToDelivery
        ]);

        //var_dump($locationData);

        $this->view('map', ['locationData' => $locationData]);
    }
}
