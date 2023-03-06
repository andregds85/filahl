<?php
$conn = mysqli_connect("localhost", "root", "", "site1")
or die("Erro na conexăo com o BD");


                 $sql = "SELECT * from country WHERE position < 99";
                 $res = mysqli_query($conn, $sql);
                 while ($produto = mysqli_fetch_array( $res)) { 
                        
                      echo "<tbody>";
                      echo "<tr>";
                      echo $nome=$produto['id'];  

                      echo "<th scope='row'>";
                      echo $nome=$produto['name'];  
                      echo "</th>"; 
                 
                      echo "<td>";
                      echo $p=$produto['position']; 

                      echo "</td>"; 
                      echo "</tr>"; 
                      echo "</tbody>";
                 
                     } 
                   

?>                 