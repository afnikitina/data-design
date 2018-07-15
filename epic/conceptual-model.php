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
			<div>
				<h3>Comment</h3>
				<ul>
					<li><span>commentId (Primary Key)</span></li>
					<li>commentArticleId (Foreign Key)</li>
					<li>commentUserId (Foreign Key)</li>
					<li>commentContent</li>
					<li>commentDate</li>
				</ul>
			</div>
			<div>
				<h3>Entity Relationship Diagram Using Crow’s Foot Notation</h3>
				<img src="../images/erd1.jpg" alt="Crow’s Foot Notation">
			</div>
			<div>
				<h3>Entity Relationship Diagram Using Intersection Tables</h3>
				<img src="../images/erd5.jpg" alt="ERD Using Intersection Tables">
			</div>
			<div>
				<h3>Relations</h3>
				<ul>
					<li>Many different users can post multiple comments about many different articles <code>(n-to-m)</code></li>
					<li>Each user can post from none to many comments.</li>
					<li>Each article can have from none to many comments about it.</li>
					<li>Each comment references only one user who posted it and only one article, which this comment is about.</li>
				</ul>
			</div>
			<div>
				<h3>Assumption</h3>
				<ul>
					<li>A user can post multiple comments about the same article (multiple instances of the <strong>Comment</strong> entity may have exactly the same combination of their foreign keys).</li>
				</ul>
			</div>
			<div>
				<h3>Legend</h3>
				<ul>
					<li><span>Primary Key</span></li>
				</ul>
			</div>
		</main>
		<footer>
		</footer>
	</body>
</html>