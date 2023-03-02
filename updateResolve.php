<?php
session_start();

echo "Ultimo da Fila:"; 
echo $atual=$_SESSION['num'];
echo "<br>";

echo "Nova Posição:"; 
echo $carros=$atual+1;
echo "<br>";


echo "ID :";
echo $id=$_GET["cod"];

?>

<?php
include("conecta.php");
  
$sql = "update country SET position = '$carros' where id='$id'";
$res = mysqli_query($conn, $sql);

?>


<script>
alert( 'Alteração Efeutuada com Sucesso' )
</script>



<script>
window.location.href = "http://filahl.rf.gd";
</script>


	
	




