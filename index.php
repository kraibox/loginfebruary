<?php
require "phpMQTT.php";
 
$server  = "m16.cloudmqtt.com";
$port  = 14303;
$username = "vuwseiaf";  //username ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
$password = "qyHizNCHb3a3";  //password ที่ได้สร้างไว้ตอนตั้งค่า MQTT Broker
 $client_id = "Client-".rand();

$mqtt = new phpMQTT($server, $port, $client_id);

 echo "Connect22\n\n";

\\if (!$mqtt->connect()) {
\\   echo "Exit55\n\n";
\\    exit(1);
\\}
echo "topics\n\n";
$topics["led"] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics, 0);
while ($mqtt->proc()) {
}
$mqtt->close();
function procmsg($topic, $value)
{
    $time = time();
    print $topic . " " . $value . "\n";
}
