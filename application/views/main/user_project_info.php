<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="alert alert-dark " >
    <input id="thisconfid" name="prodId" type="hidden" value="<?php echo $idconfeee; ?>">

    <div class="row">
        <div class="col-8" >
            <?php foreach ($projinfo as $el) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-4"> <h3>Title:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["project_name"]; ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Author:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["first_name"] . " " . $el['last_name']; ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Co-authors:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php
                                foreach ($coautor as $co) {
                                    echo $co["first_name"] . " " . $co['last_name'] . " ";
                                    ?> <?php } ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Key words:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["keywords"]; ?></h5></div>
                    </div>
                    <div class="row">
                        <div class="col-4"> <h3>Fields:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["section_pro"]; ?></h5></div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-right mt-3">
                <div class="row">
                    <a class="btn btn-info mr-3"  data-toggle="collapse" href="#aboutneki" role="button" aria-expanded="false" aria-controls="#aboutneki">
                        ABSTRACT
                    </a>
                    <button type="button" class="btn btn-warning"> Download File!!!</button></div>
                <div class="row mt-2"><?php
                    $backgroundcolor = "";
                    $text = "";
                    foreach ($projinfo as $el) {
                        $status = $el["status"];
                        if ($status == 0) {
                            $backgroundcolor = "#97bbf4";
                            $text = "at coordinator";
                        } elseif ($status == 1) {
                            $backgroundcolor = "#c7ffb5";
                            $text = "project in conference";
                        } elseif ($status == 2) {
                            $backgroundcolor = "#fdffba";
                            $text = "at reviewers";
                        } elseif ($status == 3) {
                            $backgroundcolor = "#ffebbc";
                            $text = "finished review";
                        } elseif ($status == 4) {
                            $backgroundcolor = "#d2afff";
                            $text = "need change";
                        } else {
                            $backgroundcolor = "#f70000";
                            $text = "rejected";
                        }
                        ?>
                        <div class="col-12 mt-2 "><h5 style="text-align: left; background-color: <?php echo $backgroundcolor; ?> " >Status: <?php echo $text; ?> </h5></div>

                        <!--Ovde treba ocena i satus-->
                    </div>

                </div></div>
            <div class="row">
                <div class="collapse col-12 mt-2" id="aboutneki">
                    <div class="card card-body">
                        <?php
                        echo $el['apstract'];
                        ?>
                    </div>
                </div></div>
        </div><?php }
                    ?>
    <?php
    $status = "";
    foreach ($projinfo as $el) {
        $status = $el["status"];
        if ($el["status"] == 4) {
            ?><div class="alert alert-dark " >
                <div class="row mt-2">
                    <div class="col-4"><h4>Reviewers</h4></div>
                    <div class="col-1"></div>
                    <div class="col-6"><h5>reviewers comments:</h5>

                    </div>
                </div><?php
                $p = 1;
                foreach ($rewersinf as $rewwt) {
                    ?>
                    <div class="row mt-2">
                        <div class="col-2">
                            <h4>Reviewer <?php echo $p; ?>:</h4>
                        </div>
                        <div class="form-group col-8 ">
                            <label for="etext1"></label>
                            <textarea class="input-group" id="etext1" rows="2" readonly=""><?php
                                if ($rewwt['comment'] == " ") {
                                    echo "No Comment added";
                                } else {
                                    echo $rewwt['comment'];
                                }
                                ?></textarea>
                        </div>
                    </div> <?php
                    $p++;
                }
                ?></div>
            <div class="alert alert-dark " >
                <div class="row mt-2">
                    <div class="col-2"><a class="btn btn-danger" href="<?php echo site_url("User/project"); ?>">BACK </a></div>
                    <div class="col-6"><label for="exampleFormControlFile1">Add changed project file</label>
                        <form  id="changeproject" method="post" action="<?php echo site_url("User/resendproject"); ?>">
                            <div ></div>
                            <input type="text"  name="nameproj" hidden="" value="<?php echo $el["project_name"]; ?>">
                            <input type="text"  name="idproj" hidden="" value="<?php echo $el["idproject"]; ?>">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileUpload">
                        </form></div>
                    <div class="col-2"></div>
                    <div class="col-2">
                        <label >
                            <input  name="prodId" type="submit" class="btn btn-success" value="Send to Reviewers" form="changeproject">
                        </label></div>
                </div></div>
            <?php
        } else {
            ?>
            <?php
        }
    }
    ?>

<?php } ?>