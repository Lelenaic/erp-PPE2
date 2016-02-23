<?php

function authentification_route() {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = 'select * from utilisateur where login = "' . $login . '"';
    $utilisateur = Connexion::queryFirst($query);
    if ($utilisateur['password'] == $password) {
        unset($utilisateur['password']);    //on supprime la case password pour ajouter utilisateur en session
        $_SESSION['utilisateur'] = $utilisateur;        
    } else {
        $_SESSION['messages'] = 'Erreur d\'identification';        
    }
    header('Location:.');
}
function index_route(){
    include(ROOT.'AdminLTE/index.php');
}

function logout_route() {
    session_destroy();
    header('Location:.');
}

function formProfile_route() {
    $utilisateur = $_SESSION['utilisateur'];
    $form = new FormBootstrap();
    $form->addHidden('route', 'updateProfile'); //$form->route='updateProfile';
    $form->addText('login', array('value' => $utilisateur['login']), 'Login');
    $form->addPassword('oldPassword', array(), 'Mot de passe actuel');
    $form->addPassword('newPassword1', array(), 'Nouveau mot de passe');
    $form->addPassword('newPassword2', array(), 'Confirmation du nouveau mot de passe');
    include(ROOT . 'AdminLTE/form.php');
}

function updateProfile_route() {
    //@TODO
}

function modifierPassword_route() {
    $utilisateur = $_SESSION['utilisateur'];
    //creer un formulaire de modification
    include(ROOT . 'AdminLTE/form.php');
    modifierPassword($utilisateur, $newPassword);
}

function modifierPassword($utilisateur, $newPassword) {
    Connexion::exec('update utilisateur set password="' . $newPassword . '" where login="' . $utilisateur['login'] . '"');
}

function menuUtilisateur($menuParent_id = null) {
    $utilisateur = $_SESSION['utilisateur'];
    $query = 'select * '
            . 'from menu m, utilisateurtype_menu um '
            . 'where um.utilisateurtype_id=' . $utilisateur['utilisateurtype_id']
            . ' and m.id=um.menu_id';
    if (is_null($menuParent_id)) {
        $query.= ' and m.menuparent_id is null';
    } else {
        $query.= ' and m.menuparent_id=' . $menuParent_id;
    }
    $query.=' order by um.ordre';
    
    $menus = Connexion::table($query);

    $html = '';
    foreach ($menus as $menu) {
        if($menu['route']==''){
            $url='#';
        }else{
            $url='.?route='.$menu['route'];
        }
        $enfants=  menuUtilisateur($menu['id']);
        if($enfants!=''){
            $class=' class="treeview"';
        }else{
            $class='';
        }
        $html.='<li'.$class.'>
                <a href="'.$url.'">
                <i class="fa '.$menu['icon'].'"></i> <span>'.$menu['label'].'</span>
                </a>';
        if($enfants!=''){
            $html.='<ul class="treeview-menu">'.$enfants.'</ul>';                    
        }
        $html.='</li>';
        
    }
    return $html;
}

function formAjouter_route(){
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
}
function liste_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'AdminLTE/kernel/utilisateur/liste.php');
}