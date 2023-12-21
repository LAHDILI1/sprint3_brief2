
<?php

include '../layouts/header.php';

session_start();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login Form
                </div>
                <div class="card-body">
                    <form id="loginForm" method="POST" action="../../App/Controllers/auth/login.php">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?php if(isset($_SESSION["Username"])) echo $_SESSION["Username"];?>" class="form-control" id="email" name="email" required>
                            <div style="display:block;" class="invalid-feedback" ><?php if(!empty($_SESSION["Username_error"])) echo $_SESSION["Username_error"];?></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required value="<?php if(isset($_SESSION["passwords"])) echo $_SESSION["passwords"];?>" >
                            <div style="display:block;" class="invalid-feedback">
                                 <?php if(!empty($_SESSION["passwords_error"])) echo $_SESSION["passwords_error"];?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </form>
                    <?php
           // remove all session variables
            session_unset();

           // destroy the session
           session_destroy();
            ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '../layouts/footer.php';

?>