<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	
	<style>
		body {
			background-color: #ABA3A3;
		}
	</style>
</head>
 
<body>

    <div class="container">
            <div class="row">
                <h3>Nintendo Switch Store   <img src="nintendo.jpg" border="0" width="100" height="100"> </h3> 
            </div>
            <div class="row">
			<p>
                    <a href="create.php" class="btn btn-success">Add Product</a><font></font>
            </p> 
			<!--
				HE CAMBIADO LO DE ARRIBA, PARA AÑADIR EL BOTÓN.
			-->
				
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Type</th>
					  <th>Developer</th>
					  <th>Unit Value</th>
                      <th>Realease Date</th>
					  <th>Action</th> <!-- Esto lo he añadido tambien, es en la cabecera unicamente texto -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
				   $cont = 0;
				   $tot = 0;
				   
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM games ORDER BY Type DESC';
                   foreach ($pdo->query($sql) as $row) {
							$cont++; //Para llevar el numero de productos.
							$tot += $row['UnitValue'];
                            echo '<tr>';
                            echo '<td>'. $row['Title'] . '</td>';
                            echo '<td>'. $row['Type'] . '</td>';
							echo '<td>'. $row['Developer'] . '</td>';
							echo '<td>'. $row['UnitValue'] . ' €</td>';
                            echo '<td>'. $row['ReleaseDate'] . '</td>';
							echo '<td width=250>';
							
                                //echo '<a class="btn" href="read.php?id='.$row['Title'].'">Read</a>';
								echo '<a data-toggle="modal"  href="#read'. str_replace(" ","_",$row['Title']).'" class="btn btn-primary btn">Read</a>';
								//<a href="#" data-reveal-id="myModal">Abrir la ventana modal</a>
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['Title'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['Title'].'">Delete</a>';
                                echo '</td>';
								
                            echo '</tr>';
							
							?>
		<div id="read<?= str_replace(" ","_",$row['Title']) ?>" class="modal hide fade in" style="display: none; ">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×</a>
              <h3>Read a Product</h3>
            </div>
            <div class="modal-body">
			
              <div class="container">
    
                <div class="span10 offset1">
                    <div class="row">
                        <!--<h3>Read a Product</h3>-->
                    </div> 
					
                    <div class="form-horizontal" >
					
                      <div class="control-group">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?= $row['Title'] ?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Type</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $row['Type'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Developer</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $row['Developer'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Unit Value</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $row['UnitValue'] . "€";?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Release Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $row['ReleaseDate'];?>
                            </label>
                        </div>
                      </div>
                    </div>
                </div>
                
				</div> <!-- /container -->	        
            </div>
            <div class="modal-footer">
              <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
            </div>
          </div>
							
							<?php
							
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
			<?php echo 'Number of products: '. $cont; ?>
			<?php echo ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Total Price: '. $tot . ' €'; ?>
			
			

			
        </div>
    </div> <!-- /container -->
	
	<!--
	<script>
		$(document).on("click", ".open-Modal", function () {
		var title = $(this).data('id');
		$(".modal-body #title").val( title );
		});
	</script>
	-->
	

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
  </body>
</html>