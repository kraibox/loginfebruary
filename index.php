


<?php

require("phpMQTT.php");
  $query = "text";
$server = "m16.cloudmqtt.com"; //"m16.cloudmqtt.com" ;     // change if necessary
$port  = 14303;
$username = "vuwseiaf";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "qyHizNCHb3a3";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$client_id =   "vuwseiaf";    //"Client-".rand();
  echo "Start login\n\n";
$mqtt = new phpMQTT($server, $port, $client_id);
 echo "connecting!\n\n";
if( !$mqtt->connect(true, NULL, $username, $password) ) {
  echo "Fail\n\n";
 exit(1);
}
echo "Connected.. Start subscribe1\n : $query :\n";
  $topics[$query] = array("qos" => 0, "function" => "procmsg");
echo "Connected.. Start subscribe2\n : $query :\n";

// $mqtt_client->subscribe($topics,0);
$mqtt->subscribe("led",0);
echo ": subscribe query OK...........\n\n";


while ($mqtt->proc()) {
}


$mqtt->close();

function procmsg($topic, $msg){
  echo "Recieved at: " . date("Y-m-d H:i:s", time()) . "\n";
  echo "Topic: {$topic}\n";
  echo "Message: $msg\n\n";
}

?>

 
