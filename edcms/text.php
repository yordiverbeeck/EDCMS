<?php 
require 'src/init.php';
loginRequired();
include TEMPLATE."/head.php";

?>
</head>
<body>
<?php include_once TEMPLATE.'/nav.php'; ?>

<?php
	// EDITOR's view
	//get all textfields
	// -> option to go to editText.php
	$sql="SELECT * FROM `field_text`";
	$rows=query($sql);
	
?>

<div class="ui text container">
	<h1>Edit text</h1>
	<div class="ui piled segments menu">
	<?php 
		foreach ($rows as $row) {
			echo '<a href="editText.php?id='.$row['FTId'].'" class="ui blue segment">';
			echo $row['FTTitle'];
			echo '<div class="ui right floated button">'.substr($row['FTText'],0,50);
			if(strlen($row['FTText'])>=50){echo "...";};
			echo'</div>';
			echo '</a>';
		}

	 ?>
		
	</div>
</div>

<?php
include_once(TEMPLATE."/foot.php"); ?>