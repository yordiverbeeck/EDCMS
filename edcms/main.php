<?php 
include_once('/src/init.php');
loginRequired();
include TEMPLATE."/head.php";

?>
</head>
<body>
<?php include_once TEMPLATE.'/nav.php'; ?>

<div class="ui text container">
	<h1>Welcome!</h1>
	<p>Thank you for installing EDCMS. 
	<br>This is still a big work in progress so make sure to check for updates regularly!</p><br>
	<h2>Libraries</h2>
	<p>EDCMS uses several libraries such as:</p>
	<ul>
		<li><a href="https://semantic-ui.com/" title="Semantic-ui">Semantic-ui</a></li>
		<li><a href="https://alex-d.github.io/Trumbowyg/" title="">Trumbowyg</a></li>
		<li><a href="http://fontawesome.io/license" title="">Font Awesome</a></li>
		<li><a href="http://www.daniel.com.uy/projects/jquery-file-uploader/" title="">Jquery File Uploader</a></li>
		<li><a href="https://github.com/scottcheng/cropit" title="">Cropit</a></li>
		<li><a href="https://github.com/kylefox/jquery-tablesort" title="">jQuery Tablesort</a></li>
	</ul>
	<br>
	<h2>Declaration of people:</h2>
	<p>CREATOR: The person who CREATES fields/images and writes the whole website. 
	<br>EDITOR: The person who EDITS the fields and images.
	<br>VIEWER: The person who VIEWS the website.</p>
	
</div>

<?php
include_once(TEMPLATE."/foot.php"); ?>
