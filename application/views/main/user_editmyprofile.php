<h3 style="text-align:center">Edit profile</h3>
<h4>Hello: <?php
    foreach ($mydata as $userdata) {
        echo $userdata['username'];
        ?> </h4><br>
        <div class="media">
    <div>
            <?php if (!file_exists("image/profile/profile_" . $userdata['iduser'] . ".jpg")) { ?>
        <img class="mr-3" style=" border: 3px solid black; border-radius:125px 125px 125px 125px;" src="<?php echo base_url("image/profile/profile_0.jpg"); ?>" alt="Generic placeholder image"/>
            <?php } else {
                ?>
                <img class="mr-3" style=" border: 3px solid black; border-radius:125px 125px 125px 125px;" src="<?php echo base_url("image/profile/profile_" . $userdata['iduser'] . ".jpg"); ?>" width="256" height="256" alt="Generic placeholder image"/>
            <?php } ?>

            <?php
            echo form_open_multipart("$controller/addingImage", "method=post");
            ?>
            <input type="file" name="image" size="20"/><br>
            <?php
            echo form_submit("addimage", "Add image");
            echo form_close();
            ?></div>

    <div class="media-body">
        <form name = "editprofile" action = "<?php echo site_url($controller.'/editMyProfile') ?>" method = "post">




                <?php echo form_error("password", "<font color='red'>", "</font>"); ?>
                                                                                                                    <!--Confirm your Password:<input class="form-control" type="password" name="password"/>-->
                <?php // echo form_error("password", "<font color='red'>", "</font>");    ?>
                First name: <?php echo form_error("first_name", "<font color='red'>", "</font>"); ?>
                <input class="form-control" type="text" name="first_name" value="<?php echo $userdata['first_name'] ?>"/> 
                Last name: <?php echo form_error("last_name", "<font color='red'>", "</font>"); ?>
                <input class="form-control" type="text" name="last_name" value="<?php echo $userdata['last_name'] ?>"/> 
                Phone number: <?php echo form_error("phone_number", "<font color='red'>", "</font>"); ?>
                <input class="form-control" type="text" name="phone_number" value="<?php echo $userdata['phone_number'] ?>"/> 
                Email: <?php echo form_error("email", "<font color='red'>", "</font>"); ?>
                <input class="form-control" type="text" name="email" value="<?php echo $userdata['email'] ?>"/>
                Organisation: <?php echo form_error("organisation", "<font color='red'>", "</font>"); ?>
                <input class="form-control" type="text" name="organisation" value="<?php echo $userdata['organisation'] ?>"/> 
                Date of birth: <?php echo form_error("date_of_birth", "<font color='red'>", "</font>"); ?>
                <input class="form-control" type="date" name="date_of_birth" value="<?php echo $userdata['date_of_birth'] ?>"/>
                
            <?php } ?>
                <br>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="submitMyEditProfile" data-toggle="modal" data-target="#sucesschange" data-target="#sucess" value="Submit"/>


            </div></form>

        <div class="modal" id="sucesschange">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <iframe width="500" height="500" src="https://lottiefiles.com/iframe/782-check-mark-success" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div></div>

