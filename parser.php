<?php
	
	include_once('lib/curl_query.php');
	include_once('lib/simple_html_dom.php');

		$link = json_decode($_POST["link"], true);
		$url = strip_tags($link);
	
	$html = curl_get($url);
	$dom = str_get_html($html);
	
	$title = $dom->find('title');
	$description = $dom->find('meta[name="description"]');
	$images = $dom->find('img');
	
	foreach($images as $image){
		$resp = array(
			$image->src,
			 $title,
			  $description
		);
		$response = json_encode($resp);
		echo $response; 		
	}
	
	?>
	
	
