<?php

require("phpMQTT.php");

$server  = "m16.cloudmqtt.com";
$port  = 14303;
$username = "vuwseiaf";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "qyHizNCHb3a3";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
 $client_id = "Client-".rand();
While(1){
$mqtt = new phpMQTT($server, $port, $client_id);
 
if ($mqtt->connect(true, NULL, $username, $password)) {
 $mqtt->publish("hb", "3", 0);
sleep(20);
 $mqtt->publish("hb", "2", 0);
 sleep(20);
 $mqtt->publish("hb", "3", 0);
sleep(29);
 $mqtt->publish("hb", "2", 0);
Sleep(20);
echo "ok\n";
 $mqtt->close();
} else {
    echo "Time out!\n";
}
echo "Finish Publish\n";
}
?>
