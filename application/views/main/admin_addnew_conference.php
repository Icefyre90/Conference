<div> <form id="addnewconf" name="createConference" action="<?php echo site_url('Admin/createConference'); ?>" method="POST" >
        <div class="form-group">

            <label for="conferenceName">Conference name: </label>
                <?php echo form_error("title", "<font color='red'>", "</font>");
        if (isset($message)) {
        echo "<font color='red'>$message</font>";
    }?>
            <input type="text" class="form-control" id="conferenceName"  name="title" >
            
        </div>
        <div class="form-group">
            <label for="place">Place:</label>
            <?php echo form_error("place", "<font color='red'>", "</font>");?>
            <input type="text" class="form-control" id="place" name="place">
        </div>
        <div class="form-group">
            <label for="eventBegin">Event begin:</label>
            <?php echo form_error("event_begin", "<font color='red'>", "</font>");?>
            <input type="datetime-local" class="form-control" id="eventBegin" name="event_begin">
        </div>
        <div class="form-group">
            <label for="eventEnd">Event end:</label>
            <?php echo form_error("event_end", "<font color='red'>", "</font>");?>
            <input type="datetime-local" class="form-control" id="eventEnd" name="event_end">
        </div>
        <div class="form-group">
            <label for="aplicationBegin">Application begin:</label>
            <?php echo form_error("application_begin", "<font color='red'>", "</font>");?>
            <input type="datetime-local" class="form-control" id="applicationBegin" name="application_begin">
        </div>
        <div class="form-group">
            <label for="aplicationEnd">Application end:</label>
            <?php echo form_error("application_end", "<font color='red'>", "</font>");?>
            <input type="datetime-local" class="form-control" id="applicationEnd" name="application_end">
        </div>
        <div class="form-group">
            <label for="projectsPerAutor">Projects per autor:</label>
            <?php echo form_error("projects_per_autor", "<font color='red'>", "</font>");?>
            <input type="number" class="form-control" id="projectsPerAutor" name="projects_per_autor">
        </div>
        <div class="form-group">
        <label for="field">Field:</label>
        <?php echo form_error("field", "<font color='red'>", "</font>");?>
        <select class="form-control" id="field" name="field" placeholder='Pick field'>
            <option value="" hidden="" >Select Field</option>
            <?php foreach ($field_data as $el): ?>
            <option value="<?php echo $el["idfield"]; ?>"><?php echo $el["name_field"]; ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        <br>

            <div>
                <!--<label for="files" class="btn btn-info">Select Image</label>-->
                <!--<input id="files" style="visibility:hidden; ili display:none" type="file">-->
                <!--<input id="files"  type="file" name="imageConf" size="20">-->
            </div><br>
        
        <input type="submit" class="btn btn-success" value="Create">
    </form>
</div>
</div>

