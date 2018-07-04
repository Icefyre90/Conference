
<form class="col-4 mb-4" name = "changePW" action = "<?php echo site_url('ControllerChangePassword/changePW') ?>" method = "post">
    <?php

    ?>
    Old password:<input class="form-control" type="password" name="opassword"/>
    <?php echo form_error("opassword", "<font color='red'>", "</font>");
        if (isset($message)) {
        echo "<font color='red'>$message</font>";
    }?><br>
    New password:<input class="form-control" type="password" name="npassword"/>
    <?php echo form_error("npassword", "<font color='red'>", "</font>"); ?><br>
    Re-enter password:<input class="form-control" type="password" name="cpassword"/>
    <?php echo form_error("cpassword", "<font color='red'>", "</font>"); ?><br>
    <input type="submit" class="btn btn-primary" value="Save changes">
    <?php
    echo form_close();
    ?>
</form>
