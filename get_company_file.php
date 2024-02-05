<?php
date_default_timezone_set('UTC');
$tableName = 'file_tickets_new';
$connection = mysqli_connect("localhost","iungo","INGdev2021!!","dashboard");
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://api.pipe.run/v1/companies/5649653/files');
$request->setMethod(HTTP_Request2::METHOD_GET);
$request->setConfig(array(
  'follow_redirects' => TRUE
));
$request->setHeader(array(
  'token' => '4cf6d406b8cbdf4eec40f50014c3b152'
));
try {
  $response = $request->send();

  if ($response->getStatus() == 200) {
$fileName = '/var/www/iungo-pipe/dashboard/iungo/piperun_api/company_files.json';
file_put_contents($fileName, $response->getBody());
$jsonFile = '/var/www/iungo-pipe/dashboard/iungo/piperun_api/company_files.json';
$jsonData = json_decode(file_get_contents($jsonFile), true);

// Iterate through JSON and build INSERT statements
foreach ($jsonData as $id=>$row) {
    $insertPairs = array();
    foreach ($row as $key=>$val) {
        $insertPairs[addslashes($key)] = addslashes($val);
    }
    $insertKeys = '`' . implode('`,`', array_keys($insertPairs)) . '`';
    $insertVals = '"' . implode('","', array_values($insertPairs)) . '"';

    echo "INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});" . "\n";
    //$sql = "INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});" . "\n";
    //$insert = mysqli_query($connection,$sql);
}

  }
  else {
    echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
    $response->getReasonPhrase();
  }
}
catch(HTTP_Request2_Exception $e) {
  echo 'Error: ' . $e->getMessage();
}



?>