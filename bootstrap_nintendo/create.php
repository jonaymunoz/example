<!DOCTYPE html>
<html lang="en">
<?php 
    
    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $TitleError = null;
        $TypeError = null;
        $DeveloperError = null;
		$ValError = null;
        $dateError = null;
        
		
		$Title = $_POST['Title'];
        $Type = $_POST['Type'];
        $dev = $_POST['Developer'];
		$val = $_POST['UnitValue'];
        $rel = $_POST['ReleaseDate'];
        
        
        // validate input
        $valid = true;
        if (empty($Title)) {
            $TitleError = 'Please enter Title';
            $valid = false;
        }
        
        if (empty($Type)) {
            $TypeError = 'Please enter Type';
            $valid = false;
        
        }
        
        if (empty($dev)) {
            $DeveloperError = 'Please enter Developer Name';
            $valid = false;
        }
		
		if(empty($val)) {
			$ValError = "Please enter Unit Value Price";
			$valid = false;
		}
		
		if(empty($rel)) {
			$dateError = "Please enter Release Date";
			$valid = false;
		}
        
        
        if ($valid){ 
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO games (Title,Type,Developer,UnitValue,ReleaseDate) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($Title,$Type,$dev, $val, $rel));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<style>
		body {
			background-color: #ABA3A3;
		}
		div {
			background-color: #726B6B;
		}
	</style>
</head>

<body>
    <div class="container">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Product</h3>
                    </div>
                    <form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($TitleError)?'error':'';?>">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <input name="Title" type="text"  placeholder="Title" value="<?php echo !empty($Title)?$Title:'';?>">
                            <?php if (!empty($TitleError)): ?>
                                <span class="help-inline"><?php echo $TitleError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($TypeError)?'error':'';?>">
                        <label class="control-label">Type</label>
                        <div class="controls">
                            <input name="Type" type="text" placeholder="Type" value="<?php echo !empty($Type)?$Type:'';?>">
                            <?php if (!empty($TypeError)): ?>
                                <span class="help-inline"><?php echo $TypeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($DeveloperError)?'error':'';?>">
                        <label class="control-label">Developer</label>
                        <div class="controls">
                            <input name="Developer" type="text"  placeholder="Developer" value="<?php echo !empty($dev)?$dev:'';?>">
                            <?php if (!empty($DeveloperError)): ?>
                                <span class="help-inline"><?php echo $DeveloperError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($ValError)?'error':'';?>">
                        <label class="control-label">Unit Value</label>
                        <div class="controls">
                            <input name="UnitValue" type="text"  placeholder="Unit Value" value="<?php echo !empty($val)?$val:'';?>">
                            <?php if (!empty($ValError)): ?>
                                <span class="help-inline"><?php echo $ValError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					  <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Release Date</label>
                        <div class="controls">
                            <input name="ReleaseDate" type="text"  placeholder="Release Date" value="<?php echo !empty($rel)?$rel:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions" >
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
  </body>
</html>