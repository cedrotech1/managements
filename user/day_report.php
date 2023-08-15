<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>sales</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 
</head>

<body>

   <?php
        include './includes/header.php';
        include './includes/aside.php';
?>

  <main id="main" class="main">

    

    <section class="section">
      <div class="row">
      

        <div class="col-lg-12">

        


              <button type="button" class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#disabledAnimation">
                ADD DAY FOR REPORT
              </button>
              <br>
       
              <div class="col-12">
                <br>
                <div class="card recent-sales overflow-auto">
  
                    <!-- Disabled Animation Modal -->
             

              
              <div class="modal" id="disabledAnimation" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">DAY REPORT</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" method='post' action='day_report.php'>
            

            
                
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="date"  class="form-control" id="floatingName" name='day' placeholder="Your Name">
                    <label for="floatingName">day report</label>
                  </div>
                </div>
               
               
          
                <div class="text-center">
                  <button type="submit" name='go' class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->
                    </div>
                  
                  </div>
                </div>
              </div><!-- End Disabled Animation Modal-->

                 

                  <?php
                    include './connection.php';
                     @$date=$_POST['day'];
                    // $date=Date('d/m/20y');
                    @$go=$_POST['go'];
                    if(isset($go)){
                      $sql2 = "SELECT sum(sales.total_price) as total,sum(sales.profit) as profit FROM sales,product,customers 
                      WHERE product.p_id=sales.p_id AND customers.customer_id=sales.c_id and sales.date='$date'";
                      $result2 = $conn->query($sql2);
                      while($datax=mysqli_fetch_array($result2)){
                        $total=$datax['total'];
                        $profit=$datax['profit'];
                      }

                      $sql = "SELECT c_fname,c_lname,p_name,sales.quantity,sales.price,date,time,sales.total_price,sales.unity,sales.profit FROM sales,product,customers 
                      WHERE product.p_id=sales.p_id AND customers.customer_id=sales.c_id and sales.date='$date'";
                      $result = $conn->query($sql);
  
                      if ($result->num_rows > 0) {
                     ?>
                      <div class="card-body">
                    <h5 class="card-title">Day report <span>| </span></h5>

                  <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                     
                    
                      <th scope="col">customer</th>
                      <th scope="col">product</th>
                    
                      <th scope="col">quantity</th>
                      <th scope="col">U_price</th>
                      <th scope="col">total price</th>
                      <th scope="col">profit</th>
                      
                    </tr>
                  </thead> 
                  <tbody>

                     <?php
            
                   
	
                   
                     $i=0;
                      while($row = mysqli_fetch_array($result)) {
                       $i++;
                       ?>
                          <tr>
                          <!-- `id`, `names`, `email`, `subject`, `message` -->
                              <th scope="row"><?php echo $i; ?></th>
                              
                              <td><?php echo $row["c_fname"];?></td>
                             
                              <td><?php echo $row["2"].'';?></td>
                              <td><?php echo $row["3"].' in '.$row["unity"];?></td>
                              <td><?php echo $row["4"].'   Rwf';?></td>
                              <td><?php echo $row["total_price"].'   Rwf';?></td>
                              <td><?php echo $row["profit"].'   Rwf';?></td>
     
                         
                    </tr>
                       <?php
                      }
                    } else {
                      ?>
                      <div class="card" style='padding:1cm'>
                        <center> <h4><i>There is no sales at this dates <?php  echo $date; ?></i></h4></center>
                      </div>

                      <?php

                    }
                  
                  ?>
                 
               
              
               
                  </tbody>
                </table>
                    <?php
                    if ($result->num_rows > 0) {
                      ?>
                      <h4>Total sales amount : <?php echo $total.'   Rwf'; ?></h4>
                <h4>Total profits amount : <?php echo $profit.'   Rwf'; ?></h4>
                      <?php
                    }

                    ?>

                

  
                  </div>
  
                </div>
              </div><!-- End Recent Sales -->
  
            

            </div>
          </div>
          <?php
          }
          ?>

       
    </section>

  </main><!-- End #main -->

  

  <?php
        
        include './includes/footer.php';
?>




  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>