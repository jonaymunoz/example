<!DOCTYPE html><font></font>
<html lang="en"><font></font>
<?php 
    
    require 'database.php';

    if ( !empty($_POST)) {
        // keep track validation errors<font></font>
        $nameError = null;
        $emailError = null;
        $mobileError = null;
        
        // keep track post values<font></font>
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        
        // validate input<font></font>
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
        
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        
        if (empty($mobile)) {
            $mobileError = 'Please enter Mobile Number';
            $valid = false;
        }
        
        // insert data<font></font>
        if ($valid){ 
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name,email,mobile) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$mobile));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?><font></font>
<head>
    <meta charset="utf-8"><font></font>
    <link   href="css/bootstrap.min.css" rel="stylesheet"><font></font>
    <script src="js/bootstrap.min.js"></script><font></font>
</head><font></font>
<font></font>
<body><font></font>
    <div class="container"><font></font>
    <font></font>
                <div class="span10 offset1"><font></font>
                    <div class="row"><font></font>
                        <h3>Create a Customer</h3><font></font>
                    </div><font></font>
            <font></font>
                    <form class="form-horizontal" action="create.php" method="post"><font></font>
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>"><font></font>
                        <label class="control-label">Name</label><font></font>
                        <div class="controls"><font></font>
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>"><font></font>
                            <?php if (!empty($nameError)): ?><font></font>
                                <span class="help-inline"><?php echo $nameError;?></span><font></font>
                            <?php endif; ?><font></font>
                        </div><font></font>
                      </div><font></font>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>"><font></font>
                        <label class="control-label">Email Address</label><font></font>
                        <div class="controls"><font></font>
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>"><font></font>
                            <?php if (!empty($emailError)): ?><font></font>
                                <span class="help-inline"><?php echo $emailError;?></span><font></font>
                            <?php endif;?><font></font>
                        </div><font></font>
                      </div><font></font>
                      <div class="control-group <?php echo !empty($mobileError)?'error':'';?>"><font></font>
                        <label class="control-label">Mobile Number</label><font></font>
                        <div class="controls"><font></font>
                            <input name="mobile" type="text"  placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>"><font></font>
                            <?php if (!empty($mobileError)): ?><font></font>
                                <span class="help-inline"><?php echo $mobileError;?></span><font></font>
                            <?php endif;?><font></font>
                        </div><font></font>
                      </div><font></font>
                      <div class="form-actions"><font></font>
                          <button type="submit" class="btn btn-success">Create</button><font></font>
                          <a class="btn" href="index.php">Back</a><font></font>
                        </div><font></font>
                    </form><font></font>
                </div><font></font>
                <font></font>
    </div> <!-- /container --><font></font>
  </body><font></font>
</html><font></font>