<?php
class Model_ListeBars{ 
	/**
	 *
	 * @var PDO
	 */
	private $db;
	public function __construct(PDO $mydb){
	    $this->db = $mydb;
	}
	
	/**
	 * Rend toutes les ListeBars 
	 * @return array
	 */
	public function rend(){
	    $sql =  "SELECT * FROM ListeBars";	    
	    
	    $statement=$this->db->prepare($sql);
	    $statement->execute();
	    $resultats=$statement->fetchAll(PDO::FETCH_ASSOC);
	    
	    $i = 0;
	    $rendu = Array();

	    $fc = new FeatureCollection();
	    foreach ($resultats as $i => $resultat) {
		$fc->addFeature(new Feature($i, (json_decode($resultat['geometry'])), array("name" => $resultat['name'])));
	    }
	    	   array_push($rendu, $fc);

	    return $rendu;
	}
	
        /**
         * Rend la liste des Bars pour un Barathon(id)
         * @return type
         */
        public function rendListeBarsPourBarathon(){

            $barathonId = $_GET['barathonId'];

            $sql = "SELECT * FROM ListeBars WHERE barathonId = $barathonId ODRER BY listeDansBarathon ASC";

            $statement=$this->db->prepare($sql);
	    $statement->execute();
	    $resultats=$statement->fetchAll(PDO::FETCH_ASSOC);
            
            return $resultats;
        }
        
        /**
         * Ajoute un Bar à un Barathon
         */
        public function addBarToBarathon(){
            
            $barId;
            $barathonId;
            $ordreDansBarathon;
            
            $sql = "INSERT INTO listeBars (barId, barathonId, ordreDansBarathon) VALUES (:barId, :barathonid, :ordreDansBarathon)";
            
            $q = $conn->prepare($sql);
            $q->execute(array(':barId'=>$barId,
                              ':barathonId'=>$barathonId,
                              ':ordreDansbarathon'=>$ordreDansbarathon));
            
            return $q;
        }
        
        public function ajouteBarABarathon(){
            
        }
        
        
        
}