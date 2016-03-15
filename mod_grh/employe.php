<?php

function formAjouter_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','grh_employe_ajouter');
    $form->addText('nom', array(), 'nom');
    $form->addText('prenom', array(), 'prenom');
    $list=array();
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');
}


//ajouter_route
function ajouter_route(){
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $query='insert into testEmploye(nom,prenom) values("'.$nom.'","'.$prenom.'")';
            Connexion::exec($query);
            header('Location:.?route=grh_employe_liste');
        }

//liste_route
function liste_route(){
    $employe=Connexion::table('select * from testEmploye order by id');
    include(ROOT.'AdminLTE/grh/employe/liste.php');
}

