<?php

include("navBar.php");
include("menu.php");

include("conecta.php");
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela 
    $cmd = "select * from country where position = 100"; 
     
    $produtos = mysqli_query($conn,$cmd); 

    //conta o total de itens 
    $total = mysqli_num_rows($produtos); 

    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 1000; 

    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 

    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros; 
 
    $cmd = "select * from country where position = 100"; 
 
    $produtos = mysqli_query($conn,$cmd); 
    $total = mysqli_num_rows($produtos); 

?>

<?php
session_start();
$atual=$_SESSION['num'];
$carros=$atual+1;

?>

<div class="container">
<div class="table-responsive-sm">
  <table class="table">

  <thead>
    <tr>
      <th scope="col">Carros Inativos</th>
      <th scope="col">Posição Liberada / <?php echo $carros; ?></th>
      <th scope="col"></th>
    </tr>
  </thead>

  
<?php
while ($produto = mysqli_fetch_array($produtos)) { 
       
     echo "<tbody>";
     echo "<tr>";
     echo "<th scope='row'>";
     echo $produto['name'];  
     echo "</th>"; 

     echo "<td>";
     echo "<a  href='updateResolve.php?cod=$produto[id]' class='btn btn-light' role='button' aria-disabled='true'>Prosseguir</a>";
     echo "</td>"; 
  
     echo "</tr>"; 
     echo "</tbody>";

    } 
?>
  

</table>
</div>

<?php
include("footer.php");
?> 




