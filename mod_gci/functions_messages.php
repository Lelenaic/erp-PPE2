<?php
function messages(){
    $topic=Connexion::table('SELECT id,sujet_id,utilisateur_id,contenu,DATE(dateCreation),TIME(dateCreation) FROM message WHERE sujet_id=1');
    $titre=Connexion::table('SELECT * FROM topic WHERE id=1');
    echo '<h2>'.$titre[0]['titre'].'</h2>';
    echo '
    <ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-red">';
    
            echo $topic[0]['DATE(dateCreation)'];
            echo '
        </span>
    </li>
    <!-- /.timeline-label -->';
    
    $taille=sizeof($topic);
    for ($i=0;$i<$taille;$i++)
    {
    
    
    echo '
    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
        <i class="fa fa-user bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i>';
            echo $topic[0]['TIME(dateCreation)'];
            echo '</span>
            <h3 class="timeline-header"><a href="#">';
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
