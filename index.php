<?php
require "phpMQTT.php";
  echo "Connect11\n\n";

  $client_id = "Client-".rand();

$mqtt = new phpMQTT("m16.cloudmqtt.com", 14303, $client_id);
if (!$mqtt->connect()) {
    exit(1);
}
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
