<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

include 'es_hosts.php';


$client = ClientBuilder::create()
                    ->setHosts($hosts)
                    ->build();


$params = [
    'index' => 'employees',
    'type' => 'employee',
    'body' => [
        'query' => [
            'wildcard' => [
                'last_name' => '*'
            ]
        ]
    ]
];

$response = $client->search($params);

$hits = count($response['hits']['hits']);
$result = null;
$i = 0;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Employees</title>
<link rel="stylesheet" type="text/css" href="/media/view.css" media="all">
<script type="text/javascript" src="/media/view.js"></script>

</head>
<body id="main_body" >

	<img id="top" src="/media/top.png" alt="">
	<div id="form_container">
    <h2>Employee list</h2>
			<ul >
<?php
  while ($i < $hits) {
    $result = $response['hits']['hits'][$i]['_source'];
    print('<li>' . $result['first_name'] . ' ' . $result['last_name'] .  '</li>');
    $i++;
  }
?>
		<div>
      <a href=/>New Employee</a>
		</div>
		</li>
			</ul>
		</form>
	</div>
	<img id="bottom" src="/media/bottom.png" alt="">
	</body>
</html>
