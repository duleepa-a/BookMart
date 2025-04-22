<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>        
    <!-- navBar division end -->
     <!-- sideBar division begin -->
     <?php include 'commonSidebar.view.php'; ?>        
    <!-- sideBar division end -->
    <div class="large-container">
        <div class="container"> 
            <div class="card-container">
                <div class="card">
                    <i class="fa-solid fa-dollar-sign card-icon"></i>
                    <div class="card-content">
                        <div class="card-title">Net Revenue</div>
                        <div class="card-value">Rs <?= $summary->revenue ?? 0.0 ?></div>
                    </div>
                </div>
                <div class="card">
                    <i class="fa-solid fa-cart-shopping card-icon"></i>
                    <div class="card-content">
                        <div class="card-title">Orders</div>
                        <div class="card-value"><?= $summary->orders_count ?></div>
                    </div>
                </div>
                <div class="card">
                    <i class="fa-solid fa-user card-icon"></i>
                    <div class="card-content">
                        <div class="card-title">Followers</div>
                        <div class="card-value"><?= $summary->followers_count ?></div>
                    </div>
                </div>
                <div class="card">
                    <i class="fa-solid fa-book card-icon"></i>
                    <div class="card-content">
                        <div class="card-title">Inventory</div>
                        <div class="card-value"><?= $summary->inventory_count ?></div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="hero-section">
                <div class="hero left">
                    <div class="chart-section">
                        <div class="chart-container">
                        <svg width="200" height="200" viewBox="0 0 200 200">
                            <circle class="circle-bg" cx="100" cy="100" r="90"/>
                            <circle class="circle" cx="100" cy="100" r="90"/>
                        </svg>
                        <div class="center-text">
                            <p class="percentage"><?= ($summary->rating)?></p>
                            <p class="label">Customer Ratings</p>
                        </div>
                        </div>
                        <div class="info-section">
                        <p class="reviews-count">Based on</p>
                        <p class="reviews-count" style="font-weight: bold; font-size: 16px;"> reviews</p>
                        </div>
                    </div>
                </div>
                <div class="hero right">
                    <svg viewBox="0 0 800 250" xmlns="http://www.w3.org/2000/svg">
                        <!-- Title -->
                        <text x="400" y="30" text-anchor="middle" class="chart-title">Book Sales by Category</text>

                        <!-- Grid lines -->
                        <g transform="translate(60, 45)">
                            <!-- Horizontal grid lines -->
                            <line x1="0" y1="0" x2="600" y2="0" class="grid-line" />
                            <line x1="0" y1="35" x2="600" y2="35" class="grid-line" />
                            <line x1="0" y1="70" x2="600" y2="70" class="grid-line" />
                            <line x1="0" y1="105" x2="600" y2="105" class="grid-line" />
                            <line x1="0" y1="140" x2="600" y2="140" class="grid-line" />
                            <line x1="0" y1="175" x2="600" y2="175" class="grid-line" />
                        </g>

                        <!-- Bars -->
                        <g transform="translate(60, 220)">
                            <!-- Fiction -->
                            <rect class="bar" x="40" width="80" y="-150" height="0" fill="#FF6384">
                                <animate attributeName="height" from="0" to="150" dur="0.8s" fill="freeze" />
                            </rect>
                            
                            <!-- Non-Fiction -->
                            <rect class="bar" x="160" width="80" y="-120" height="0" fill="#36A2EB">
                                <animate attributeName="height" from="0" to="120" dur="0.8s" fill="freeze" />
                            </rect>
                            
                            <!-- Children's -->
                            <rect class="bar" x="280" width="80" y="-135" height="0" fill="#FFCE56">
                                <animate attributeName="height" from="0" to="135" dur="0.8s" fill="freeze" />
                            </rect>
                            
                            <!-- Science -->
                            <rect class="bar" x="400" width="80" y="-105" height="0" fill="#4BC0C0">
                                <animate attributeName="height" from="0" to="105" dur="0.8s" fill="freeze" />
                            </rect>
                            
                            <!-- History -->
                            <rect class="bar" x="520" width="80" y="-127" height="0" fill="#9966FF">
                                <animate attributeName="height" from="0" to="127" dur="0.8s" fill="freeze" />
                            </rect>
                        </g>

                        <!-- Value labels -->
                        <g transform="translate(60, 220)">
                            <text x="80" y="-155" text-anchor="middle" class="value-label">250</text>
                            <text x="200" y="-125" text-anchor="middle" class="value-label">180</text>
                            <text x="320" y="-140" text-anchor="middle" class="value-label">220</text>
                            <text x="440" y="-110" text-anchor="middle" class="value-label">150</text>
                            <text x="560" y="-132" text-anchor="middle" class="value-label">200</text>
                        </g>

                        <!-- X-axis labels -->
                        <g transform="translate(60, 235)">
                            <text x="80" y="0" text-anchor="middle" class="axis-label">Fiction</text>
                            <text x="200" y="0" text-anchor="middle" class="axis-label">Non-Fiction</text>
                            <text x="320" y="0" text-anchor="middle" class="axis-label">Children's</text>
                            <text x="440" y="0" text-anchor="middle" class="axis-label">Science</text>
                            <text x="560" y="0" text-anchor="middle" class="axis-label">History</text>
                        </g>

                        <!-- Y-axis labels -->
                        <g transform="translate(50, 220)">
                            <text x="0" y="-175" text-anchor="end" class="axis-label">300</text>
                            <text x="0" y="-140" text-anchor="end" class="axis-label">240</text>
                            <text x="0" y="-105" text-anchor="end" class="axis-label">180</text>
                            <text x="0" y="-70" text-anchor="end" class="axis-label">120</text>
                            <text x="0" y="-35" text-anchor="end" class="axis-label">60</text>
                            <text x="0" y="0" text-anchor="end" class="axis-label">0</text>
                        </g>
                    </svg>
                </div> 
            </div>
            <br><br>
            <div class="low-stock-div">
                <div class="header">
                    <h2 class="low-stock-heading">Books low on stock</h2>
                    <a href="<?= ROOT ?>/BookstoreController/inventory" class="inventory-bttn">Go to Inventory</a>
                </div>
                <?php if(!empty($lowStockBooks)):?>
                <table class="low-stock-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>ISBN</th>
                            <th>Date Added</th>
                            <th>Stock Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lowStockBooks as $book): ?>
                            <tr>
                                <td><?= htmlspecialchars($book->title) ?></td>
                                <td><?= htmlspecialchars($book->author) ?></td>
                                <td><?= htmlspecialchars($book->genre) ?></td>
                                <td><?= htmlspecialchars($book->ISBN) ?></td>
                                <td><?= date('d F Y', strtotime($book->created_at)) ?></td>
                                <td>
                                    <span class="status-label <?= $book->quantity < 10 ? 'status-critical' : 'status-bad' ?>">
                                        <?= htmlspecialchars($book->quantity) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else :?>
                    <div class="message-div">
                        <p>Great news! All your books are well-stocked at the moment.</p>
                    </div>
                <?php endif;?>

            </div>
            <br><br>
            <div class="inventory-count">
                <div class="header">
                    <h2 class="inventory-heading">Inventory Count</h2>
                </div>
                <div class="inventory-item">
                        <div class="inventory-card">
                            <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                            <p>Fiction</p>
                            <span>10</span>
                        </div>
                        <div class="inventory-card">
                            <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                            <p>History</p>
                            <span>50</span>
                        </div>
                        <div class="inventory-card">
                        <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                            <p>Romance</p>
                            <span>40</span>
                        </div>
                        <div class="inventory-card">
                        <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                            <p>Novel</p>
                            <span>20</span>
                        </div>
                        <div class="inventory-card">
                        <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                            <p>Sci-Fi</p>
                            <span>30</span>
                        </div>
                </div>
            </div>
            <br><br>
            <!-- footer begin -->
                <?php include 'smallFooter.view.php'; ?>   
            <!-- footer end -->
        </div>
        <br>
         
    </div>
    </body>
    <script src="<?= ROOT ?>/assets/JS/bookstoreHome.js"></script>
    <script>
        function setPercentage(percent, totalReviews) {
        const circle = document.querySelector('.circle');
        const circumference = 2 * Math.PI * 90;
        
        document.styleSheets[0].insertRule(
            `@keyframes progress {
            to {
                stroke-dasharray: ${(percent / 100) * circumference} ${circumference};
            }
            }`,
            document.styleSheets[0].cssRules.length
        );
        
        document.querySelector('.percentage').textContent = `${percent}%`;
        document.querySelector('.reviews-count:last-of-type').textContent = 
            `${totalReviews.toLocaleString()} reviews`;
        
        }

        // Initialize with sample data
        setPercentage(<?= ($summary->rating)?>, <?= $summary->reviews_count?>);
    </script>
</body>
</html>