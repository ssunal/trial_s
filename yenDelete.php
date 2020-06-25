<?PHP
require_once("yenClass.php");
require_once("yenClass.config.php");
 /*this program alloows you to delete a property. You can see deleted property when you browse data with yen.php */
 if (isset($_POST['uuid']))
    {


  $result=$yen_class->deleteProperty();
  if ($result) {
    $yen_class->RedirectToURL("yen");
  } else {
    $jsonx=json_encode($_POST);
    var_dump($jsonx);
  }

    }
 if (isset($_GET['uuid']))
    {

        $uuid=$_GET['uuid'];
  $json=$yen_class->GetPropertyFromDB($uuid);


    } else {


$page=1;

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
 <form id="profile_acc"   action='<?php echo $yen_class->GetSelfScript(); ?>' method="post" style="margin-top:0px;margin-left: 50px;margin-right: 50px">

  <label style="margin-left:0px;margin-top:-25px;padding:0px" > My Details </label>
    <div class="form with-line "  style="float:left;margin-left:0px;margin-top:0px;width:100%">

             <h1>Delete property</h1>
            <div class="listing-logo"><img src="<?php echo $json->image_thumbnail;?>" alt=""></div>
           <input type='hidden' id='c' name='uuid' value='<?php echo $json->uuid ?>'>


           <h5>property_type_id: <?php echo $json->property_type_id ?></h5>
            <input type='hidden' id='cr' name='property_type_id' value='<?php echo $json->property_type_id ?>'>

            <p>Please select type:<?php echo $json->type ?></p>


            <h5> postcode : <?php echo $json->postcode ?></h5>

            <h5>price : <?php echo $json->price ?></h5>

             <h5>description : <?php echo $json->description ?></h5>

             <label >
               <!-- <h5>Please select</h5> -->
               <h5 >Number of bedrooms: <?php echo $json->num_bedrooms ?></h5>

            </select>
           </label>


            <h5>address : <?php echo $json->address ?></h5>


              <h5 >Number of bathrooms: <?php echo $json->num_bathrooms ?></h5>

               <h5>Town:<?php echo $json->town ?></h5>

           <h5>County: <?php echo $json->county ?></h5>


            <h5> Country: <?php echo $json->country ?></h5>


         </div>

         <input type="submit" class="btn btn-default " name="delete"
        style="margin-bottom: 20px;margin-top:10px;margin-right:10px;float:left;border-style: solid;border-color: grey;color:white"

   />


</form>
</div>
