<?php
session_start();
$_SESSION['total'] = "";
include('conecta.php');

    if (isset($_POST['update'])) {
        foreach($_POST['positions'] as $position) {
           $index = $position[0];
           $newPosition = $position[1];

           $conn->query("UPDATE country SET position = '$newPosition' WHERE id='$index'");
        }

        exit('success');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fila HL</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <?php include("navBar.php"); ?>
    <?php include("menu.php"); ?>


	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-4 col-md-offset-4">
				<table class="table table-stripped table-hover table-bordered">
					<thead>
						<tr>
							<td colspan='4'>Carros</td>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = $conn->query("SELECT id, name, position FROM country ORDER BY position");
							while($data = $sql->fetch_array()) {
							    echo '
							        <tr data-index="'.$data['id'].'" data-position="'.$data['position'].'">

                                        <td><img src="img2.jpg" width="30%" heidth="30%"></td>

                                        <td>'.$data['name'].'</td>
                                        <TD> '.$data['position'].'</TD>
                                        
                                        <TD><a href=atualizaposicao.php?us_id='.$data['id'].'> '.'Prosseguir para Viagem'.'</a></TD>
                                        </tr>
                                  
							    ';
                            }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


        <?php include("footer.php"); ?> 







    <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script
            src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>





    <script type="text/javascript">
        $(document).ready(function () {
           $('table tbody').sortable({
               update: function (event, ui) {
                   $(this).children().each(function (index) {
                        if ($(this).attr('data-position') != (index+1)) {
                            $(this).attr('data-position', (index+1)).addClass('updated');
                        }
                   });

                   saveNewPositions();
               }
           });
        });

        function saveNewPositions() {
            var positions = [];
            $('.updated').each(function () {
               positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
               $(this).removeClass('updated');
            });

            $.ajax({
               url: 'index.php',
               method: 'POST',
               dataType: 'text',
               data: {
                   update: 1,
                   positions: positions
               }, success: function (response) {
                    console.log(response);
               }
            });
        }
    </script>



</body>
</html>