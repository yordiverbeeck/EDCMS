<?php 
require 'src/init.php';
loginRequired();
include TEMPLATE."/head.php";

$imagePath="../edcms_images/";

?>
</head>
<body>
<?php include_once TEMPLATE.'/nav.php'; ?>

<?php
	// EDITOR's view
	//get all images
	// -> option to go to editImage.php
	$sql="SELECT * FROM `field_image`";
	$rows=query($sql);
	
?>

<div class="ui main container">
	<h1>Edit text</h1>
	<div class="ui link cards">
	<?php 
		foreach ($rows as $row) {
			echo '<a href="editImage.php?id='.$row['FIId'].'" class="card">
					<div class="image">
						<img src="'.$imagePath.$row['FIName']."?".rand(1,32000).'">
					</div>
					<div class="content">
						<div class="header">'.$row['FITitle'].'</div>
					</div>
					<div class="extra content">
						<span class="right floated">
							<i class="edit icon"></i>
							Edit Image
						</span>
					</div>
				</a>';



		};

	 ?>
		
	</div>
</div>


<?php
include_once(TEMPLATE."/foot.php"); ?>