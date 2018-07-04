<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<h2 style="text-align:center">Project for review:</h2>
<div class="form-group">

    <div class="form-group">
        <label for="Autorproject" class="font-weight-bold"></label>
        <div class="border border-warning rounded table-responsive" id="Autorproject">
            <table class="table table-hover">
                <thead>
                    <tr class="text-sm mb-0">
                        <th width="5%">ID</th>
                        <th width="35%">Project Name</th>
                        <th width="30%">Conference</th>
                        <th width="20%">Time to finish</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody><?php
                    $k = 1;
                    $p = 1;
                    foreach ($reviewtask as $val) {
                        ?>
                        <tr class="text-sm mb-0">
                            <th scope="row"><?php echo $val['idproject']; ?></th>
                            <td><?php echo $val["project_name"] ?></td>
                            <td><?php echo $val['title']; ?></td><td  ><input id="k<?php echo $p; ?>" type="text" hidden="" value="<?php
                                echo $val['date_for_review'];
                                ?>"> <p class="mb-0" id="t<?php echo $k; ?>" ></p>
                            </td >
                            <td class=" p-0 pt-1 text-center "><form method="post" action="<?php echo site_url("User/review_project_info"); ?>">
                                    <button name="info" type="submit" value="<?php echo $val["idproject"]; ?> " class="btn btn-xs btn-info align-right " style="max-height: 100%;">Info</button>
                                </form></td>
                        </tr></tbody><script>
                            // Set the date we're counting down to
                            $(document).ready(function() {
                                var countDownDate = new Date(document.getElementById("k<?php echo $p; ?>").value).getTime();
                                // Update the count down every 1 second
                                var x = setInterval(function() {

                                    // Get todays date and time
                                    var now = new Date().getTime();

                                    // Find the distance between now an the count down date
                                    var distance = countDownDate - now;

                                    // Time calculations for days, hours, minutes and seconds
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    // Output the result in an element with id="demo"
                                    document.getElementById("t<?php echo $k; ?>").innerHTML = days + "d " + hours + "h "
                                            + minutes + "m " + seconds + "s ";

                                    // If the count down is over, write some text
                                    if (distance < 0) {
                                        clearInterval(x);
                                        document.getElementById("t<?php echo $k; ?>").innerHTML = "EXPIRED";
                                    }
                                }, 1000);
                            });
                    </script>
                    <?php
                    $k++;
                    $p ++;
                };
                ?>
            </table></div></div></div>
