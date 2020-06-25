<?PHP
/* the program allows you browse all properties from API. It shows all updated properties with API. */
require_once("yenClass.php");
require_once("yenClass.config.php");
 ini_set ('display_errors', 'on');
 ini_set ('log_errors', 'on');
 ini_set ('display_startup_errors', 'on');
 ini_set ('error_reporting', E_ALL);
 if (isset($_GET['page']))
    {
      echo $_GET['page'];
        $page=$_GET['page'];
    $resp=$yen_class->getDataFromURL($_GET['page'],false);

    } else {


$page=1;
    $resp=$yen_class->getDataFromURL($page,false);

    }

$json=json_decode($resp);







for ($i=0; $i < count($json->data); $i++){
 /*echo '<br>uuid:'.$json->data[$i]->uuid.
  '<br>property_type_id:'.
  $json->data[$i]->property_type_id.
  '<br>county:'.$json->data[$i]->county.
  '<br>country:'.$json->data[$i]->country.
  '<br>town:'.$json->data[$i]->town.
  '<br>description:'.$json->data[$i]->description.
  '<br>address:'.$json->data[$i]->address.
  '<br>image_full:'.$json->data[$i]->image_full.
  '<br>image_thumbnail:'.$json->data[$i]->image_thumbnail.
  '<br>latitude:'.$json->data[$i]->latitude.
  '<br>longitude:'.$json->data[$i]->longitude.
  '<br>num_bedrooms:'.$json->data[$i]->num_bedrooms.
  '<br>num_bathrooms:'.$json->data[$i]->num_bathrooms.
  '<br>price:'.$json->data[$i]->price.
  '<br>type:'.$json->data[$i]->type.
  '<br>created_at:'.$json->data[$i]->created_at.
  '<br>updated_at:'.$json->data[$i]->updated_at.
  '<br>property_type.id:'.$json->data[$i]->property_type->id.
  '<br>property_type.title:'.$json->data[$i]->property_type->title.
  '<br>property_type.description:'.$json->data[$i]->property_type->description.
  '<br>property_type.created_at:'.$json->data[$i]->property_type->created_at.
  '<br>property_type.updated_at:'.$json->data[$i]->property_type->updated_at;*/

}


?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>xxx</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/cherry1.css" id="colors">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<!-- Content
================================================== -->
<div class="container">
	<!-- Recent Jobs -->
	<div class="eleven columns">



 <h1>Property List</h1>
			<!-- Listing -->
  <?php
$page_number=$page+1;
$previous_number=$page-1;


  if ($page<85) {
    echo   '	<a href="/yen.php?page='.$page_number.'" class="listing ">Next Page';
  }
  if ($page<=85&&$page>1) {
    echo   '	<a href="/yen.php?page='.$previous_number.'" class="listing ">Previous Page';
  }
  if ($page>1) {
  echo   '	<a href="/yen.php?page=1" class="listing ">first Page';
  }
  if ($page<85) {
    echo   '	<a href="/yen.php?page=85" class="listing ">last Page';
  }

    for ($i=0; $i < count($json->data); $i++)
     {

         $crud='';
         $property_type_id=$json->data[$i]->property_type_id;
          $description=$json->data[$i]->description;
          $county=$json->data[$i]->county;
          $country=$json->data[$i]->country;
            $address=$json->data[$i]->address;
              $price=$json->data[$i]->price;
           $jsonx=$yen_class->GetPropertyFromDBU($json->data[$i]->uuid);
           if ($jsonx!=false) {
             if ($jsonx->crud=='D') {
               $crud='D';
              $description='DELETED';
              $property_type_id=$jsonx->property_type_id;

              $county='';
              $country='';
              $address='';
              $price='';
              $property_type_id=$jsonx->property_type_id;

              $county=$jsonx->county;
              $country=$jsonx->country;
              $address=$jsonx->address;
              $price=$jsonx->price;
              }
           }


          echo   '	<a href="yenEdit.php?uuid='.$json->data[$i]->uuid.'" class="listing ';

           echo '"><div class="listing-logo"><img src="'.$json->data[$i]->image_thumbnail.'" alt="">'.$property_type_id.'</div>
                  <div class="listing-title">';

                  echo    '<ul class="listing-icons">';

                  echo    '<li><i class="ln ln-icon-Money"></i> £ '.$price.'</li>
                            <li><i class="ln ln-icon-Management"></i>'.$address.'</li>

                            <li>'.$description.'</li>
                          <li><i class="ln ln-icon-Map2"></i>'.$county.'</li>

                          <li> / '.$country.'</li>
                          </ul></div></a>';
                          if ($crud=='D') {
                          } else {

                          echo '<a href="yenDelete.php?uuid='.$json->data[$i]->uuid.'">delete</a>' ;
                        }
        }

      ?>
    </div>
  </div>
</div>
