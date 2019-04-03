<?php

require("phpMQTT.php");

$server = "m16.cloudmqtt.com"; //"m16.cloudmqtt.com" ;     // change if necessary
$port  = 14303;
$username = "vuwseiaf";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "qyHizNCHb3a3";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$client_id = "Client-".rand();
  echo "Start\n";
$mqtt = new phpMQTT($server, $port, $client_id);
if( !$mqtt->connect(true, NULL, $username, $password) ) {
    echo "error\n";
 exit(1);
}
//$topics['test/topic'] = array("qos" => 0, "function" => "procmsg");
$topics['API1'] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics, 0);

//while($mqtt->proc()){}
//sleep(10);
$mqtt->close();

function procmsg($topic, $msg){
  echo "Recieved at: " . date("Y-m-d H:i:s", time()) . "\n";
  echo "Topic: {$topic}\n";
  echo "Message: $msg\n\n";
}

?>
