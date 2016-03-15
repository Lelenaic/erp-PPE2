<?php

class Table {
    
    //Attributs
    private $_table;
    private $_headTable;
    private $_longTable;
    //private $_largTable;
    private $_nomColonne;
    private $_id;
    private $_class;
    private $_html;   //Code html à afficher
    
    
    //Constructeurs
    public function __construct($newTable=[],$newHeadTable=[],$newId='',$newClass='',$newNomColonne=''){
        $this->_table=$newTable;
        $this->_headTable=$newHeadTable;
        $this->_longTable=sizeof($this->_table);
        //$this->_largTable=sizeof($this->_table[0]);
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
            
        for($i=0;$i<$this->_longTable;$i++){
                $this->_html.='<th>'.$this->_headTable[$i].'</th>';
        }
            
        $this->_html.='</tr>';
        $this->_html.='</thead>';
        $this->_html.='<tbody>';
        
        foreach($this->_table as $u){
            $this->_html.='<tr>';
            $this->_html.='<td>'.$u[$this->getNomColonne()].'</td>';
            $this->_html.='</tr>';
            
        }
            
        $this->_html.='</tbody>';
        $this->_html.='</table>';
    }
    
    public function affichTable(){
        echo $this->_html;
    }
    
}
