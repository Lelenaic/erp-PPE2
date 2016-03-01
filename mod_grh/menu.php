<?php

function formAjouter_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','grh_menu_ajouter');
    $form->addText('nom', array(), 'nom');
    $form->addText('dossier', array(), 'dossier');
    $form->addText('fichier', array(), 'fichier');
    $form->addText('fonction', array(), 'fonction');
    $form->addText('menuParent', array(), 'menuParent');
    $icon=  Connexion::table('select * from icon');
    $list=array();
    foreach ($icon as $i){
        $list[$i['id']]=$i['libelle'];

    }
   $form->addSelect('icon', $list, array(), 'icon');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');
}
//==============================================================
/*function formAjouter_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','kernel_utilisateur_ajouter');
    $form->addText('login', array(), 'Login');
    $form->addPassword('password1', array(), 'Mot de passe');
    $form->addPassword('password2', array(), 'Confirmation du mot de passe');
    $utilisateurtype=  Connexion::table('select * from utilisateurtype order by label');
    $list=array();
    foreach ($utilisateurtype as $ut){
        $list[$ut['id']]=$ut['label'];
    }
    $form->addSelect('utilisateurtype_id', $list, array(), 'Type');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');
}

function loginExiste($login){
    $result=Connexion::queryFirst('select count(*) as nb from utilisateur where login="'.$login.'"');
    return $result['nb']>0;
}
function ajouter_route(){
    if($_POST['password1']==$_POST['password2']){
        $login=$_POST['login'];
        if(loginExiste($login)){
            $_SESSION['messages']='Login existant';
        }else{
            $password=$_POST['password1'];
            $utilisateurtype_id=$_POST['utilisateurtype_id'];
            $query='insert into utilisateur(login,password,utilisateurtype_id) values("'.$login.'","'.$password.'","'.$utilisateurtype_id.'")';
            Connexion::exec($query);
            $_SESSION['messages']='Utilisateur enregistré';
            header('Location:.?route=kernel_utilisateur_liste');
        }
    }else{
        $_SESSION['messages']='Confirmation du mot de passe erroné';
    }
    header('Location:.?route=kernel_utilisateur_formAjouter');
}*/
//=====================================================================================
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
