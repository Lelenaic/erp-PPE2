
<?php



function test_route(){
   
 $form=new FormBootstrap();
   /* $form->addHidden('route','client_index_ajouter');
    $form->addText('login', array(), 'Login');
    $form->addPassword('password1', array(), 'Mot de passe');
    $form->addPassword('password2', array(), 'Confirmation du mot de passe');
    $utilisateurtype=  Connexion::table('select * from utilisateurtype order by label');
    $list=array();
    foreach ($utilisateurtype as $ut){
        $list[$ut['id']]=$ut['label'];
    }
    $form->addSelect('utilisateurtype_id', $list, array(), 'Type'); */
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
}


function ajouter_route(){
    
};