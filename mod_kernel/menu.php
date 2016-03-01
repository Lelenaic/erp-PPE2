<?php
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





