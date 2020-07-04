<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageTitle ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<header class="header">
		<nav class="wrapper">
			<h1 class="branding-title"><a href="./">Mcnoble Media Library</a></h1>
			<ul class="nav">
                <li class="books <?php if($section == "books") { echo " on"; } ?>"><a href="catalog.php?cat=books">Books</a></li>
                <li class="movies <?php if($section == "movies") { echo " on"; } ?>"><a href="catalog.php?cat=movies">Movies</a></li>
                <li class="music <?php if($section == "music") { echo " on"; } ?>"><a href="catalog.php?cat=music">Music</a></li>
                <li class="suggest <?php if($section == "suggest") { echo " on"; } ?>"><a href="suggest.php">Suggest</a></li>
            </ul>
		</nav>
	</header>
	<div id="content">