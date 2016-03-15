<?php

function formAjouter_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','grh_employe_ajouter');
    $form->addText('nom', array(), 'Nom');
    $form->addText('prenom', array(), 'Prénom');
    $form->addDate('dateNaissance', array(), 'Date de naissance');
    $poste= Connexion::table('select * from poste');
    $list=array();
    foreach ($poste as $p){
        $list[$p['id']]=$p['libelle'];

    }
    $form->addSelect('poste', $list, array(), 'poste');
    $form->addText('numero', array(), 'Numéro de télephone');
    $form->addText('mail', array(), 'E-mail');
    $form->addText('ville', array(), 'Ville');
    $form->addText('codePostal', array(), 'Code postal');
    $form->addText('adresse', array(), 'Adresse');
    $form->addText('securiteSociale', array(), 'Sécurité sociale');
    $entreprise= Connexion::table('select * from organisation');
    $list=array();
    foreach ($entreprise as $e){
        $list[$e['id']]=$e['libelle'];

    }
    $form->addSelect('organisation', $list, array(), 'organisation');
    $list=array();
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');
}

function formModifier_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','grh_employe_modifier');
    $form->addText('nom', array(), 'Nom');
    $form->addText('prenom', array(), 'Prénom');
    $form->addDate('dateNaissance', array(), 'Date de naissance');
    $poste= Connexion::table('select * from poste');
    $list=array();
    foreach ($poste as $p){
        $list[$p['id']]=$p['libelle'];

    }
    $form->addSelect('poste', $list, array(), 'poste');
    $form->addText('numero', array(), 'Numéro de télephone');
    $form->addText('mail', array(), 'E-mail');
    $form->addText('ville', array(), 'Ville');
    $form->addText('codePostal', array(), 'Code postal');
    $form->addText('adresse', array(), 'Adresse');
    $form->addText('securiteSociale', array(), 'Sécurité sociale');
    $entreprise= Connexion::table('select * from organisation');
    $list=array();
    foreach ($entreprise as $e){
        $list[$e['id']]=$e['libelle'];

    }
    $form->addSelect('organisation', $list, array(), 'organisation');
    $list=array();
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');
}

//ajouter_route
function ajouter_route(){
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $dateNaissance=$_POST['dateNaissance'];
            $dateNaissance=explode('/',$dateNaissance);
            $newDateNaissance=$dateNaissance[2].'-'.$dateNaissance[1].'-'.$dateNaissance[0];
            $poste=$_POST['poste'];
            $numero=$_POST['numero'];
            $mail=$_POST['mail'];
            $ville=$_POST['ville'];
            $codePostal=$_POST['codePostal'];
            $adresse=$_POST['adresse'];
            $securiteSociale=$_POST['securiteSociale'];
            $organisation=$_POST['organisation'];
            $query='insert into employe(nom,prenom,dateNaissance,poste_id,numero,mail,ville,codePostal,adresse,securiteSociale,entreprise_id)
            values("'.$nom.'","'.$prenom.'","'.$newDateNaissance.'","'.$poste.'","'.$numero.'","'.$mail.'","'.$ville.'","'.$codePostal.'","'.$adresse.'","'.$securiteSociale.'","'.$organisation.'")';
            Connexion::exec($query);
            var_dump($query);
            header('Location:.?route=grh_employe_liste');
        }

//ajouter_route
function modifier_route(){
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $dateNaissance=$_POST['dateNaissance'];
            $dateNaissance=explode('/',$dateNaissance);
            $newDateNaissance=$dateNaissance[2].'-'.$dateNaissance[1].'-'.$dateNaissance[0];
            $poste=$_POST['poste'];
            $numero=$_POST['numero'];
            $mail=$_POST['mail'];
            $ville=$_POST['ville'];
            $codePostal=$_POST['codePostal'];
            $adresse=$_POST['adresse'];
            $securiteSociale=$_POST['securiteSociale'];
            $organisation=$_POST['organisation'];
            $query='insert into employe(nom,prenom,dateNaissance,poste_id,numero,mail,ville,codePostal,adresse,securiteSociale,entreprise_id)
            values("'.$nom.'","'.$prenom.'","'.$newDateNaissance.'","'.$poste.'","'.$numero.'","'.$mail.'","'.$ville.'","'.$codePostal.'","'.$adresse.'","'.$securiteSociale.'","'.$organisation.'")';
            Connexion::exec($query);
            var_dump($query);
            header('Location:.?route=grh_employe_liste');
        }

//liste_route
function liste_route(){
    $employe=Connexion::table('select * from employe order by id');
    $poste=Connexion::table('select * from poste');
    $entreprise=Connexion::table('select * from organisation');
    include(ROOT.'AdminLTE/grh/employe/liste.php');
}

