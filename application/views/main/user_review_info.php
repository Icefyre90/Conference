<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="alert alert-dark " >

    <div class="row">
        <div class="col-8" >
            <?php foreach ($projinfo as $el) { ?>
                <div class="container">
                    <div class="row">
                        <div class="col-4"> <h3>Title:</h3></div><div class="col-8" style="margin-top: 8px;">  <h5><?php echo $el["project_name"]; ?></h5></div>
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
    <div class="alert alert-dark " >
        <div class="row mt-2">
            <div class="col-2"><h4>Reviewer</h4></div>
            <div class="col-7"><h5>Comment:</h5>
            </div><div class="col-3"><h5>Evaluation:</h5></div>
        </div>
        <div class="row mt-2">
            <div class="col-2">
                <h4></h4>
            </div> <form  id="changeproject" method="post" action="<?php echo site_url("User/reviewfinish"); ?>">
                <div ></div>
                <input type="text"  name="nameproj" hidden="" value="<?php echo $el["project_name"]; ?>">
                <input type="text"  name="idproj" hidden="" value="<?php echo $el["idproject"]; ?>">
            </form>
            <div class="form-group col-7 ">
                <textarea class="input-group" name="commentsrev" id="etext1" rows="4" placeholder="Comment:" form="changeproject"></textarea>
            </div>
            <div class="form-group col-3 ">
                <input type="number" name="markofproj" style="width: 50%;" form="changeproject" >
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-2"><a class="btn btn-danger" href="<?php echo site_url("User/review"); ?>">BACK </a></div>
            <div class="col-6">
            </div>
            <div class="col-1"></div>
            <div class="col-3 text-right ">
                <label >
                    <input  name="prodId" type="submit" class="btn btn-success" value="Send to Coordinator" form="changeproject">
                </label></div>
        </div></div>

<?php } ?>
