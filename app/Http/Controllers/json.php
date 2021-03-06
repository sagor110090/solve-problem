<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class json extends Controller
{
    public function store(Request $request)
    {
      
   	
        $myFile = __DIR__.'/data.json';
        $arr_data = array(); // create empty array
     
       try
       {
            //Get form data
            $formdata = array(
               'firstName'=> 'firstNam',
               'lastName'=> 'lastNam',
               'email'=>'email',           
               'mobile'=> 'mobil'
            );
     
            //Get data from existing json file
            $jsondata = file_get_contents($myFile);
            // dd( $jsondata);
     
            // converts json data into array
            $arr_data = json_decode($jsondata, true);
     
            // Push user data to array
            array_push($arr_data,$formdata);
     
            //Convert updated array to JSON
            $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
            
            //write json data into data.json file
            if(file_put_contents($myFile, $jsondata)) {
                 echo 'Data successfully saved';
             }
            else 
                 echo "error";
     
        }
        catch (Exception $e) {
                 echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
     

    }
}
