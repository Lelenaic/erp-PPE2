<?php

class Table {
    
    //Attributs
    private $_table;
    private $_headTable;
    private $_longTable;
    private $_largTable;
    private $_longTableHead;
    private $_nomColonne;
    private $_id;
    private $_class;
    private $_html;   //Code html à afficher
    
    
    //Constructeurs
    public function __construct($newTable=[],$newHeadTable=[],$newId='',$newClass='',$newNomColonne=[]){
        $this->_table=$newTable;
        $this->_headTable=$newHeadTable;
        $this->_longTable=sizeof($this->_table);
        $this->_largTable=sizeof($this->_table[0]);
        $this->_longTableHead=sizeof($this->_headTable);
        $this->_id=$newId;
        $this->_class=$newClass;
        $this->_nomColonne=$newNomColonne;
        $this->_html='';
    }
    
    
    //Getteurs
    public function getTable(){
        return $this->_table;
    }
    
    public function getHeadTable(){
        return $this->_headTable;
    }
    
    public function getId(){
        return $this->_id;
    }
    
    public function getClass(){
        return $this->_class;
    }
    
    public function getNomColonne(){
        return $this->_nomColonne;
    }
    
    
    //Setteurs
    public function setTable($newTable){
        $this->_table=$newTable;
    }
    
    public function setHeadTable($newHeadTable){
        $this->_headTable=$newHeadTable;
    }
    
    public function setId($newId){
        $this->_id=$newId;
    }
    
    public function setClass($newClass){
        $this->_class=$newClass;
    }
    
    public function setNomColonne($newNomColonne){
        $this->_nomColonne=$newNomColonne;
    }
    
    
    //Méthodes de travail
    public function creaTable(){
        $this->_html='<table id="'.$this->getId().'" class="'.$this->getClass().'">';
        $this->_html.='<thead>';
        $this->_html.='<tr>';
            
        for($i=0;$i<$this->_longTableHead;$i++){
            $this->_html.='<th>'.$this->_headTable[$i].'</th>';
        }
            
        $this->_html.='</tr>';
        $this->_html.='</thead>';
        $this->_html.='<tbody>';
        
        for($i=0;$i<$this->_longTable;$i++){
            $this->_html.='<tr>';
            for($j=0;$j<$this->_largTable;$j++){
                $this->_html.='<td>'.$this->_table[$i][$this->_nomColonne[$j]].'</td>';
            }
            
            $this->_html.='</tr>';
        }
        
        $this->_html.='</tbody>';
        $this->_html.='</table>';
    }
    
    public function creaTableModif(){
        $this->_html='<table id="'.$this->getId().'" class="'.$this->getClass().'">';
        $this->_html.='<thead>';
        $this->_html.='<tr>';
        $tablClique=[];
            
        for($i=0;$i<$this->_longTableHead;$i++){
            $this->_html.='<th>'.$this->_headTable[$i].'</th>';
        }
            
        $this->_html.='</tr>';
        $this->_html.='</thead>';
        $this->_html.='<tbody>';
        
        for($i=0;$i<$this->_longTable;$i++){
            
            $this->_html.='<tr>';
            
            for($j=0;$j<$this->_largTable;$j++){
                $this->_html.='<td>'.$this->_table[$i][$this->_nomColonne[$j]].'</td>';
            }
            
            $this->_html.='<td>';
            
            for($j=0;$j<$this->_largTable;$j++){
                $this->_html.='<input type="hidden" name="'.$this->_nomColonne[$j].'" value="'.$this->_table[$i][$this->_nomColonne[$j]].'" />';
            }
            $this->_html.='<button type="submit" class="btn btn-app"><i class="fa fa-check"></i> Modifier </button></td>';
            $this->_html.='</tr>';
        }
        
        $this->_html.='</tbody>';
        $this->_html.='</table>';
    }
    
    public function tableModif(){
        $this->_html='<table id="'.$this->getId().'" class="'.$this->getClass().'">';
        $this->_html.='<thead>';
        $this->_html.='<tr>';
        
        for($i=0;$i<$this->_longTableHead;$i++){
            $this->_html.='<th>'.$this->_headTable[$i].'</th>';
        }
        
        $this->_html.='</tr>';
        $this->_html.='</thead>';
        $this->_html.='<tbody>';
        
        for($i=0;$i<$this->_longTable;$i++){
            $this->_html.='<tr>';
            if($_POST['login']==$this->_table[$i]['login']){
                
                for($j=0;$j<$this->_largTable;$j++){
                   $this->_html.='<td><input type="text" value="'.$this->_table[$i][$this->_nomColonne[$j]].'"/></td>';
                }
                
                $this->_html.='<td><button type="submit" name="modifier" class="btn btn-app"><i class="fa fa-check"></i> Modifier </button></td>';
                $this->_html.='<td><a href="./?route=kernel_utilisateur_liste"><button class="btn btn-app"><i class="fa fa-check"></i> Annuler </button></a></td>';
                
            }else{
                
                for($j=0;$j<$this->_largTable;$j++){
                    $this->_html.='<td>'.$this->_table[$i][$this->_nomColonne[$j]].'</td>';
                }
                $this->_html.='<td><button type="submit" name="modifier" class="btn btn-app"><i class="fa fa-check"></i> Modifier </button></td>';
            }
            
            
            $this->_html.='</tr>';
        }
        $this->_html.='</tbody>';
        $this->_html.='</table>';
    }
    
    public function affichTable(){
        echo $this->_html;
    }
    
}
