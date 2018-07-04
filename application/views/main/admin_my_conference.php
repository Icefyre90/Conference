<h3 style="text-align:center; color: darkgreen">My conferences</h3>
<br>
<div class="row">




    <div class="col-12">
        <div class="card-deck">
            <?php
            foreach ($confdatapag as $conf) {
                ?>
                <div class="col-4">
                    <div class="card">
                        <img src="http://placehold.it/560x560" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $conf['title']; ?></h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <button class="btn btn-primary" type="button">Button</button>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>
</div>
<br/> <div id="de" class="row justify-content-center">
    <div><?php echo $links; ?></div></div><br><br><br><br>

