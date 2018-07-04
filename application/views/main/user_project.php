<h3 style="text-align:center">Projects</h3>
<div class="form-group">

    <div class="form-group">
        <label for="Autorproject" class="font-weight-bold">Autor-project:</label>
        <div class="border border-primary rounded table-responsive" id="Autorproject">
            <table class="table table-hover">
                <thead>
                    <tr class="text-sm ">
                        <th width="5%">ID</th>
                        <th width="35%">Project Name</th>
                        <th width="30%">Conference</th>
                        <th width="20%">Status</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody><?php foreach ($project_data as $val) { ?>
                    <tr class="text-sm">
                        <th scope="row"><?php echo $val['idproject']; ?></th>
                        <td><?php echo $val["project_name"] ?></td><?php
                            $status = "";
                            $color = "";
                            if ($val["status"] == 0) {
                                $status = "At Coordinator";
                                $color = "#0681d8";
                            } elseif ($val["status"] == 1) {
                                $status = "Accepted";
                                $color = "#09af01";
                            } elseif ($val["status"] == 2) {
                                $status = "At rewier";
                                $color = "#ffe102";
                            } elseif ($val["status"] == 3) {
                                $status = "At rewier";
                                $color = "#ffe102";
                            } elseif ($val["status"] == 4) {
                                $status = "Need correction";
                                $color = "#e000dc";
                            } else {
                                $status = "Rejected";
                                $color = "#f70202";
                            }
                            ?>
                            <td><?php echo $val['title']; ?></td><td class="font-weight-bold" style="color: <?php echo $color; ?>"> <?php echo $status; ?>
                            </td >
                            <td class=" p-0 pt-1 text-center "><form method="post" action="<?php echo site_url("User/project_info"); ?>">
                                    <button name="info" type="submit" value="<?php echo $val["idproject"]; ?> " class="btn btn-xs btn-info align-right " style="max-height: 100%;">Info</button>
                                </form></td>
                        </tr><?php } ?>
                </tbody>
            </table></div><br/><br/><label for="Co-autorproject" class="font-weight-bold">Coautor-project:</label>
        <div class="border border-primary table-responsive" id="Co-autorproject">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="35%">Project Name</th>
                        <th width="30%">Conference</th>
                        <th width="20%">Status</th>
                        <th width="10%"></th>
                    </tr>
                </thead>
                <tbody><?php
                    foreach ($Coproject_data as $val) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $val['idproject']; ?></th>
                            <td><?php echo $val["project_name"] ?></td>
                            <td><?php echo $val['title']; ?></td>
                            <td class="font-weight-bold" style="color: <?php echo $color; ?>"> <?php echo $status; ?>
                            </td >
                            <td class=" p-0 pt-1 text-center "><form method="post" action="<?php echo site_url("User/project_info"); ?>">
                                    <button name="info" type="submit" value="<?php echo $val["idproject"]; ?> " class="btn btn-xs btn-info align-right " style="max-height: 100%;">Info</button>
                                </form></td>
                        </tr><?php } ?>
                </tbody>
            </table></div>

    </div><br>



