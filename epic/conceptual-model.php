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
					<li><span>userId (Primary Key)</span></li>
					<li>userEmail</li>
					<li>userHash</li>
					<li>userName</li>
				</ul>
			</div>
			<div>
				<h3>Article</h3>
				<ul>
					<li><span>articleId (Primary Key)</span></li>
					<li>articleAuthor</li>
					<li>articleContent</li>
					<li>articleDate</li>
					<li>articleTitle</li>
					<li></li>
				</ul>
			</div>
			<div id="old">
				<h3>Comment (Old Design)</h3>
				<ul>
					<li><span>commentId (Primary Key)</span></li>
					<li>commentArticleId (Foreign Key)</li>
					<li>commentUserId (Foreign Key)</li>
					<li>commentContent</li>
					<li>commentDate</li>
				</ul>
				<a href="./erd1.svg">ERD - Old Design</a>
			</div>
			<div id="new">
				<h3>Comment (New Design)</h3>
				<ul>
					<li><span>commentArticleId (Foreign Key)</span></li>
					<li><span>commentUserId (Foreign Key)</span></li>
					<li>commentContent</li>
					<li>commentDate</li>
				</ul>
				<a href="./erd2.svg">ERD - New Design in Crow’s Foot Notation</a>
				<a href="./erd2.svg">ERD - New Design With Intersection Tables</a>
			</div>
			<div>
				<h3>Relations</h3>
				<ul>
					<li>Many different users can post multiple comments about many different articles <code>(n-to-m)</code></li>
				</ul>
			</div>
			<div>
				<h3>Legend</h3>
				<ul>
					<li><span>Primary Key/Composite Primary Key</span></li>
				</ul>
			</div>
		</main>
		<footer>
		</footer>
	</body>
</html>