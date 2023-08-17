<?php
                   include './connection.php';     
                     $id= $_GET['id'];
                   
           
                         
                             $my_q ="delete from sales  WHERE `id` ='$id'";
                            $results= $conn->query($my_q);
                            
                            if ($results) {
                            


                              echo '<script>alert("sales well deleted")</script>';
                              echo "<script>window.location='./sales.php'</script>";
                        
                              
                            } else {
                              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            mysqli_close($conn);
                          
                   
                  
             ?>