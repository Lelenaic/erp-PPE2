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

//menuUtilisateur
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