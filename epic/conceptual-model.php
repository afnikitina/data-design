<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Conceptual Model</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="../styles/style.css">
	</head>
	<body>
		<header>
			<h1>Conceptual Model</h1>
			<nav>
				<a href="./jen-smith.php">Meet Jen Smith</a> |
				<a href="./use-case.php">User Story, Use Cases & Interaction Flow</a> |
				<a href="./conceptual-model.php">Conceptual Model</a>
			</nav>
		</header>
		<main>
			<h2>Entities & Attributes</h2>
			<div>
				<h3>User</h3>
				<ul>
					<li>userId (Primary Key)</li>
					<li>userEmail</li>
					<li>userHash</li>
					<li>userName</li>
				</ul>
			</div>
			<div>
				<h3>Article</h3>
				<ul>
					<li>articleId (Primary Key)</li>
					<li>articleAuthor</li>
					<li>articleContent</li>
					<li>articleDate</li>
					<li>articleTitle</li>
					<li></li>
				</ul>
			</div>
			<div id="comment">
				<h3>Comment</h3>
				<ul>
					<li>commentId (Primary Key)</li>
					<li>commentArticleId (Foreign Key)</li>
					<li>commentUserId (Foreign Key)</li>
					<li>commentContent</li>
					<li>commentDate</li>
				</ul>
			</div>
			<div>
				<h3>Relations</h3>
				<ul>
					<li>Many different users can post multiple comments about many different articles <code>(n-to-m)</code></li>
				</ul>
			</div>
		</main>
		<footer>
		</footer>
	</body>
</html>