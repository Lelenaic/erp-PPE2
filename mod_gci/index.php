<?php

function forum_route() {
    include(ROOT.'AdminLTE/forum.php');
}

function messages_route(){
    include(ROOT.'mod_gci/messages.php');
}

function messages(){
    $topic=Connexion::table('SELECT * FROM message WHERE sujet_id=1');
    $titre=Connexion::table('SELECT * FROM topic WHERE id=1');
    echo '<h2>'.$titre[0]['titre'].'</h2>';
    ?>
    <ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">
            10 Feb. 2014
        </span>
    </li>
    <!-- /.timeline-label -->
    <?php 
    $taille=sizeof($topic);
    for ($i=0;$i<$taille;$i++)
    {
        
        
    
    
    ?>
    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="fa fa-user bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

            <h3 class="timeline-header"><a href="#">
                <?php 
                $utilisateur=Connexion::table('SELECT login FROM utilisateur WHERE id='.$topic[$i]['utilisateur_id']); 
                echo $utilisateur[0]['login'];
                ?>
                </a> </h3>

            <div class="timeline-body">
                <?php echo $topic[$i]['contenu'] ?>
            </div>

            
        </div>
    </li>
    <!-- END timeline item -->
    <?php
    }
    ?>
    

    </ul>


    
    
    
    <?php
}



function forum2_route(){
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

function topic_route(){
   include(ROOT.'mod_gci/topic.php');
}

    
function topic(){
    
    $tableauTopic=Connexion::table('select * from topic order by forum_id');
    $n='';
    $nbLignes=sizeof($tableauTopic);
    $nbColonnes=sizeof($tableauTopic [0]);

    
    echo '<table class="table table-hover datatable" style="font-size : 1em;">
        <thead>
            <tr>
                <th>id</th>
                <th>id forum</th>
                <th>id utilisateur</th>
                <th>titre</th>
                <th>nombre de Visites</th>
            </tr>
        </thead>';
        
    
    for ($i=0;$i<$nbLignes;$i++)
    
    {
        echo '<tr>';
        
            for($j=0;$j<$nbColonnes;$j++)
            {
                
            if($j==0){
                $n='id';
            }
            
            if($j==1){
                $n='forum_id';
            }
            
            if($j==2){
                $n='utilisateur_id';
            }
            
            if($j==3){
                $n='titre';
            }
            
            if($j==4){
                $n='nbVisite';
            }
                    
                    
                echo '<td>',$tableauTopic[$i][$n],'</td>';
            }
        
       echo '</tr>';
    }

    echo '</table>';
}
