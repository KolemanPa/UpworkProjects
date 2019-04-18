<?php include("includes/a_config.php");?>
<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/navigation.php");?>

<div class="container">
    <form class="form-horizontal" role="form" action="./includes/signup.inc.php" method="post">
        <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <h2>Signup</h2>
               <h6>
               <?php
               // Here we create an error message if the user made an error trying to sign up.
               if (isset($_GET["error"])) {
                   if ($_GET["error"] == "emptyfields") {
                       echo '<p class="signuperror">Fill in all fields!</p>';
                   }
                   else if ($_GET["error"] == "invaliduidmail") {
                       echo '<p class="signuperror">Invalid username and e-mail!</p>';
                   }
                   else if ($_GET["error"] == "invaliduid") {
                       echo '<p class="signuperror">Invalid username!</p>';
                   }
                   else if ($_GET["error"] == "invalidmail") {
                       echo '<p class="signuperror">Invalid e-mail!</p>';
                   }
                   else if ($_GET["error"] == "passwordcheck") {
                       echo '<p class="signuperror">Your passwords do not match!</p>';
                   }
                   else if ($_GET["error"] == "usertaken") {
                       echo '<p class="signuperror">Username is already taken!</p>';
                   }
               }
               // Here we create a success message if the new user was created.
               else if (isset($_GET["signup"])) {
                   if ($_GET["signup"] == "success") {
                       echo '<p class="signupsuccess">Signup successful!</p>';
                   }
               }
               ?>
               </h6>
               <hr>
           </div>
        </div>
<div class="row">
  <div class="col-md-3 field-label-responsive">
      <label for="name">Username</label>
  </div>
   <div class="col-md-6">
       <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                <?php
                if (!empty($_GET["uid"])) {
                echo '<input type="text" class="form-control" name="uid" placeholder="Username" value="'.escape($_GET["uid"]).'">';
                }
                else {
                echo '<input type="text" name="uid" placeholder="Username" class="form-control">';
                }
                ?>
            </div>
</div>
</div>
<div class="col-md-3">
    <div class="form-control-feedback">
        <span class="text-danger align-middle">

        </span>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-3 field-label-responsive">
        <label for="email">E-mail</label>
    </div>
<div class="col-md-6">
    <div class="form-group">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
            <?php
            if (!empty($_GET["mail"])) {
            echo '<input type="text" class="form-control" name="mail" placeholder="E-mail" value="'.escape($_GET["mail"]).'">';
            }
            else {
            echo '<input type="text" name="mail" placeholder="E-mail" class="form-control">';
            }
            ?>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="form-control-feedback">
        <span class="text-danger align-middle">

        </span>
    </div>
</div>
</div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
        <span class="text-danger align-middle">

        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Password Confirmation</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-redo"></i></div>
                        <input type="password" class="form-control" name="pwd-repeat" placeholder="Repeat Password">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
        <span class="text-danger align-middle">

        </span>
                </div>
            </div>
        </div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <button type="submit" class="btn btn-success" name="signup-submit"><i class="fa-user-plus"></i>Signup</button>
    </div>
    </div>
    </form>







      <!--
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="uid-repeat" placeholder="Repeat password">
        <button type="submit" name="signup-submit">Signup</button>







    </form>





</div>

-->
<?php include("includes/footer.php");?>

</body>
</html>