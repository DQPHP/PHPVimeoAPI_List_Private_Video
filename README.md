# PHPVimeoAPI_List_Private_Video
List private videos from Vimeo

1) Modify config.json info vimeo account;
2) Access video.php and add vimeo_video_id get param. Ex: localhost/vimeo/video.php?id=123123123

Default options:

//new size
$new_size = 'width="420" height="220"';

//autoplay
$embed = str_replace('player_id=0', 'player_id=0&autoplay=1', $embed);

//add line comments for off

<Html>

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

Leandro
Contact: leandrocfe@gmail.com (+55) 16 9 97249529
