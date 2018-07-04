



<div id="main" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" id="carosel">
            <img class="d-block h-50 w-100" src="http://79.170.44.155/crabtreehall.com/wp-content/uploads/2011/06/meetings.jpg" alt="First slide">
            <div class="carousel-caption">
                <h3><a href="<?php echo site_url("$controller/dataconf/1"); ?>">More details</a></h3>

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block h-50 w-100" src="https://static1.squarespace.com/static/58ac46ff3e00be18102ed673/t/58ac49c6725e255f93381140/1487686128697/?format=500w" alt="Second slide">
            <div class="carousel-caption">
                <h3><a href="<?php echo site_url("$controller/dataconf/1"); ?>">More details</a></h3>

            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block h-50 w-100" src="http://www.fnetravel.com/english/thailandmoredestination/novotelchumphonbeachresortandgolf/novotel-chumphon-beach-resort-and-golf-Samui-meeting-room.jpg" alt="Third slide">
            <div class="carousel-caption">
                <h3> <a href="<?php echo site_url("$controller/dataconf/1"); ?>">More details</a></h3>

            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><br>


<div class="card-deck">

   
             <div class="card-deck">

            <?php
            if ($confdata === NULL) {
                echo "Nema upisanih konferencija u bazi";
            } else {
                foreach ($confdata as $el) {
                    ?>
            <div class="col-sm-3 mb-4" >
                    <div class="card">
                        <img class="card-img-top" src="https://i.pinimg.com/originals/4b/3f/9a/4b3f9ad60ef749b1533623220230727b.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $el['title']; ?></h5>
                            <p class="card-text"><?php echo $el['place']; ?></p>
                            <p class="card-text">Event begin: <?php echo $el['event_begin']; ?><br/>Event end: <?php echo $el['event_end']; ?></p>
                            <button type="button" class="btn btn-info">Info</button>
                        </div>
                    </div>
                </div>
                    <?php
                }
            }
            ?>

        </div>
            

</div><br/> <div class="d-flex justify-content-center" ><?php echo $links; ?></div>

