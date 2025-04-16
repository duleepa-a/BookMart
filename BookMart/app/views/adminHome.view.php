<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminHome.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--bell icon-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Admin Home</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>        
    <!-- navBar division end -->
    <div class="large-container">
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/" class="active" ><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers" ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminViewContactUs"><i class="fa-solid fa-envelope"></i>Complaints</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <div class="container">
        <div class="card-container">
            <div class="card">
                <i class="card-icon fas fa-book"></i>
                <div class="card-content">
                    <div class="card-title">Total Books</div>
                    <div class="card-value">1,243</div>
                </div>
            </div>
            <div class="card">
                <i class="card-icon fas fa-dollar-sign"></i>
                <div class="card-content">
                    <div class="card-title">Monthly Revenue</div>
                    <div class="card-value">LKR. 45,678</div>
                </div>
            </div>
            <div class="card">
                <i class="card-icon fas fa-shopping-cart"></i>
                <div class="card-content">
                    <div class="card-title">Orders</div>
                    <div class="card-value">342</div>
                </div>
            </div>
            <div class="card">
                <i class="card-icon fas fa-users"></i>
                <div class="card-content">
                    <div class="card-title">New Users</div>
                    <div class="card-value">127</div>
                </div>
            </div>
        </div>
        <div class="charts">
            <div class="pie-chart-container">
                <canvas id="userDistributionChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="bookSalesChart"></canvas>
            </div>
        </div>
        <div class="line-chart-container">
            <canvas id="userTrafficChart"></canvas>
        </div>
        
    </div>
     <!-- footer begin -->
     <?php include 'smallFooter.view.php'; ?>   
    <!-- footer end --> 
    </div>

    <script src="<?= ROOT ?>/assets/JS/adminHome.js"></script>
    <script>
        const ctx2 = document.getElementById('userTrafficChart').getContext('2d');
        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Daily Active Users',
                    data: [100, 1400, 1800, 500, 2400, 2700],
                    borderColor: '#de8c59',
                    tension: 0.5, // This creates a more curved line
                    fill: true,
                    backgroundColor: 'rgba(222, 140, 89, 0.2)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly User Traffic 2024'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Daily Active Users'
                        }
                    }
                }
            }
        });


        const ctx1 = document.getElementById('userDistributionChart').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Buyers', 'Sellers', 'Bookstores', 'Couriers'],
                datasets: [{
                    data: [45, 10, 35, 10],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(99, 132, 255)',
                        'rgb(32, 102, 148)',
                        'rgb(140, 192, 240)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'User Type Distribution'
                    }
                }
            }
        });

        const ctx = document.getElementById('bookSalesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Book Sales',
                    data: [120, 190, 230, 280, 340, 420],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                    fill: true,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Monthly Book Sales 2024'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Books Sold'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>