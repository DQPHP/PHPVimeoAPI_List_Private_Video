<?php

//utf-8
header('Content-Type: text/html; charset=utf-8');

//lib vimeo
use Vimeo\Vimeo;

//métodos de inicialização
$config = require(__DIR__ . '/init.php');

//vimeo video id
@$id = $_GET["id"];

//isset get
if(isset($id)){
	
	// vimeo class send config.json paramns
	$lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);

	//get data vimeo video
	$me = $lib->request("/me/videos/$id");

	//iframe vídeo
	$embed = $me["body"]["embed"]["html"];

	//edit video size
	$default_size = 'width="'.$me["body"]["width"].'" height="'.$me["body"]["height"].'"';
	$new_size = 'width="420" height="220"';

	$embed = str_replace($default_size, $new_size, $embed);

	//autoplay
	$embed = str_replace('player_id=0', 'player_id=0&autoplay=1', $embed);

}else{

	echo("Not find get id video");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Vimeo Vídeo</title>
	</head>
	<body>
		<div><?php echo $embed ?></div>
		<div>
			<p><b>Name: </b><?php print_r($me["body"]["name"]); ?></p>
			<p><b>Description: </b><?php print_r($me["body"]["description"]); ?></p>
			<p><b>Link: </b><?php print_r($me["body"]["link"]); ?></p>
			<p><b>Likes: </b><?php print_r($me["body"]["embed"]["buttons"]["like"]); ?></p>
			<p><b>Data Created: </b><?php print_r($me["body"]["created_time"]); ?></p>
			<p><b>Data Modified: </b><?php print_r($me["body"]["modified_time"]); ?></p>
			<p><b>Images: </b>
				<?php print_r($me["body"]["pictures"]["uri"]); ?> |
				<?php print_r($me["body"]["pictures"]["sizes"][0]["link"]); ?> |
				<?php print_r($me["body"]["pictures"]["sizes"][1]["link"]); ?> |
				<?php print_r($me["body"]["pictures"]["sizes"][2]["link"]); ?> |
				<?php print_r($me["body"]["pictures"]["sizes"][3]["link"]); ?> |
				<?php print_r($me["body"]["pictures"]["sizes"][4]["link"]); ?> |
				<?php print_r($me["body"]["pictures"]["sizes"][5]["link"]); ?>
				</p>
		</div>
		<div><?php //print_r($me); //use for show all options ?></div>
	</body>
</html>