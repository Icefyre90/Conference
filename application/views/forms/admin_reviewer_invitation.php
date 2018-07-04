<h3 style="text-align:center">Reviewer invitation</h3>

<div  style="margin: auto;  width: 50%">
    <form name = "reviewerInvitation" centered action = "<?php echo site_url('Admin/sendInv') ?>" method = "post" >    
    <div class="form-group">
        <label for="usernames">Users</label>
        <select class="form-control" id="usernames" name="usernames">
            <option value="" hidden="">Select Users</option>
            <?php foreach ($users as $username): ?>
                <option value="<?php echo $username['iduser']; ?>"><?php echo $username['username']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="form-group" centered>
        <div class="row"> 
            <div class="col-sm-12" ><label for="conferenc">Conferences</label>
        <select class="form-control" id="conferenc" name="conferenc">
            <option value="" hidden="" >Select Conference</option>
            <?php foreach ($confdata as $el): ?>
                <option value="<?php echo $el["idconference"]; ?>"><?php echo $el["title"]; ?></option>
            <?php endforeach; ?>
            
        </select>
            </div>
      
          
    </div>
    </div>
    
<!--    <div class="form-group">
  <label for="comment">Message:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>

</div>
    <button type="button" class="btn btn-success">Send</button>
</form>

</div>

</div>-->
    <input type="submit" class="btn btn-success" value="Send" >
</form>
</div>
