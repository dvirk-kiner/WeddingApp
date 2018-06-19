<?php

// error_reporting(1);
// ini_set('display_errors', 1);

function compress_image($source_url, $destination_url, $quality) {

    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source_url);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source_url);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source_url);

    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
}

if (isset($_FILES["file"]))
{
    define('KB', 1024);
    define('MB', 1048576);
    $file = $_FILES["file"];
    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];
    $fileType = $file["type"];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed))
    	if($fileError === 0)
    		if( $fileSize < (10 * MB) ) 
		    {
        	        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                	$fileDestination = 'images/' . $fileNameNew;
	                $try = dirname(__FILE__).'/'.$fileDestination;
        	        compress_image($fileTmpName,$fileDestination,75);
                	$p = chmod($try,0755);
                	echo "SUCCESS";
		    }
		else
			echo "הקובץ גדול מדי";
	else
		echo "שגיאה בקובץ";
    else
    	echo "הסיומת של הקובץ אינה תקינה";
}
else
	echo "לא נקלט שום קובץ";
?>
