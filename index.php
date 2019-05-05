<?php

require("phpMQTT.php");

$server  = "m16.cloudmqtt.com";
$port  = 14303;
$username = "vuwseiaf";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "qyHizNCHb3a3";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
 $client_id = "Client-".rand();

$mqtt = new phpMQTT($server, $port, $client_id);
While(1){
if ($mqtt->connect(true, NULL, $username, $password)) {
 $mqtt->publish("hb", "3", 0);
sleep(5);
 $mqtt->publish("hb", "2", 0);
 sleep(5);
 $mqtt->publish("hb", "4", 0);
sleep(5);
 $mqtt->publish("hb", "2", 0);
 $mqtt->close();
} else {
    echo "Time out!\n";
}
echo "Finish Publish\n";
}
?>
