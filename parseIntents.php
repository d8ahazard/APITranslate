<?php
ini_set("max_execution_time",3000);
$files = scandir('intents/');
$lang = $_GET['lang'] ?? "ja";
$j = 0;
$json = "";
foreach($files as $file) {
	$newFile = substr($file,0,strlen($file)-8)."_".$lang.".json";
	if (!file_exists(dirname(__FILE__)."/$newFile")) {
	    if ($file !== "." && $file !== ".." && preg_match("/_en.json/",$file)) {
	        echo "<i>$file:</i><br><br>";
	        echo "";
	        $json = json_decode(file_get_contents('intents/'.$file), true);
	        $i = 0;
	        $newJson = [];
	        foreach ($json as &$item) {
	            $newItem = $item;
	            $data = $item['data'];
	            $newData = [];
	            foreach($data as &$ob) {
	                $ob2 = $ob;
	                $text = trim($ob['text']);
	                if ($text) {
	                    echo "Original: <b>".$ob['text']."</b><br>";
	                    //$text = "foo";
	                    $text = file_get_contents("http://rhaegar/translate/translate.php?text=".urlencode($text)."&lang=$lang");
	                    if (preg_match("/Fatal error/",$text)) die("Error talking to google.");
	                    echo "Replaced: <b>$text</b><br>";

	                    $ob2['text'] = $text;
	                    $i++;
	                }
	                array_push($newData,$ob2);
	            }
	            $newItem['data'] = $newData;
	            array_push($newJson,$newItem);
	        }

	        echo "<br><br>Input JSON: ".json_encode($json)."<br>";
	        echo "Output JSON: ".json_encode($newJson)."<br>";
	        $dir = dirname(__FILE__)."/intents";
	        $file=substr($file,0,strlen($file)-8)."_".$lang.".json";
	        $file2 = fopen($dir . '/' . $file,"w");

	        // a different way to write content into
	        // fwrite($file,"Hello World.");

	        fwrite($file2, json_encode($newJson,JSON_PRETTY_PRINT));

	        // closes the file
	        fclose($file2);
	    }
	}
    $j++;

}