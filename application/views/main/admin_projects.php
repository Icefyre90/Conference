


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Place</th>
            <th scope="col">Start-End Date</th>
            <th scope="col">Application Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($myconf as $el) {
            ?>

            <tr id="1<?php echo $el['idconference']; ?>" name="idconference" data-toggle="collapse" href="#<?php echo $el['idconference']; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $el['title']; ?>"  value="<?php echo $el['idconference']; ?>">
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $el['title']; ?></td>
                <td><?php echo $el['place']; ?></td>
                <td><?php
                    $dateb = explode(' ', $el['event_begin']);
                    $daten = explode(' ', $el['event_end']);
                    echo $dateb[0] . " - " . $daten[0];
                    ?></td>
                <td><?php
                    $date = explode(' ', $el['application_begin']);
                    $dateend = explode(' ', $el['application_end']);
                    echo $date[0] . " - " . $dateend[0];
                    ?></td><td></td>
        <input type="hidden" id="<?php echo $i . 'id' ?>" value="<?php echo $el['idconference']; ?>" >
        </tr>
        <tr class="collapse multi-collapse" id="<?php echo $el['idconference']; ?>"><td colspan="6">
                <div >

                    <div class="card card-body">
                        <table id="tableofproj">
                            <div id=<?php echo $i . "res"; ?>></div>
                        </table>
                    </div>
                </div>
            <td></tr>


        <script >
            //        $(document).ready(function () {
            //        $('#1<?php echo $el['idconference']; ?>').click(function () {
            //
            //            var idconference = <?php echo $el['idconference']; ?>;
            //
            //                $.ajax({
            //                    url: "<?php echo base_url() ?>Admin/projectofconf",
            //                    type: "POST",
            //                    data: {'idconference': idconference},
            //                    success: function (data) {
            //                        $('#tableofproj').html(data);
            //                    },
            //                    error: function () {
            //                        alert('Error occur...!!');
            //                    }
            //                });
            //            });
            //
            //    });

            $(document).on('click', '#1<?php echo $el['idconference']; ?>', function() {
                function fetch_data()
                {
                    //          $(document).on('click', '#btn_add', function(){
                    var idconference = document.getElementById("<?php echo $i . 'id' ?>").value;
                    //          var idcong=idconference.trim(" ");
                    //          var idcong=idcong.split(" ");
                    //         alert (idconference);
                    $.ajax({
                        url: "<?php echo base_url() ?>Admin/selectprojectofconf",
                        method: "POST",
                        data: {idconference: idconference},
                        //                dataType:"text",
                        success: function(data) {
                            $('#<?php echo $i . "res"; ?>').html(data);
                        }
                    });
                }
                //      }
                fetch_data();
                $(document).on('click', '#btn_add', function() {
                    var id = document.getElementById("inputGroupSelect04").value;
                    $.ajax({
                        url: "<?php echo base_url() ?>Admin/addprojectformconf",
                        method: "POST",
                        data: {id: id},
                        dataType: "text",
                        success: function(data) {

                            fetch_data();
                        }
                    });
                });
                function edit_data(id, text, column_name)
                {
                    $.ajax({
                        url: "edit.php",
                        method: "POST",
                        data: {id: id, text: text, column_name: column_name},
                        dataType: "text",
                        success: function(data) {
                            alert(data);
                        }
                    });
                }
                $(document).on('blur', '.first_name', function() {
                    var id = $(this).data("id1");
                    var first_name = $(this).text();
                    edit_data(id, first_name, "first_name");
                });
                $(document).on('blur', '.last_name', function() {
                    var id = $(this).data("id2");
                    var last_name = $(this).text();
                    edit_data(id, last_name, "last_name");
                });
                $(document).on('click', '.btn_delete', function() {
                    var id = $(this).data("id3");
                    $.ajax({
                        url: "<?php echo base_url() ?>Admin/deleteprojectformconf",
                        method: "POST",
                        data: {id: id},
                        dataType: "text",
                        success: function(data) {

                            fetch_data();
                        }
                    });

                });
            });
            function myFun1() {
                var x = document.getElementById("inputGroupSelect04");
                document.getElementById("btn_add") = document.getElementById("inputGroupSelect04");
            }
        </script>
        <?php
        $i++;
    }
    ?>
</table>