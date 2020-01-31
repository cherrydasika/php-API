<?php
//This is an api to pull information about the plate parameters
//These variables are received from the url
$plate_id = $_GET['plateId'];
$error;
$isPlateId = false;

if(!isset($plate_id))
{
$error = json_encode(
    array(
        'code'=>1,
        'message'=>'PlateId is empty'
    )
    );
    echo $error;
    die();
}

require 'classes/platedetails.class.php';


$isPlateId = $plateInfo->validatePlate($plate_id);
if($isPlateId == true){
    //PlateId in database
    $results = $plateInfo->getPlateDetails($plate_id);
    echo $results;

}
else if($isPlateId  == false){
    //Plate id not in database
    echo json_encode(array(
        'code'=>3,
        'message'=>'Plate Id invalid'
    ));
}



?>