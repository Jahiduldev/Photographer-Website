<!DOCTYPE html>
<!--
Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta charset="utf-8">
	<title>CKEditor Sample</title>
	<script src="ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
	
	
	<script type='text/javascript'>
    $('#editor').click(function() {
        $.post("index.php", { 
            id: $(this).attr('id') 
        }, function(response) {
            alert(response);
        });
    });
</script>
</head>
<body id="main">

<?php 
if(isset($_REQUEST["send"])){
	
	echo $sub = $_POST["subject"];

	}
?>
    <form action="" method="post">


	<textarea id="editor" rows="1" name="subject" cols="100" class="text"></textarea> 
	
    <span style="float:right;"><input type="submit" name="send" value="Send" />
	
    </form>



<script>
	initSample();
</script>

</body>
</html>
