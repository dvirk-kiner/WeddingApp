<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang=he>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bar&Dvir Wedding app</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <meta property="og:title" content="החתונה של בר ודביר - אפליקצית תמונות"/>
    <meta property="og:description" content="ארבע עונות - 1.10.17"/>
    <meta property="og:image" content="http://baranddvirwedding.com/images/img_bg2_23.jpg"/>
    <meta property="og:url" content="http://app.baranddvirwedding.com"/>

    <link rel="icon" href="http://baranddvirwedding.com/icons/like.png">
</head>
<body dir="rtl">
<script>
$(document).ready(function(){
    $("#loading").hide();
    $("#imgUploadFile").change(function(event){
	    var file_data = $('#imgUploadFile').prop('files')[0];   
	    var form_data = new FormData();                  
	    form_data.append('file', file_data);                        
	    $.ajax({
        	        url: 'upload.php', // point to server-side PHP script 
                	dataType: 'text',  // what to expect back from the PHP script, if anything
	                cache: false,
        	        contentType: false,
                	processData: false,
	                data: form_data,                         
        	        type: 'post',
        	        beforeSend: function(){
        	        	$("#loading").show();
        	        },
                	success: function(response){
        	            $("#loading").hide();
        	            if(response == "SUCCESS")
	        	        alert("התמונה עלתה בהצלחה! תודה");
	        	    else
	        	    	alert(response);
        	        },
        	        error: function(xhr, ajaxOptions, thrownError){
           	            $("#loading").hide();
        	      	    alert("כישלון בהעלאת התמונה. אנא נסה שנית");   
        	        }
               });
     });
});     
    
    // 
    
</script>
<form method="post" id="imgUpload" enctype="multipart/form-data" action="upload.php">
    <div class="container">
        <div class="btn btn-info btn-img" alt="בחר תמונה">
            <span>העלה תמונה</span>
            <input id="imgUploadFile" name="imgUploadFile" type="file" accept="image/*" capture="camera">
        </div>
    </div>
</form>


<div class="loader" id="loading"></div>


</body>
</html>