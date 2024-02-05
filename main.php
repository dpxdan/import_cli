<?php
$jsondata = file_get_contents('data.json');
$json = json_decode($jsondata);
$data = $json;
$id = $data->variables->uuid;
// print_r($id);
foreach($data->variables as $key => $data){
if(empty($data) || !isset($data->{'$uuid'})){
      print_r($key);
  continue;
    }
if (isset($variables->{'$uuid'})){
      $msg = $variables->{'$uuid'};
      $time = $variables->{'$callstart'};
      echo $id;
  
      

  }
}
//var_dump ($jsondata);

 /*       $_user = 'iungo';
    $_password= 'INGdev2021!!';
    $_db = 'dashboard';
    $_host = 'localhost';
    $_port = 3306;
  $con = new mysqli($_host, $_user, $_password, $_db) or die(mysql_error);

  //read the json file contents
  $jsondata = file_get_contents('act.json');

  //do not convert to array
  $json = json_decode($jsondata);

  $id = $json->device->sn;
  foreach($json->data as $key => $data){
    if(empty($data) || !isset($data->{'$ts'})){
      continue;
    }
    if (isset($data->{'$msg'})){
      $msg = $data->{'$msg'};
      $time = $data->{'$ts'};

      $sql="INSERT into error_log (sn, time, MSG) VALUES (?,?,?); ";
      $stmt = $con-> prepare($sql);
      $stmt -> bind_param("iss", $id,$time, $msg);
      $stmt -> execute();
    }else{
      $time = (isset($data->{'$ts'}))? $data->{'$ts'}:'';
      $RH = (isset($data->RH))? $data->RH:'';
      $AT = (isset($data->AT))? $data->AT:'';
      $MINVi = (isset($data->MINVi))? $data->MINVi:'';

      //insert into mysql table
      $sql="INSERT into test (sn, date, RH, AT, MINVi) VALUES (?,?,?,?,?); ";
      $stmt = $con-> prepare($sql);
      $stmt -> bind_param("issss", $id,$time,$RH,$AT,$MINVi);
      $stmt -> execute();
    }


  }
  mysqli_close($con);*/

