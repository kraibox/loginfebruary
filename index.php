<?php

require("phpMQTT.php");

$server = "m16.cloudmqtt.com"; //"m16.cloudmqtt.com" ;     // change if necessary
$port  = 14303;
$username = "vuwseiaf";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "qyHizNCHb3a3";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$client_id = "Client-".rand();
  echo "Start\n";
$mqtt = new phpMQTT($server, $port, $client_id);
if(!$mqtt->connect(true,NULL,$username,$password)){
exit(1);
}

//currently subscribed topics

$topics[‘led’] = array(“qos”=>0, “function”=>”procmsg”);
$mqtt->subscribe($topics,0);
echo “okok: $msg”.”\r\n”;
//while($mqtt->proc()){
//}
//$mqtt->close();
function procmsg($topic,$msg){
echo “Msg Recieved: $msg”.”\r\n”;
}

?>
