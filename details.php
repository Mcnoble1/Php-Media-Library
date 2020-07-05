<?php 
include("includes/data.php");
include("includes/functions.php");

// To display the details of each library document
if (isset($_GET["id"])) {
	$id = $_GET["id"];
	if (isset($catalog[$id])) {
		$item = $catalog[$id];
	}
}
// A redirect in case item selected is not in our catalogue
if (!isset($item)) {
	header("location:catalog.php");
	exit;
}

$pageTitle = $item["title"];
$section = null;

include("includes/header.php"); ?>

<section class="section page">
	<div class="wrapper">
		<div class="breadcrumbs">
			<a href="catalog.php">Full Catalog</a>
			&gt; <a href="catalog.php?cat=<?php echo $item["category"]; ?>"><?php echo strtolower($item["category"]); ?></a>
			&gt; <?php echo $item["title"]; ?>
		</div>
		<div class="media-picture">
			<span>
				<img src="<?php echo $item['img'] ?>" alt="<?php echo $item['title'] ?>" />
			</span>
		</div>
		<div class="media-details">
			<h1>
				<?php echo $item["title"]; ?>
			</h1>
			<table>
			<tr>
				<th>Category</th>
				<td><?= $item["category"]; ?></td>
			</tr>
			<tr>
				<th>Genre</th>
				<td><?= $item["genre"]; ?></td>
			</tr>
			<tr>
				<th>Format</th>
				<td><?= $item["format"]; ?></td>
			</tr>
			<tr>
				<th>Year</th>
				<td><?= $item["year"]; ?></td>
			</tr>

			<?php
			if (strtolower($item["category"]) == strtolower("books")) {
			?>
			 <tr>
				<th>Authors</th>
				<td><?= implode(", ", $item["authors"]); ?></td>
			</tr>
			<tr>
				<th>Publisher</th>
				<td><?= $item["publisher"]; ?></td>
			</tr>
			<tr>
				<th>ISBN</th>
				<td><?= $item["isbn"]; ?></td>
			</tr>
			<?php
			 } else if (strtolower($item["category"]) == strtolower("movies")) {
			?>
			<tr>
				<th>Director</th>
				<td><?= $item["director"]; ?></td>
			</tr>
			 <tr>
				<th>Writers</th>
				<td><?= implode(", ", $item["writers"]); ?></td>
			</tr>
			<tr>
				<th>Stars</th>
				<td><?= implode(", ", $item["stars"]); ?></td>
			</tr>
			<?php
			 } else if (strtolower($item["category"]) == strtolower("music")) {
			?>
			<tr>
				<th>Artist</th>
				<td><?= $item["artist"]; ?></td>
			</tr>
			<?php
			 } ?>
		</table>
		</div>
	</div>	
</section>

<?php 
include("includes/footer.php");
?>