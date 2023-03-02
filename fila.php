<?php

include("navBar.php");
include("menu.php");



include("conecta.php");
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela 
    $cmd = "select * from country where position <> 100"; 
     
    $produtos = mysqli_query($conn,$cmd); 

    //conta o total de itens 
    $total = mysqli_num_rows($produtos); 

    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 1000; 

    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 

    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros; 
 
    $cmd = "select * from country where position <> 100"; 
 
    $produtos = mysqli_query($conn,$cmd); 
    $total = mysqli_num_rows($produtos); 

    session_start();
    $_SESSION['num'] = $total;



?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<div class="container">
<div class="card-deck">
  
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Total : <?php echo $total; ?></h5>
      <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Total na Fila "];
var yValues = ['<?php echo $total; ?>'];
var barColors = [
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Carros na Fila"
    }
  }
});
</script>
      <p class="card-text"><small class="text-muted">
      <a href="resolve.php" class="btn btn-light" role="button" aria-disabled="true">Prosseguir</a>
      </small></p>
    </div>
  </div>
  




</div>







<?php
include("footer.php");
?>