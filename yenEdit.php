<?PHP

require_once("yenClass.php");
require_once("yenClass.config.php");
 /*this program alloows you to edit and update a property. You can see updated property when you browse data with yen.php */
 if (isset($_POST['uuid']))
    {


  $result=$yen_class->updateProperty();
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

             <h1>Edit property</h1>
            <div class="listing-logo"><img src="<?php echo $json->image_thumbnail;?>" alt=""></div>
           <input type='hidden' id='c' name='uuid' value='<?php echo $json->uuid ?>'>


           <h5>property_type_id: <?php echo $json->property_type_id ?></h5>
            <input type='hidden' id='cr' name='property_type_id' value='<?php echo $json->property_type_id ?>'>

            <p>Please select type:</p>
             <input type="radio" id="male" name="type" value="sale" <?php echo ($json->type== 'sale') ?  "checked" : "" ;  ?>
             <label for="sale" >sale</label><br>

             <input type="radio" id="other" name="type"  value="rent" <?php echo ($json->type== 'rent') ?  "checked" : "" ;  ?>>
             <label for="rent" >rent</label>

            <h5> postcode :</h5>
            <input type='text'  id='3'name='postcode' value='<?php echo $json->postcode ?>'>
            <h5>price :</h5>
            <input type='text'  id='pc'name='price' value='<?php echo $json->price ?>'>
             <h5>description :</h5>
             <textarea class="yazi" id="descriptionId" name="description"  cols="45" rows="8" aria-required="true" placeholder="Enter your experiences..." ><?php echo $json->description ?></textarea>

             <label style='width:150px' for="slevelId">
               <!-- <h5>Please select</h5> -->
               <h5 style="margin-left:10px">Select Number of bedrooms:</h5>
               <select style="float:left;"  name='num_bedrooms' id="bedroomId" class="btn btn-primary dropdown-toggle"  >
               <option selected value="<?php echo $json->num_bedrooms ?>"><?php echo $json->num_bedrooms ?></option>
               <?php   $num_bedrooms=$json->num_bedrooms;
               for ($i=0; $i < 24; $i++){
               echo "<option value=$i>$i</option>";
               } ?>

               <!-- <option value='Working'>Working</option>
               <option value='Practitioner'>Practitioner</option>
               <option value='Expert'>Expert</option> -->
            </select>
           </label>


            <h5>address :</h5>
             <input type='text'  id='pc'name='address' value='<?php echo $json->address ?>'>

              <h5 style="margin-left:10px">Select Number of bathrooms:</h5>
              <select style="float:left;"  name='num_bathrooms' id="bathroomId" class="btn btn-primary dropdown-toggle"  >
              <option selected value='<?php echo $json->num_bathrooms ?>'><?php echo $json->num_bathrooms ?></option>
              <?php  for ($j=0; $j < 24; $j++){
               echo "<option value=$j>$j</option>";}?>


               <h5>Town:</h5>
             <input type='text'  id='c'name='town' value='<?php echo $json->town ?>'>
           <h5>County:</h5>
            <input type='text'  id='c'name='county' value='<?php echo $json->county ?>'>

            <h5> Country:</h5>
            <input type='text'  id='cr'name='country' value='<?php echo $json->country ?>'>

         </div>

         <input type="submit" class="btn btn-default " name="submit"
        style="margin-bottom: 20px;margin-top:10px;margin-right:10px;float:left;border-style: solid;border-color: grey;color:white"

     <button type="button" class="btn btn-danger " name="cc"
    style="float:left;margin-bottom: 20px;margin-top:10px;margin-left:0px;;font:underline;
    border-style: solid;border-color: grey;color:white;height:41px;"
    onclick='load()' />


</form>
</div>
