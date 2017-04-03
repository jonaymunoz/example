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
        $sql = "SELECT * FROM customers where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

<!DOCTYPE html><font></font>
<html lang="en"><font></font>
<head><font></font>
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
                        <h3>Read a Customer</h3><font></font>
                    </div><font></font>
                    <font></font>
                    <div class="form-horizontal" ><font></font>
                      <div class="control-group"><font></font>
                        <label class="control-label">Name</label><font></font>
                        <div class="controls"><font></font>
                            <label class="checkbox"><font></font>
                                <?php echo $data['name'];?><font></font>
                            </label><font></font>
                        </div><font></font>
                      </div><font></font>
                      <div class="control-group"><font></font>
                        <label class="control-label">Email Address</label><font></font>
                        <div class="controls"><font></font>
                            <label class="checkbox"><font></font>
                                <?php echo $data['email'];?><font></font>
                            </label><font></font>
                        </div><font></font>
                      </div><font></font>
                      <div class="control-group"><font></font>
                        <label class="control-label">Mobile Number</label><font></font>
                        <div class="controls"><font></font>
                            <label class="checkbox"><font></font>
                                <?php echo $data['mobile'];?><font></font>
                            </label><font></font>
                        </div><font></font>
                      </div><font></font>
                        <div class="form-actions"><font></font>
                          <a class="btn" href="index.php">Back</a><font></font>
                       </div><font></font>
                    <font></font>
                     <font></font>
                    </div><font></font>
                </div><font></font>
                <font></font>
    </div> <!-- /container --><font></font>
  </body><font></font>
</html><font></font>