<?php 
include("includes/functions.php");
include("includes/data.php");

$pageTitle = "Mcnoble Media Library";
$section = null;

include("includes/header.php"); ?>

	<section class="section catalog random">
		<div class="wrapper">
			<h2>May we suggest something?</h2>
			<ul class="items">
				<?php 
				$random = array_rand($catalog, 4);
				foreach ($random as $id) {
			 	echo get_item_html($id, $catalog[$id]);
			} 
			 ?>	
			</ul>
		</div>
	</section>
<?php include("includes/footer.php"); ?>