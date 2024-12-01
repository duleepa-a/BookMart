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
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
        <div class="search-bar-div">
            <form action="<?= ROOT ?>/book/search" method="GET" class="search-form ">
                <input 
                    type="text" 
                    name="keyword" 
                    class="search-bar" 
                    placeholder="Search your book, bookstore"
                    required  
                />
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </form>
        </div>
        <div class="nav-links">
                <select id="genres" name="genres" class="navbar-links-select" >
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                </select>
                <select id="menu" name="menu" class="navbar-links-select" >
                    <option value="" disabled selected>Menu</option>
                    <option value="My-Inventory">My Inventory</option>
                    <option value="Analytics">Analytics</option>
                    <option value="Orders">Orders</option>
                    <option value="Reviews">Reviews</option>
                    <option value="Ads">Ads & Offers</option>
                </select>
                <a href="<?= ROOT ?>/bookstoreProfile" class="navbar-links">My Profile</a>
                <a href="" class="navbar-links">Chat</a>
                <a href="" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <button id="logoutButton" class="navbar-links-select">Log Out</button>
        </div>
    </div>
    <div class="container"> 
        <div class="dashboard">
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
                <div class="value">
                    <h3>Net Revenue</h3>
                    <span class="span-value">LKR.136.4k</span>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="value">
                    <h3>Orders</h3>
                    <span class="span-value">600M</span>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="value">
                    <h3>Customers</h3>
                    <span class="span-value">100k</span>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-book"></i>
                </div>
                <div class="value">
                    <h3>Inventory</h3>
                    <span class="span-value">500</span>
                </div>
            </div>
        </div>
        <br><br>
        <div class="hero-section">
            <div class="hero left">
                <div class="chart-section">
                    <div class="chart-container">
                    <div class="tooltip top">Click to see monthly breakdown</div>
                    <svg width="200" height="200" viewBox="0 0 200 200">
                        <circle class="circle-bg" cx="100" cy="100" r="90"/>
                        <circle class="circle" cx="100" cy="100" r="90"/>
                    </svg>
                    <div class="center-text">
                        <p class="percentage">92%</p>
                        <p class="label">Customer Satisfaction</p>
                    </div>
                    </div>
                    <div class="info-section">
                    <p class="reviews-count">Based on</p>
                    <p class="reviews-count" style="font-weight: bold; font-size: 16px;">1,248 reviews</p>
                    <p class="monthly-trend">
                        <span class="trend-arrow">↗</span>
                        <span>+2.3% this month</span>
                    </p>
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
                <a href="<?= ROOT ?>/bookstoreInventory" class="inventory-bttn">Go to Inventory</a>
            </div>
            <table class="low-stock-table">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Date Added</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Stock Count</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#BK5625</td>
                    <td>29 April 2024</td>
                    <td>The Great Gatsby</td>
                    <td>F. Scott Fitzgerald</td>
                    <td>9780743273565</td>
                    <td><span class="status-label status-bad">11</span></td>
                </tr>
                <tr>
                    <td>#BK9652</td>
                    <td>25 April 2024</td>
                    <td>1984</td>
                    <td>George Orwell</td>
                    <td>9780451524935</td>
                    <td><span class="status-label status-critical">5</span></td>
                </tr>
                <tr>
                    <td>#BK5984</td>
                    <td>25 April 2024</td>
                    <td>To Kill a Mockingbird</td>
                    <td>Harper Lee</td>
                    <td>9780061120084</td>
                    <td><span class="status-label status-bad">18</span></td>
                </tr>
                <tr>
                    <td>#BK3625</td>
                    <td>21 April 2024</td>
                    <td>Pride and Prejudice</td>
                    <td>Jane Austen</td>
                    <td>9781503290563</td>
                    <td><span class="status-label status-critical">5</span></td>
                </tr>
                <tr>
                    <td>#BK8652</td>
                    <td>18 April 2024</td>
                    <td>The Catcher in the Rye</td>
                    <td>J.D. Salinger</td>
                    <td>9780316769488</td>
                    <td><span class="status-label status-critical">4</span></td>
                </tr>
            </tbody>
        </table>

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
    </div>
    <br><br><br>
    <hr>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h2><b>Book<span class="highlight">Mart</span></b></h2>
                <p><a href="#"><b>Home</b></a><b> | </b><a href="#"><b>Contact Us</b></a><b>    |   </b><a href="#"><b>About Us</b></a></p>
                <p>&copy; 2024 BookMart, all rights reserved.</p>
            </div>
            <div class="footer-center">
                <p><b><span>&#128222;</span> +1.555.555.5555</b></p>
                <p><b><span>&#9993;</span> bookmart@gmail.com</b></p>
            </div>
            <div class="footer-right">
                <h4 style="padding-left: 60px;">OUR VISION</h4>
                <p>"To revolutionize the online book market in Sri Lanka by providing an inclusive platform <br>where bookstores, sellers, and buyers can seamlessly connect, fostering a culture of reading<br>and promoting sustainable practices through second-hand book trading."</p>
                <p style="padding-left: 40px;"><b>BookMart &copy; 2024</b></p>
                <br><br>
            </div>
        </div>
    </footer>
    <script src="<?= ROOT ?>/assets/JS/bookstoreHome.js"></script>
    <script>
        function setPercentage(percent, totalReviews, monthlyChange) {
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
        
        // Update monthly trend
        const trendElement = document.querySelector('.monthly-trend');
        const arrow = monthlyChange >= 0 ? '↗' : '↘';
        const color = monthlyChange >= 0 ? '#48bb78' : '#f56565';
        trendElement.innerHTML = `
            <span class="trend-arrow">${arrow}</span>
            <span>${monthlyChange >= 0 ? '+' : ''}${monthlyChange}% this month</span>
        `;
        trendElement.style.color = color;
        }

        // Add interactivity
        const chartContainer = document.querySelector('.chart-container');
        const tooltip = document.querySelector('.tooltip');
        const circle = document.querySelector('.circle');

        // Show tooltip on hover
        chartContainer.addEventListener('mouseenter', () => {
        circle.classList.add('pulse');
        });

        chartContainer.addEventListener('mouseleave', () => {
        circle.classList.remove('pulse');
        });

        // Click interaction
        chartContainer.addEventListener('click', () => {
        alert('Monthly Breakdown:\nJan: 90%\nFeb: 91%\nMar: 92%\nApr: 92%');
        });

        // Initialize with sample data
        setPercentage(92, 1248, 2.3);
    </script>
</body>
</html>