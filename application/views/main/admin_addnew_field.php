<div>   
    <form action="<?php echo site_url('Admin/createField'); ?>" name="createField" method="POST">

        <div class="form-group">
            <label for="nameField">Field name: </label>
            <?php
            echo form_error("fieldName", "<font color='red'>", "</font>");
            if (isset($message)) {
                echo "<font color='red'>$message</font>";
            }
            ?>
            <input type="text" class="form-control col-6" id="nameField"  name="fieldName">

        </div>



        <input type="submit" class="btn btn-success" value="Create">
    </form>
</div>
<br>
<div>
    Current Fields:<div>
        <?php 
        $i= 1;
        foreach ($field_data as $el): ?>
            <?php 
            echo $i.". ";
            echo $el["name_field"];
            $i++; ?><br>
        <?php endforeach;
        ?>
    </div><br>
</div>