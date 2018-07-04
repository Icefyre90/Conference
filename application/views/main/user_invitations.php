<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php echo form_open_multipart("User/sendCompetence", array('method' => 'POST',
    'onsubmit' => 'return selectALL()'));
?>
<div class="form-group">
    <label for="exampleFormControlSelect2">Your conference invitations:</label>
    <select class="form-control" id="conferenc" name="conferenc">
        <option value="" hidden="" >Select Conference</option>
        <?php foreach ($confdata as $el): ?>
            <option value="<?php echo $el["idconference"]; ?>"><?php echo $el["title"]; ?></option>
    <?php endforeach; ?>
    </select>
<?php echo form_error("conferenc", "<font color='red'>", "</font>"); ?>
</div>
<!--<div class="form-group">
        <label for="exampleFormControlSelect1">Section</label>
        <select class="form-control" name="field" id="field" disabled="" >
            <option value="" hidden="" >Select Conference to open Section</option>
            
        </select>
<?php // echo form_error("field", "<font color='red'>", "</font>");  ?>
    </div>-->


<div class="form-group">
    <div id="field">
    </div>
</div>

<div class="form-group">
    <button class="btn btn-success">SEND</button>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('#conferenc').on('change', function () {

            var idconference = $(this).val();

            if (idconference == '')
            {
                $('#field').prop('disabled', true);
            } else
            {
                $('#field').prop('disabled', false);
                $.ajax({
                    url: "<?php echo base_url() ?>User/get_field_invitations",
                    type: "POST",
                    data: {'idconference': idconference},
                    success: function (data) {
                        $('#field').html(data);
                    },
                    error: function () {
                        alert('Error occur...!!');
                    }
                });
            }
        });
    });
</script>