<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Order Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierOrderDetails.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2><i class="fas fa-box-open me-2"></i>Courier Order Details</h2>
            <li class="breadcrumb-item active">Order #<?= $order->order_id ?></li>
        </div>

        <div class="grid">
            <!-- Left Column -->
            <div>
                <!-- Order Summary Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Order #<?= $order->order_id ?></h5>
                        <div>
                            <?php 
                                $statusClass = '';
                                switch($order->order_status) {
                                    case 'pending':
                                        $statusClass = 'pending';
                                        break;
                                    case 'shipping':
                                        $statusClass = 'processing';
                                        break;
                                    case 'completed':
                                        $statusClass = 'shipped';
                                        break;
                                    case 'cancelled':
                                        $statusClass = 'cancelled';
                                        break;
                                    default:
                                        $statusClass = '';
                                }
                            ?>
                            <span class="badge <?= $statusClass ?>">
                                <span class="badge-dot"></span>
                                <?= ucfirst($order->order_status) ?>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="book-container">
                            <div class="book-image">
                                <img src="<?= ROOT ?>/assets/Images/book cover images/<?=$book->cover_image ?>" 
                                     alt="<?= $book->title ?>">
                            </div>
                            <div class="book-details">
                                <h4><?= $book->title ?></h4>
                                <p class="text-muted">by <?= $book->author ?></p>
                                
                                <div class="detail-grid">
                                    <div>
                                        <div class="detail-row">
                                            <span class="text-muted">ISBN</span>
                                            <div><?= $book->ISBN ?></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="detail-row">
                                            <span class="text-muted">Genre</span>
                                            <div><?= $book->genre ?></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="detail-row">
                                            <span class="text-muted">Publisher</span>
                                            <div><?= $book->publisher ?></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="detail-row">
                                            <span class="text-muted">Language</span>
                                            <div><?= $book->language ?></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="detail-row">
                                            <span class="text-muted">Condition</span>
                                            <div><?= ucfirst($book->book_condition) ?></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="detail-row">
                                            <span class="text-muted">Quantity</span>
                                            <div><?= $order->quanitity ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Details -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Shipping Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Map Placeholder -->
                        <div id="map" class="map-container">
                           
                        </div>
                        
                        <div class="shipping-flex">
                            <div class="shipping-col">
                                <h6 class="fw-bold mb-2">Pickup Location</h6>
                                <p><?= $order->pickup_location ?></p>
                            </div>
                            <div class="shipping-col">
                                <h6 class="fw-bold mb-2">Delivery Address</h6>
                                <p class="mb-1"><?= $order->shipping_address ?></p>
                                <p class="mb-1"><?= $order->city ?>, <?= $order->district ?></p>
                                <p><?= $order->province ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div>
                <!-- Order Actions -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Order Actions</h5>
                    </div>
                    <div class="card-body">
                        <?php if($order->order_status == "pending" && empty($order->courier_id)) :?>
                                <form action="<?= ROOT ?>/CourierOrderDetails/create" method="POST">
                                    <input type="hidden" name="order_id" value="<?= $order->order_id ?>">
                                    <input type="hidden" name="pickup_location" value="<?= $order->order_id ?>">
                                    <input type="hidden" name="shipping_address" value="<?= $order->order_id ?>">
                                    <input type="hidden" name="distance" value="<?= $order->estimated_distance ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-check-circle me-2"></i>Accept Order
                                    </button>
                                </form>
                        <?php elseif($order->order_status == "pending" && !empty($order->pinCode)) :?>
                        <div class="pincode-container">
                            <div class="pincode-value">
                                <p><?= $order->pinCode ?></p>
                            </div>
                            <div class="pincode-message">
                                <i class="fas fa-info-circle pincode-icon"></i>
                                Show this code to the bookstore when picking up the order
                            </div>
                        </div>
                        <?php elseif($order->order_status == "shipping" ):?>
                            <form action="<?= ROOT ?>/CourierOrderDetails/update" method="POST">
                                    <input type="hidden" name="order_id" value="<?= $order->order_id ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-check-circle me-2"></i> Complete
                                    </button>
                            </form>
                        <?php elseif($order->order_status == "completed" || $order->order_status == "reviewed") : ?>
                            <form action="<?= ROOT ?>/CourierOrderDetails/delete" method="POST">
                                    <input type="hidden" name="order_id" value="<?= $order->order_id ?>">
                                    <input type="hidden" name="pickup_location" value="<?= $order->order_id ?>">
                                    <input type="hidden" name="shipping_address" value="<?= $order->order_id ?>">
                                    <input type="hidden" name="distance" value="<?= $order->estimated_distance ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-check-circle me-2"></i>Delete Order
                                    </button>
                            </form>
                        <?php endif;?>
                    </div>
                </div>

                <!-- Order Details Summary -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="detail-row flex">
                            <span>Order ID</span>
                            <span class="fw-bold">#<?= $order->order_id ?></span>
                        </div>
                        <div class="detail-row flex">
                            <span>Date Placed</span>
                            <span><?= date('M d, Y', strtotime($order->created_on)) ?></span>
                        </div>
                        <?php if($order->shipped_date): ?>
                        <div class="detail-row flex">
                            <span>Shipped Date</span>
                            <span><?= date('M d, Y', strtotime($order->shipped_date)) ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if($order->completed_date): ?>
                        <div class="detail-row flex">
                            <span>Completed Date</span>
                            <span><?= date('M d, Y', strtotime($order->completed_date)) ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="detail-row flex">
                            <span>Payment Method</span>
                            <span><?= ucfirst($order->payment_method) ?></span>
                        </div>
                        <div class="detail-row flex">
                            <span>Payment Status</span>
                            <span class="badge <?= $order->payment_status == 'paid' ? 'paid' : 'unpaid' ?>">
                                <?= ucfirst($order->payment_status) ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Payment Details -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Payment Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="detail-row flex">
                            <span>Book Price</span>
                            <span>Rs. <?= number_format($book->price, 2) ?></span>
                        </div>
                        <div class="detail-row flex">
                            <span>Quantity</span>
                            <span><?= $order->quanitity ?></span>
                        </div>
                        <div class="detail-row flex">
                            <span>Delivery Fee</span>
                            <span><?= $order->delivery_fee ?></span>
                        </div>
                        <?php if($order->discount_applied): ?>
                        <div class="detail-row flex text-success">
                            <span>Discount</span>
                            <span>-Rs./<?= number_format($order->discount_applied * $book->price / 100, 2) ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="detail-row flex fw-bold">
                            <span>Total Amount</span>
                            <span>Rs.<?= number_format($order->total_amount, 2) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>