
<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form name = "registration_form" action = "<?php echo site_url('Guest/registerUser') ?>" method = "post">
                        <?php
                        if (isset($message))
                            echo "<font color='red'>$message</font><br>";
                        ?>
                        Username: <?php echo form_error("username", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="text" name="username"  value="<?php echo set_value('username') ?>"/>
                        Password: <?php echo form_error("password", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="password" name="password"/>   
                    <!--Confirm your Password:<input class="form-control" type="password" name="password"/>-->
                        <?php // echo form_error("password", "<font color='red'>", "</font>");  ?>
                        First name:<?php echo form_error("first_name", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name') ?>"/>
                        Last name: <?php echo form_error("last_name", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name') ?>"/>
                        Phone number: <?php echo form_error("phone_number", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="text" name="phone_number" value="<?php echo set_value('phone_number') ?>"/>
                        Email: <?php echo form_error("email", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="text" name="email" value="<?php echo set_value('email') ?>"/>
                        Organisation: <?php echo form_error("organisation", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="text" name="organisation" value="<?php echo set_value('organisation') ?>"/> 
                        Date of birth: <?php echo form_error("date_of_birth", "<font color='red'>", "</font>"); ?>
                        <input class="form-control" type="date" name="date_of_birth" value="<?php echo set_value('date_of_birth') ?>"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-secondary" value="Register"/>
                </div></form>
                    <center><b><p>Already registered?</p>
          <a class="nav-link" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal" href="">Login here</a></b></center>
            </div>
        </div>
    </div>
</form>
</div>