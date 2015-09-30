<?php 

$open_file = fopen("links.html", 'r') or die("Unable to open file!");

$arr = explode(("\n"), file_get_contents('links.html'));

for($i=0; $i < count ($arr);$i++){
	echo '<hr>';
	echo $arr[$i];

echo '<br>';

$file_string = file_get_contents($arr[$i]);


	preg_match('/<title>(.*)<\/title>/i', $file_string, $title);
		$title_out = $title[1];

	preg_match('/<meta name="keywords" content="(.*)" \/> /i', $file_string, $keywords);
		$keywords_out = $keywords[1];

	preg_match('/<p><b>(.*)<\/p>/i', $file_string, $description);
		$description_out = $description[1];

		if($description_out ==NULL){
			preg_match('/<p><b>(.*)<\/b>/i', $file_string, $description);
			$description_out = $description[1];
				}

		$data = "<b>"."Title: "."</b>".$title_out."<br>"."<b>"." Description:"."</b> ".$description_out;

		//var_dump($data);
?>

<p><?php echo $data; ?></p>
<br>
	<?php 

$myfile = fopen("file.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $data);

} ?>
