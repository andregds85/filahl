<?php
 $id=$_GET["id"];
 $nome=$_GET["nome"];
?>


<script>
       alert( 'Alteração Efeutuada com Sucesso' )
     </script>
<?php
include("conecta.php");
  
$sql = "update country SET name = '$nome' where id='$id'";
$res = mysqli_query($conn, $sql);
?>



<script>
window.location.href = "http://filahl.rf.gd";
</script>







