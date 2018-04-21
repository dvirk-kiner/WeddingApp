<?php

$pic = scandir(dirname(__FILE__).'/images', SCANDIR_SORT_DESCENDING);
	$count = ceil( count($pic));
        $filePtr = fopen('imagesNames.txt','w')or die("Unable to open file!");
        for ($i=0; $i< $count;$i++){
            if($pic[$i]=='.'||$pic[$i]=='..')
                continue;
            fwrite($filePtr,$pic[$i].'\n');
        }
        fclose($filePtr);
        chmod('imagesNames.txt',0755);
?>