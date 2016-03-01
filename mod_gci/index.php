<?php

function forum_route() {
    include(ROOT.'AdminLTE/forum.php');
}
function timeline(){
    ?>
    <ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            10 Feb. 2014
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

            <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

            <div class="timeline-body">
                ...
                Content goes here
            </div>

            <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">...</a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->

    ...

</ul>
    



    <?php
    echo 'tamer';
}

function forum_route(){
    include(ROOT . 'mod_gci/forum.php');
}

function forum(){
    //$nomEntreprise=$_SESSION['nomEntreprise'];
    $nomEntreprise='Sodebo';
    $requete ;
    echo '<div class="box box-solid box-default">
            <div class="box-header">
                <h3 class="box-title">Forum</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                Catégorie 1
            </div><!-- /.box-body -->
            <div class="box-body">
                Catégorie 2
            </div><!-- /.box-body -->
            <div class="box-body">
                Catégorie 3
            </div><!-- /.box-body -->
            <div class="box-body">
                Catégorie 4
            </div><!-- /.box-body -->
        </div>';
}