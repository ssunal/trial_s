<?PHP
/*this program manage all functions what the others need*/
class Member

{
  var $connection;
  function EnsurePropertyTable()
  {
      $result = mysqli_query($this->connection,"SHOW COLUMNS FROM property");
      if(!$result || mysqli_num_rows($result) <= 0)
      {
          return $this->CreatePropertyTable();
      }
      return true;
  }
  function HandleDBError($err)
  {
    echo $err;

  }
  function CreatePropertyTable()
  {
    $qry = "Create Table silver.property (uuid char(50) NOT NULL,crud char (1) NOT NULL,property_type_id INT (2) NOT NULL,county char(50) NOT NULL,country char(50) NOT NULL,
     town char(50), description char(255),full_details_url char(255),postcode char(10),address char(50), image_full char(50) NOT NULL ,image_thumbnail char(50),latitude char(50),longitude char(50),num_bedrooms INT (2),num_bathrooms INT (2),price INT(10),type char(4),
      PRIMARY KEY (uuid))";
      echo $qry;


     if(!mysqli_query($this->connection,$qry))
     {
         $this->HandleDBError("Error creating the table \nquery was\n $qry");
         return false;
     }
return true;}
  function getDataFromURL($page_number,$bloolean) {
    $api_key='3NLTTNlXsi6rBWl7nYGluOdkl2htFHug';
    $url1 = 'http://trialapi.craig.mtcdevserver.com/api/properties?api_key='.$api_key.'&page[number]='.$page_number;
    $context = stream_context_create(array(
         'http' => array(
    
          'method' => 'GET',
          'header' => 'Content-type: application/x-www-form-urlencoded',

          'timeout' => 60
      )
  ));
  $resp = file_get_contents($url1, FALSE);
  if ($bloolean) {
    sleep(1);
  }


  Return $resp;
}
function deleteAll()
{
    if(!$this->DBLogin())
    {
        $this->HandleError("Database login failed!");
        return false;
    }

    $qry="drop table property";
    echo $qry;
    $result = mysqli_query($this->connection,$qry);
    if(!$result || mysqli_num_rows($result) <= 0)
    {


        return false;
    }
    $row = mysqli_fetch_assoc($result);



    $json=json_encode($row);
    $resp=json_decode($json);
  return $resp;
}
function GetPropertyFromDB($uuid)
{
    if(!$this->DBLogin())
    {
        $this->HandleError("Database login failed!");
        return false;
    }

    $qry="Select * from property where uuid='$uuid'";
    $result = mysqli_query($this->connection,$qry);
    if(!$result || mysqli_num_rows($result) <= 0)
    {


        return false;
    }
    $row = mysqli_fetch_assoc($result);



    $json=json_encode($row);
    $resp=json_decode($json);
  return $resp;
}function GetPropertyFromDBU($uuid)
{
    if(!$this->DBLogin())
    {
        $this->HandleError("Database login failed!");
        return false;
    }

    $qry="Select * from property where uuid='$uuid' and (crud='U' or crud='D')";
    $result = mysqli_query($this->connection,$qry);
    if(!$result || mysqli_num_rows($result) <= 0)
    {

        return false;
    }
    $row = mysqli_fetch_assoc($result);



    $json=json_encode($row);
    $resp=json_decode($json);
  return $resp;
}
function InsertPropertyToDB($formvars)
{




  if(!$this->DBLogin())
  {
      $this->HandleError("Database login failed!");
      return false;
  }


  $qry = 'insert into property (
          uuid,crud,property_type_id,county,country,town,description,full_details_url,postcode,address,image_full,image_thumbnail,latitude,longitude,num_bedrooms,num_bathrooms,price,type
          )
          values
          (
            "' .$formvars['uuid'].'",

            "' .$formvars['crud'].'",
              "' .$formvars['property_type_id'].'",
            "' .$formvars['county'].'",
            "' .$formvars['country'].'",
            "' .$formvars['town'].'",
            "' .$formvars['description'].'",
            "' .$formvars['full_details_url'].'",
            "' .$formvars['postcode'].'",
            "' .$formvars['address'].'",
            "' .$formvars['image_full'].'",
            "' .$formvars['image_thumbnail'].'",
            "' .$formvars['latitude'].'",
            "' .$formvars['longitude'].'",
            "' .$formvars['num_bedrooms'].'",
            "' .$formvars['num_bathrooms'].'",
            "' .$formvars['price'].'",
            "' .$formvars['type'].'"


          )';

          if(!mysqli_query($this->connection,$qry))
          {
              $this->HandleDBError("Error inserting data to the table\nquery:$qry");
              return false;
          }
          return true;
      }
      function InsertPropertyToUpdate($formvars)
      {




        if(!$this->DBLogin())
        {
            $this->HandleError("Database login failed!");
            return false;
        }


        $qry = 'insert into property (
                uuid,crud,property_type_id,county,country,town,description,full_details_url,postcode,address,image_full,image_thumbnail,latitude,longitude,num_bedrooms,num_bathrooms,price,type,
                )
                values
                (
                  "' . $this->SanitizeForSQL($formvars['uuid']) . '",
                    "' . $this->SanitizeForSQL($formvars['crud']) . '",
                  "' . $this->SanitizeForSQL($formvars['property_type_id']) . '",
                  "' . $this->SanitizeForSQL($formvars['county']) . '",
                  "' . $this->SanitizeForSQL($formvars['country']) . '",
                  "' . $this->SanitizeForSQL($formvars['town']) . '",
                  "' . $this->SanitizeForSQL($formvars['description']) . '",
                  "' . $this->SanitizeForSQL($formvars['full_details_url']) . '",
                  "' . $this->SanitizeForSQL($formvars['postcode']) . '",
                  "' . $this->SanitizeForSQL($formvars['address']) . '",
                  "' . $this->SanitizeForSQL($formvars['image_full']) . '",
                  "' . $this->SanitizeForSQL($formvars['image_thumbnail']) . '",
                  "' . $this->SanitizeForSQL($formvars['latitude']) . '",
                  "' . $this->SanitizeForSQL($formvars['longitude']) . '",
                  "' . $this->SanitizeForSQL($formvars['num_bedrooms']) . '",
                  "' . $this->SanitizeForSQL($formvars['num_bathrooms']) . '",
                  "' . $this->SanitizeForSQL($formvars['price']) . '",
                  "' . $this->SanitizeForSQL($formvars['type']) . '"


                )';

                if(!mysqli_query($this->connection,$qry))
                {
                    $this->HandleDBError("Error inserting data to the table\nquery:$qry");
                    return false;
                }
                return true;
            }
      function InitDB($host,$uname,$pwd,$database)

     {
         $this->db_host  = $host;
         $this->username = $uname;
         $this->pwd  = $pwd;
         $this->database  = $database;


     }
      function DBLogin()
      {

          $this->connection = mysqli_connect($this->db_host,$this->username,$this->pwd);

          if(!$this->connection)
          {
              $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
              return false;
          }
          if(!mysqli_select_db( $this->connection,$this->database))
          {
              $this->HandleDBError('Failed to select database: '.$this->database.' Please make sure that the database name provided is correct');
              return false;
          }
          if(!mysqli_query($this->connection,"SET NAMES 'UTF8'"))
          {
              $this->HandleDBError('Error setting utf8 encoding');
              return false;
          }
          return true;
      }
      function SanitizeForSQL($str)
      {
          if( function_exists( "mysqli_real_escape_string" ) )
          {
                $ret_str = mysqli_real_escape_string($this->connection, $str );
          }
          else
          {
                $ret_str = addslashes( $str );
          }
          return $ret_str;
      }
      function AddProperty($json)
       {
         if(!$this->DBLogin())
         {
             $this->HandleError("Database login failed!");
             return false;
         }
         $this->EnsurePropertyTable();
               $this->CollectPropertySubmission($json,$formvars);
               $this->InsertPropertyToDB($formvars);
     }
     function CollectPropertySubmission($jsonx,&$formvars)
     {

       $uuid=$jsonx->uuid;

       $property_type_id=$jsonx->property_type_id;
       $crud=$jsonx->crud;

       $county=$jsonx->county;

       $country=$jsonx->country;

       $town=$jsonx->town;

       $description=$jsonx->description;

       $full_details_url=$jsonx->full_details_url;
       $postcode=$jsonx->postcode;

       $address=$jsonx->address;
       $image_full=$jsonx->image_full;
       $image_thumbnail=$jsonx->image_thumbnail;
       $latitude=$jsonx->latitude;
       $longitude=$jsonx->longitude;
       $num_bedrooms=$jsonx->num_bedrooms;
       $num_bathrooms=$jsonx->num_bathrooms;
       $price=$jsonx->price;
       $type=$jsonx->type;

          $formvars['uuid'] = $uuid;
          $formvars['property_type_id'] = $property_type_id;
          $formvars['crud'] = $crud;
         $formvars['county'] = $county;
         $formvars['country'] = $country;
         $formvars['town'] = $town;
         $formvars['description'] = $description;
         $formvars['full_details_url'] = $full_details_url;
         $formvars['postcode'] = $postcode;
         $formvars['address'] = $address;
         $formvars['image_full'] = $image_full;
         $formvars['image_thumbnail'] = $image_thumbnail;
         $formvars['latitude'] = $latitude;
         $formvars['longitude'] = $longitude;
          $formvars['num_bedrooms'] = $num_bedrooms;
         $formvars['num_bathrooms'] = $num_bathrooms;
         $formvars['price'] = $price;
          $formvars['type'] = $type;


       }
     function CollectPropertySubmissionForUpdate(&$formvars)
     {

       $uuid=$_POST['uuid'];
       $property_type_id=$_POST['property_type_id'];
        $crud='U';

       $county=$_POST['county'];

       $country=$_POST['country'];

       $town=$_POST['town'];

       $description=$_POST['description'];

       $postcode=$_POST['postcode'];

       $address=$_POST['address'];
       $num_bedrooms=$_POST['num_bedrooms'];

       $num_bathrooms=$_POST['num_bathrooms'];
       $price=$_POST['price'];
       $type=$_POST['type'];

          $formvars['uuid'] = $this->Sanitize($uuid);
            $formvars['crud'] = $this->Sanitize($crud);
          $formvars['property_type_id'] = $this->Sanitize($property_type_id);
         $formvars['county'] = $this->Sanitize($county);
         $formvars['country'] = $this->Sanitize($country);
         $formvars['town'] = $this->Sanitize($town);
         $formvars['description'] = $this->Sanitize($description);

         $formvars['postcode'] = $this->Sanitize($postcode);
         $formvars['address'] = $this->Sanitize($address);


          $formvars['num_bedrooms'] = $this->Sanitize($num_bedrooms);
         $formvars['num_bathrooms'] = $this->Sanitize($num_bathrooms);
         $formvars['price'] = $this->Sanitize($price);
          $formvars['type'] = $this->Sanitize($type);


       }
       function Sanitize($str,$remove_nl=true)
       {
           $str = $this->StripSlashes($str);
     $str = $this->escape($str);
           if($remove_nl)
           {
               $injections = array('/(\n+)/i',
                   '/(\r+)/i',
                   '/(\t+)/i',
                   '/(%0A+)/i',
                   '/(%0D+)/i',
                   '/(%08+)/i',
                   '/(%09+)/i'
                   );
               $str = preg_replace($injections,'',$str);
           }

           return $str;
       }
       function StripSlashes($str)
       {
           if(get_magic_quotes_gpc())
           {
               $str = stripslashes($str);
           }
           return $str;
       }
       function escape($escape) {

           $escape=str_replace("°","&deg;",$escape);
           $escape=str_replace("•","&bull;",$escape);
           $escape=str_replace("'","&#39;",$escape);
           $escape=str_replace('\"',"&#34;",$escape);
           $escape=str_replace('(', "&#40;",$escape);
           $escape=str_replace(')',"&#41;",$escape);
           $escape=str_replace('/',"&#47;",$escape);
           $escape=str_replace('<', "&#60;",$escape);
           $escape=str_replace('>', "&#62;",$escape);
           $escape=str_replace('?', "&#63;",$escape);
           $escape=str_replace('@', "&#64;",$escape);
           $escape=str_replace('*', "&#42;",$escape);
           $escape=str_replace('+', "&#43;",$escape);

         return $escape;
       }
       function GetSelfScript()
       {
          $str= strlen ( $_SERVER['PHP_SELF']);

           return htmlentities(substr($_SERVER['PHP_SELF'],1,$str-5));

       }
       function deletePropertyToDB($uuid)
       {

         $qry = "Update property Set crud='D' where  uuid='$uuid'";

                       if(!mysqli_query($this->connection,$qry))
                       {
                           $this->HandleDBError("Error updating data to the table\nquery:$qry");
                           return false;
                       }
                       return true;
       }
       function UpdatePropertyToDB($formvars)
       {

        $crud= $formvars['crud'];
        $uuid= $formvars['uuid'];
        $property_type_id= $formvars['property_type_id'];

        $county= $formvars['county'];

        $country= $formvars['country'];

        $town= $formvars['town'];

        $description= $formvars['description'];

        $postcode= $formvars['postcode'];

        $address= $formvars['address'];
        $num_bedrooms= $formvars['num_bedrooms'];

        $num_bathrooms= $formvars['num_bathrooms'];

        $price= $formvars['price'];

        $type=$formvars['type'];

         $qry = "Update property Set crud='$crud', property_type_id='$property_type_id', county='$county', country='$country', town='$town', description='$description',
         postcode='$postcode', address='$address', num_bedrooms='$num_bedrooms',num_bathrooms='$num_bathrooms',price='$price',type='$type' where  uuid='$uuid'";

                       if(!mysqli_query($this->connection,$qry))
                       {
                           $this->HandleDBError("Error updating data to the table\nquery:$qry");
                           return false;
                       }
                       return true;
       }
       function deleteProperty()
       {


           $uuid=$_POST['uuid'];



         if(!$this->DBLogin())
         {
             $this->HandleError("Database login failed!");
             return false;
         }

      $result=$this->deletePropertyToDB($uuid);
        return $result;

       }       function updateProperty()
              {


                  $this->CollectPropertySubmissionForUpdate($formvars);



                if(!$this->DBLogin())
                {
                    $this->HandleError("Database login failed!");
                    return false;
                }

             $result=$this->UpdatePropertyToDB($formvars);
             return $result;

              }
       function RedirectToURL($url)
       {
           header("Location: $url");
           exit;
       }
}
