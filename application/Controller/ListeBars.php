<?php

class Controller_ListeBars{
    /**
     *
     * @var model_Bars 
     */
    private $model;
    public function __construct(PDO $dbh){
	$this->model = new Model_ListeBars($dbh); 
    }

    public function rend(){
	return $this->model->rend();
    }
    
    public function rendListeBarsPourBarathon(){
        return $this->model->rendListeBarsPourBarathon();
    }
    
    public function addBarToBarathon(){
        return $this->model->addBarToBarathon();
    }
    
    public function ajouteBarABarathon(){
            
    }
    
}