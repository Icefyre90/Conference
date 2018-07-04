

</div>
</div>

<div id="fut" class="row" style="witdh: 80%;">

    <!--First column-->
    <div class="col-md-3 col-lg-4 col-xl-3 ml-4 mb-4">
        <h6 id="fl" class="text-uppercase font-weight-semibold">
            <strong>MY GROUP 6</strong>
        </h6>
        <hr class="deep-purple accent-2 mb-4 mt-0  mx-auto">
        <p>We are experienced organizers of conferences, exhibitions and workshops. Our conferences offer world class content, great delegate experience and exceptional networking opportunities.</p>
    </div>
    <!--/.First column-->

    <!--Second column-->
    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 ">
        <h6 id="fl" class="text-uppercase font-weight-semibold">
            <strong>Useful links</strong>
        </h6>
        <hr class="deep-purple accent-2 mb-4 mt-0  mx-auto">
        <p>
            <a href="<?php echo base_url("$this->controller/index"); ?> " id="futtext">Home</a>
        </p>
        <p>
            <a href="<?php echo base_url("$this->controller/conferences"); ?>"id="futtext">Conferences</a>
        </p>
        <p><?php if ($this->controller != 'guest') {
   ?><a href="<?php echo site_url("$this->controller/logout"); ?>"id="futtext">Logout</a>
            <?php } else {
                ?>
                <a data-toggle="modal" data-target="#LoginModal" href=""id="futtext">Login</a>
            <?php } ?>
        </p>

    </div>
    <!--/.Second column-->

    <!--Third column-->
    <div class="col-md-2 col-lg-2 col-xl-2 mr-4">
        <h6 id="fl" class="text-uppercase font-weight-semibold">
            <strong>Contact</strong>
        </h6>
        <hr class="deep-purple accent-2 mb-4 mt-0  mx-auto">
        <p>
            <i class="fa fa-home mr-3"><i class="glyphicon glyphicon-map-marker" style="color:green" ></i></i> Belgrade, Serbia 2018</p>
        <p>
            <i class="fa fa-envelope mr-3"><i class="glyphicon glyphicon-envelope"></i></i><a href="https://www.etf.bg.ac.rs/" id="futtext">www.etf.bg.ac.rs</a></p>
        <p>
            <i class="fa fa-phone mr-3"><i class="glyphicon glyphicon-phone"></i></i> + 01 234 567 88</p>
        <p>
            <i class="fa fa-print mr-3"><i class="glyphicon glyphicon-phone"></i></i> + 01 234 567 89</p>
    </div>
    <!--/.Third column-->

    <!--Fourth column-->

    <!--/.Fourth column-->

</div>







<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/popper.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

</body>
</html>