<?php 
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM games where Title = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #ABA3A3;
		}
	</style>
</head>

<body>
    <div class="container">
    
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a Product</h3>
                    </div> 
                   
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Title'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Type</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Type'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Developer</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Developer'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Unit Value</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['UnitValue'] . "€";?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group">
                        <label class="control-label">Release Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ReleaseDate'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                    </div>
                </div>
                
    </div> <!-- /container -->
  </body>
</html>