<?php
                   include './connection.php';     
                     $id= $_GET['id'];

                     $sql = "SELECT name,p_name,sales.quantity,sales.price,date,time,
                     sales.total_price,sales.unity,sales.profit FROM sales,product,customers 
          WHERE product.p_id=sales.p_id AND customers.customer_id=sales.c_id and product.p_id='$id'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
                   
            echo '<script>alert("you can not delete product arleady sold")</script>';            
            echo "<script>window.location='./product.php'</script>";
                     
                    }else{
                            $my_q ="delete from product  WHERE `p_id` ='$id'";
                          $results= $conn->query($my_q);
                          
                          if ($results) {
                          


                            echo '<script>alert("Well deleted")</script>';
                            echo "<script>window.location='./product.php'</script>";
                      
                            
                          } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                          }
                      
                          mysqli_close($conn);
                    }
                   
                  
             ?>