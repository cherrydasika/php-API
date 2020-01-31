<?php 
require 'dbh.class.php';

class PlateDetails extends Dbh{

    public function validatePlate($meid){

        $sql="SELECT MEID FROM mppdiplate_phy WHERE meid=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$meid]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return true;
        };

    }

    public function getPlateDetails($meid){
        $sql="SELECT * FROM mppdiplate_phy WHERE meid=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$meid]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
           return json_encode($records);
        };


    }

}

$plateInfo = new PlateDetails();


?>