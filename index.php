<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

include 'es_hosts.php';

$first_name = '';
$last_name = '';

if ( isset( $POST['first_name'] ) && isset( $POST['last_name'] ) ) {
  $first_name = $POST['first_name'];
  $last_name = $POST['last_name'];

  $client = ClientBuilder::create()
                      ->setHosts($hosts)
                      ->build();


  $params = [
      'index' => 'employees',
      'body' => ['first_name' => $first_name, 'last_name' => $last_name]
  ];

  $response = $client->index($params);

}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>New Employee</title>
<link rel="stylesheet" type="text/css" href="/media/view.css" media="all">
<script type="text/javascript" src="/media/view.js"></script>

</head>
<body id="main_body" >

	<img id="top" src="/media/top.png" alt="">
	<div id="form_container">

		<h1><a>New Employee</a></h1>
		<form id="form_46806" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>New Employee</h2>
			<p>Add new employee to the database</p>
		</div>
			<ul >

					<li id="li_1" >
		<label class="description" for="element_1">First Name </label>
		<div>
			<input id="first_name" name="first_name" class="element text medium" type="text" maxlength="255" value=""/>
		</div>
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Last Name </label>
		<div>
			<input id="last_name" name="last_name" class="element text medium" type="text" maxlength="255" value=""/>
		</div>
		</li>

					<li class="buttons">
			    <input type="hidden" name="form_id" value="46806" />

				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>
	</div>
	<img id="bottom" src="/media/bottom.png" alt="">
	</body>
</html>
