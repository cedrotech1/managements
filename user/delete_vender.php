<?php
                   include './connection.php';     
                     $id= $_GET['id'];

                     $sql = "SELECT * FROM product,venders where product.vid=venders.v_id and venders.v_id='$id'";

              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                                
                echo '<script>alert("you can not delete suppliers arleady serve you product")</script>';
                         
                echo "<script>window.location='./venders.php'</script>";
                         
                          }else{
                             $my_q ="delete from venders  WHERE `v_id` ='$id'";
                          $results= $conn->query($my_q);
                          
                          if ($results) {
                          


                            echo '<script>alert("Well deleted")</script>';
                            echo "<script>window.location='./venders.php'</script>";
                      
                            
                          } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                          }
                           mysqli_close($conn);
                          }
                        
                  
             ?>