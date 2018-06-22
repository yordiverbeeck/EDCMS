<?php 
require 'src/init.php';
loginRequired();
include TEMPLATE."/head.php";
if(empty($_GET['id']) OR !is_numeric($_GET['id'])){
	redirect("index.php");
}else{
	$textId=$_GET['id'];
}
?>

</script>
<script src="js/trumbowyg/trumbowyg.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/trumbowyg/ui/trumbowyg.min.css">
<script type="text/javascript">
	$(document).ready(function() {
		$('body').dimmer({'variation':'inverted'});
		$('textarea').trumbowyg({
			lang:'en',
			autogrow:true,
			btns: [
				['viewHTML'],
				['bold', 'italic','underline'],
				['link'],
				'btnGrp-justify',
				['removeformat']
			],
			semantic:true,
			resetCss:true,
			removeformatPasted: true
		});

		$('textarea').trumbowyg().on('tbwfocus', function(){ 
			$('body').dimmer('show');
		}).on('tbwblur', function(){ 
			$('body').dimmer('hide');
		});

		$(document).on('click', '.ui.positive.button', function(event) {
			event.preventDefault();
			$.ajax({
				url: 'editHandler.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					textId: <?php echo $textId; ?>,
					textNew:$("div.trumbowyg-editor").html(),
					type:"text"
				}
			})
			.done(function(data) {
				if(data.hasOwnProperty("error")){
                    console.log(data.error);
                }else if(data.hasOwnProperty("success")){
                    $('.ui.positive.button').popup({
						content : 'Saved!',
						position:"bottom center",
						hoverable:false,
						inline: true,
						on:"manual"
					}).popup('show');
					setTimeout(function(){
						$('.ui.positive.button').popup('hide');
					},2000);
                }
			});
		});
	});
</script>
<style type="text/css">
	.ui.piled.segments.menu{
		z-index: 120;
	}
	.ui.dimmer.page{
		z-index: 110;
	}
</style>
</head>
<body>
<?php include_once TEMPLATE.'/nav.php'; ?>

<?php
	$sql="SELECT * FROM `field_text` WHERE `FTId`='$textId' LIMIT 1";
	$rows=query($sql);
	if($rows==false){
		echo "Not Found...";
	}

?>
<script type="text/javascript">
	$(document).ready(function() {
		$('textarea').trumbowyg('html', "<?php echo $a; ?>");
	});
</script>

<div class="ui text container">
	<h1>Edit text of <?php echo $rows[0]["FTTitle"]; ?></h1>
	<div class="ui piled segments menu">
		<textarea><?php echo $rows[0]['FTText']; ?></textarea>
	</div>

	<!-- save button -->
	<div class="ui buttons">
		<button class="ui button">Cancel</button>
		<div class="or"></div>
		<button class="ui positive button">Save</button>
	</div>
</div>



<?php
include_once(TEMPLATE."/foot.php"); ?>