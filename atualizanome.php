<?php
include("navBar.php");
include("menu.php");
$id=$_GET['us_id'];
?>

<div class="container">
<form method="GET" action="updateNome.php"> 
  <div class="form-group">
    <label for="exampleInputEmail1">ID</label>
    <input type="text" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o Nome">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">ID</label>
<input class='form-control' name='id' type='text' value='<?php echo  $id; ?>' readonly>
  </div>

  <button type="submit" class="btn btn-primary">Alterar Nome</button>
</form>
</div>



<?php
include("footer.php");
?>




