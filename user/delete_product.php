<?php
                   include './connection.php';     
                     $id= $_GET['id'];
                   
                   
                     $my_q ="delete from product  WHERE `p_id` ='$id'";
                     $results= $conn->query($my_q);
                     
                     if ($results) {
                     


                       echo '<script>alert("Well deleted")</script>';
                       echo "<script>window.location='./product.php'</script>";
                 
                       
                     } else {
                       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                     }
                 
                     mysqli_close($conn);
                   
                  
             ?>