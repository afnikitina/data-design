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
					<li>userName</li>
					<li>userEmail</li>
					<li>userPassword (encrypted)</li>
					<li>userRegistrationDate</li>
					<li>userNumberOfComments</li>
				</ul>
			</div>
			<div>
				<h3>Comment</h3>
				<ul>
					<li>commentId (Primary Key)</li>
					<li>commentUserId (Foreign Key)</li>
					<li>commentDate</li>
					<li>commentLength</li>
					<li>commentNumberOfLikes</li>
				</ul>
			</div>
			<div>
				<h3>Relations</h3>
				<ul>
					<li>One user can leave multiple comments about many different articles <code>(1-to-n)</code></li>
					<li>Each particular comment is written by only one particular user <code>(1-to-1)</code></li>
				</ul>
			</div>
		</main>
		<footer>
		</footer>
	</body>
</html>