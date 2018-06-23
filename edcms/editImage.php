<?php 
require 'src/init.php';
loginRequired();
include TEMPLATE."/head.php";

$imagePath="../edcms_images/";

if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
	redirect("index.php");
}else{
	$imageId=$_GET['id'];
}
?>
<script src="js/dmuploader.min.js"></script>
<script src="js/jquery.cropit.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<?php include_once TEMPLATE.'/nav.php'; ?>

<?php
	$sql="SELECT * FROM `field_image` WHERE `FIId`='$imageId' LIMIT 1";
	$rows=query($sql);
	if($rows==false){
		echo "Not Found...";
	}else{
		$row=$rows[0];
	}
?>

<script>
	$(document).ready(function() {
		$('.image-editor').cropit({
			allowDragNDrop:true,
			maxZoom:2,
			width: <?php echo $row['FI_X']; ?>, 
			height: <?php echo  $row['FI_Y']; ?>,
			smallImage:"stretch"
		});
		$('.image-editor').cropit("previewSize",{ width: <?php echo $row['FI_X']/2; ?>, height: <?php echo  $row['FI_Y']/2; ?> });
		$('.image-editor').cropit('exportZoom', 2);

		  //$('.image-editor').cropit();
        $(document).on('click', '#submit', function(event) {
        	event.preventDefault();
	        // Move cropped image data to hidden input
	        var imageData = $('.image-editor').cropit('export', {
				type: 'image/jpeg',
				quality: 1,
				originalSize: false,
			});
	        $('.hidden-image-data').val(imageData);
	       // alert(imageData);
	        if(imageData=="" || imageData==undefined){
		       alert("Image is empty!");
		    }else{
		    	$.ajax({
		    		dataType: "json",
					url:"imagehandler.php",
					data:{
						imageId: <?php echo $imageId; ?>,
						imageName: "<?php echo $row["FIName"]; ?>",
						base64: imageData
					},
					type:"post"
				}).done(function(returnData){
					console.log(returnData);
					if(returnData.status=="ok"){
						console.log("url: "+returnData.url);
						$("#preview").attr('src', returnData.url+"?"+new Date().getTime());
					}else{
						alert("Something went wrong with the upload.");
					}
				});
		    }
	        return false;
        });
	});
</script>	

<div class="ui text container">
	<div class="ui grid">
		<div class="eight wide column">
			<h1>Edit Image of ...</h1>
		</div>
		<div class="eight wide column">
			<p id="imageInfo"><?php echo "Will be exported to size: X: <b>".$row['FI_X']."</b> Y: <b>".$row['FI_Y']."</b>"; ?></p>
		</div>
	</div>

	<div class="ui grid">
		<div class="sixteen wide column">
			<div class="image-editor">
				<input type="file" class="cropit-image-input">
				<div class="cropit-preview"></div>
				<div class="image-size-label">
				Zoom
				</div>
				<input type="range" class="cropit-image-zoom-input">
				<input type="hidden" name="image-data" class="hidden-image-data" />
			</div>
		</div>
		<div class="sixteen wide column">
			<div class="ui buttons">
				<button class="ui button">Cancel</button>
				<div class="or"></div>
				<button id="submit" class="ui positive button">Upload</button>
			</div>
			<p>Uploading this image will remove the previous image.</p>
		</div>
		<div class="sixteen wide column">
			<div id="result">
				<code id="result-data"></code>
			</div>
		</div>

		<div class="sixteen wide column">
			<img data-name="<?php echo $row['FIName']; ?>" src="<?php echo $imagePath.$row['FIName']."?".rand(1,32000); ?>" id="preview">
		</div>
	</div>
</div>


<?php
include_once(TEMPLATE."/foot.php"); ?>