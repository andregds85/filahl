<script>
       alert( 'Sucesso, Agora não estou mais na Fila' )
     </script>
<?php
include("conecta.php");
$id=$_GET['us_id'];
  
$sql = "update country SET position = '100' where id='$id'";
$res = mysqli_query($conn, $sql);
?>

<script>
window.location.href = "http://filahl.rf.gd";
</script>


