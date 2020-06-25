<?PHP
/* This program allows you to get all data from API and create database in your system*/
require_once("yenClass.php");
require_once("yenClass.config.php");
 ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
 $resp=$yen_class->deleteAll();
 for ($j=1; $j < 86; $j++){
       $resp=$yen_class->getDataFromURL($j,true);
       $json=json_decode($resp);

 for ($i=0; $i < count($json->data); $i++){

   $jsonx->uuid=$json->data[$i]->uuid;
   $jsonx->property_type_id=$json->data[$i]->property_type->id;
   $jsonx->county=$json->data[$i]->county;
   $jsonx->country=$json->data[$i]->country;
   $jsonx->town=$json->data[$i]->town;
   $jsonx->description=$json->data[$i]->description;
   $jsonx->full_details_url='';
   $jsonx->postcode='';
   $jsonx->address=$json->data[$i]->address;
   $jsonx->image_full=$json->data[$i]->image_full;
   $jsonx->image_thumbnail=$json->data[$i]->image_thumbnail;
   $jsonx->latitude=$json->data[$i]->latitude;
   $jsonx->longitude=$json->data[$i]->longitude;
   $jsonx->num_bedrooms=$json->data[$i]->num_bedrooms;
   $jsonx->num_bathrooms=$json->data[$i]->num_bathrooms;
   $jsonx->price=$json->data[$i]->price;
$jsonx->crud='C';
   $jsonx->type= $json->data[$i]->type;


   $yen_class->AddProperty($jsonx);
   echo '<br>Please wait! '.$i.'/'.$j;
 }
 }
?>
<br>All data was filled!
