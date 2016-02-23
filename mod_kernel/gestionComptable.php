<?php

function formDevis_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','kernel_gestionComptable_formDevis');
    $form->addText('nomSociete', array(), 'Nom de la société');
    $form->addText('client', array(), 'Nom du client');
    $form->addText('date', array(), 'Date');
    $form->addText('produit', array(), 'Nom du produit');
    $form->addText('quantite', array(), 'Quantité');
    $form->addText('prix', array(), 'Prix');
    $utilisateurtype=  Connexion::table('select * from utilisateurtype order by label');
    $list=array();
    foreach ($utilisateurtype as $ut){
        $list[$ut['id']]=$ut['label'];
    }
    $form->addSelect('utilisateurtype_id', $list, array(), 'Type');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
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
function listeFacture_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'AdminLTE/kernel/gestionComptable/listeFacture.php');
}
function listeArchive_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'AdminLTE/kernel/gestionComptable/listeArchive.php');
}
