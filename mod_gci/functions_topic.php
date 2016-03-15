<?php

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
