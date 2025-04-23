<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Courier Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--bell icon-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminViewContactUs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php';?>
    <!-- navBar division end -->
     
    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <main>
        <h1 class="mtopic">Courier Complains</h1> <br><br>
        
            
            <br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('new-details')">New Complains</button>
                <button class="tab-button" onclick="showTab('bank-details')">Viewed</button>
            </nav>
    
              <div class="tab-content" id="new-details">
              <?php if(!empty($complains)): ?>    
                <div class="table-wrapper">
                    <table>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <!-- <th>Courier ID</th> -->
                          <th>Order ID</th>
                          <th>Complain</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($complains as $complain): ?>
                        <tr>
                        <td><?= $complain->id ?></td>
                          <td><?= $complain->order_id ?></td>
                          <td><?= $complain->complain ?></td>
                          <td>
                          <form action="<?= ROOT ?>/adminViewCourierComplains/update" method="POST">
                            <input type="hidden" name="complain_id" value="<?= $complain->id ?>"> 
                            <button type="submit" class="view-btn">Mark As Read</button>
                            </form>
                          </td>
                        </tr>
                            <?php endforeach; ?>  
                      </tbody>
                    </table>
                </div>
                <?php else: ?>
                    <div class="message-div">
                      <p>No Complains</p>
                    </div>
                <?php endif; ?>
              </div>

                <div class="tab-content" id="bank-details" style="display: none;">
                    <?php if(!empty($markedcomplains)): ?>
                        <div class="table-wrapper">
                          <table>
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <!-- <th>Courier ID</th> -->
                                  <th>Order ID</th>
                                  <th>Complain</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                  <?php foreach ($markedcomplains as $complain): ?>
                                <tr>
                                  <td><?= $complain->id ?></td>
                                  <td><?= $complain->order_id ?></td>
                                  <td><?= $complain->complain ?></td>
                                  <!-- <td><?= $complain->message ?></td> -->
                                  <td>
                                    <form action="<?= ROOT ?>/adminViewCourierComplains/delete" method="POST">
                                    <input type="hidden" name="complain_id" value="<?= $complain->id ?>"> 
                                    <button type="submit" class="view-btn">Delete</button>
                                    </form>
                                  </td>
                                </tr>
                                    <?php endforeach; ?>
                            </tbody>
                          </table>
                    </div>
                    <?php else: ?>
                      <div class="message-div">
                        <p>No Complains</p>
                      </div>
                    <?php endif; ?>
                </div>
    </main>
    <script src="<?= ROOT ?>/assets/JS/adminViewContactUs.js"></script>
</body>
</html>