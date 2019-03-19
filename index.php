


<?php

require("phpMQTT.php");
  $query = "text";
$server = "m16.cloudmqtt.com"; //"m16.cloudmqtt.com" ;     // change if necessary
$port  = 14303;
$username = "vuwseiaf";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "qyHizNCHb3a3";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$client_id = "Client-".rand();
 
$mqtt = new phpMQTT($server, $port, $client_id);
 echo "connecting!\n\n";
//if( !$mqtt->connect(true, NULL, $username, $password) ) {
//  echo "Fail\n\n";
// exit(1);
//}
//echo "Connected.. Start subscribe1\n : $query :\n";
//  $topics[$query] = array("qos" => 0, "function" => "procmsg");
//$mqtt->subscribe($topics,0);
//echo ": subscribe query OK...........\n\n";
if ($mqtt->connect(true, NULL, $username, $password)) {
  $topics[$query] = array("qos" => 0,"function" => "procmsg");
  $mqtt->subscribe($topics,0);
  echo "Connected..  subscribe ok\n : $query :\n";
while($mqtt->proc()) {}
  $mqtt->close();
} else {
  exit(1);
}


//while ($mqtt->proc()) {
//}
 



function procmsg($topic, $msg){
  echo "Recieved at: " . date("Y-m-d H:i:s", time()) . "\n";
  echo "Topic: {$topic}\n";
  echo "Message: $msg\n\n";
}

?>

 
