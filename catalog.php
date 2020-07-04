<?php 
include("includes/data.php");
$pageTitle = "Full Catalog";
$section = null;

// To display the different categories of my library documents
if (isset($_GET["cat"])) {
	if ($_GET["cat"] == "books") {
		$pageTitle = "Books";
		$section = "books";
	} else if ($_GET["cat"] == "movies") {
		$pageTitle = "Movies";
		$section = "movies";
	} else if ($_GET["cat"] == "music") {
		$pageTitle = "Music";
		$section = "music";
	} 
}
include("includes/header.php"); ?>
	<section class="section catalog page">	
		<div class="wrapper">
			<h1><?= $pageTitle ?></h1>
			<!-- To display each item of the catalog in my library  -->
			<ul class="items">
			<?php 
				foreach ($catalog as $item) {
			 	echo "<li><a href='#'><img src='" 
			 	. $item["img"] . "' alt='" 
			 	. $item["title"] . "' />"
			 	."<p>View Details</p>"
			 	."</a></li>";
			} 
			 ?>	
			</ul>


		</div>		
	</section>
<?php include("includes/footer.php") ?>