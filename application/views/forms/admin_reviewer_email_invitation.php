<div class="row">
    <form id="arewminv" name="reviewerEmailInvitation"  action="<?php echo site_url('Admin/sendEmail'); ?>" method="POST">
    <!-- Ako hocemo da koristimo email koji smo pri registraciji stavili onda ovo polje ne treba unositi -->
    <label for="yourEmail">Your Email:</label> <br>
    <input type="email" class="form-control col-6" id="yourEmail" name="senderEmail" value="<?php echo set_value('senderEmail'); ?>"><br> 
    
    <label for="emailPassword">Email password:</label> <br>
    <input type="password" class="form-control col-6" id="emailPassword" name="passwordEmail"><br>
    
    <label for="sendToEmail">Send to email:</label> <br>
    <input type="email" class="form-control col-6" id="sendToEmail" name="recipientEmail"><br>
    
    <label for="subject">Subject:</label> <br>
    <input type="text" class="form-control col-6" id="subject" name="subject" value="<?php echo set_value('subject'); ?>"><br>
    
<!--    <label for="username_reviewer">Username for reviewer:</label> <br>
    <input type="text" class="form-control col-6" id="username_reviewer" name="username_reviewer" value="<?php // echo set_value('username_reviewer'); ?>"><br>
    
    <label for="password_reviewer">Password for reviewer:</label> <br>
    <input type="text" class="form-control col-6" id="password_reviewer" name="password_reviewer" value="<?php // echo set_value('password_reviewer'); ?>"><br>
    -->
    <label for="messageEmail">Message:</label> <br>
    <textarea name="messageEmail" class="form-control col-8" id="messageEmail" rows="10" cols="80" value="<?php echo set_value('messageEmail'); ?>"></textarea><br>
    
    <input type="submit" class="btn btn-success" value="Send">
        <?php echo "<font color='blue'>".$successSentEmail."</font>"; ?>
</form>
</div>
