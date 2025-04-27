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
     <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->
    <div class="large-container">
    <div class="container">
        <div class="card-container">
            <div class="card">
                <i class="card-icon fas fa-book"></i>
                <div class="card-content">
                    <div class="card-title">Total Books</div>
                    <div class="card-value"><?= isset($data['adminHomeData']['totalBooks']) ? number_format($data['adminHomeData']['totalBooks']) : 0 ?></div>               
                 </div>
            </div>
            <div class="card">
                <i class="card-icon fas fa-dollar-sign"></i>
                <div class="card-content">
                    <div class="card-title">Revenue</div>
                    <div class="card-value"><?= isset($data['adminHomeData']['revenue']) ? number_format($data['adminHomeData']['revenue']) : 0 ?></div>               
                 </div>
            </div>
            <div class="card">
                <i class="card-icon fas fa-shopping-cart"></i>
                <div class="card-content">
                    <div class="card-title">Orders</div>
                    <div class="card-value"><?= isset($data['adminHomeData']['orders']) ? number_format($data['adminHomeData']['orders']) : 0 ?></div>
                </div>
            </div>
            <div class="card">
                <i class="card-icon fas fa-users"></i>
                <div class="card-content">
                    <div class="card-title">Users</div>
                    <div class="card-value"><?= isset($data['adminHomeData']['users']) ? number_format($data['adminHomeData']['users']) : 0 ?></div>
                </div>
            </div>
        </div>
        <div class="charts">
            <div class="pie-chart-container">
                <canvas id="userDistributionChart"></canvas>
            </div>
            <div class="bar-chart-container">
                <canvas id="revenueSources"></canvas>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="bookSalesChart"></canvas>
        </div>
        
    </div>
     <!-- footer begin -->
     <?php include 'smallFooter.view.php'; ?>   
    <!-- footer end --> 
    </div>

    <script src="<?= ROOT ?>/assets/JS/adminHome.js"></script>
    <script>

        //pie chart (users)
        const roleCounts = <?= json_encode($data['adminHomeData']['roleCounts']) ?>;

        const ctx1 = document.getElementById('userDistributionChart').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Buyers', 'Sellers', 'Bookstores', 'Couriers'],
                datasets: [{
                    data: [
                        roleCounts.buyer,
                        roleCounts.bookSeller,
                        roleCounts.bookStore,
                        roleCounts.courier
                    ],
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


        //Book sales chart
        const orderChartData = <?= json_encode($data['adminHomeData']['sales']) ?>;

        const orderCtx = document.getElementById('bookSalesChart').getContext('2d');
        new Chart(orderCtx, {
            type: 'line',
            data: {
                labels: orderChartData.months,
                datasets: [{
                    label: 'Sales',
                    data: orderChartData.counts,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    tension: 0.3,
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Orders (Last 6 Months)'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Orders Count'
                        }
                    }
                }
            }
        });

       //revenue source
//revenue source
const approvedAdsRevenue = <?= $data['adminHomeData']['approvedAdsRevenue'] ?? 0 ?>;
const adminAdsRevenue = <?= $data['adminHomeData']['adminAdsRevenue'] ?? 0 ?>;
const systemFeeRevenue = <?= $data['adminHomeData']['systemFeeRevenue'] ?? 0 ?>;

const ctxRevenue = document.getElementById('revenueSources').getContext('2d');

new Chart(ctxRevenue, {
    type: 'bar',
    data: {
        labels: ['Approved Advertisements', 'Admin Advertisements', 'System Fee'],
        datasets: [{
            data: [approvedAdsRevenue, adminAdsRevenue, systemFeeRevenue],
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(153, 102, 255, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
            padding: {
                bottom: 30 // Add padding at the bottom for the legend
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Revenue Sources',
                padding: {
                    top: 10,
                    bottom: 20
                }
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    padding: 20, // Increase padding around labels
                    boxWidth: 15, // Adjust color box width
                    font: {
                        size: 12 // Adjust font size if needed
                    },
                    generateLabels: function(chart) {
                        const data = chart.data;
                        if (data.labels.length && data.datasets.length) {
                            return data.labels.map(function(label, i) {
                                const dataset = data.datasets[0];
                                const backgroundColor = dataset.backgroundColor[i];
                                const borderColor = dataset.borderColor[i];
                                
                                return {
                                    text: label + ': Rs ' + dataset.data[i],
                                    fillStyle: backgroundColor,
                                    strokeStyle: borderColor,
                                    lineWidth: 1,
                                    hidden: false,
                                    index: i
                                };
                            });
                        }
                        return [];
                    }
                }
            }
        },
        scales: {
            x: {
                display: false 
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Revenue Amount (Rs)'
                }
            }
        }
    }
});


    </script>
</body>
</html>