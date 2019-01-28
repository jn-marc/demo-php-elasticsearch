<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

include 'es_hosts.php';


$client = ClientBuilder::create()
                    ->setHosts($hosts)
                    ->build();



$params = [
    'index' => 'my_index',
    'type' => 'my_type',
    'id' => 'my_id'
];

$response = $client->get($params);
print_r($response);


?>
