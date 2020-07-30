<?php
    require_once('authorize.php');
	require_once('connectVars.php');
	require_once('header.php');

	echo'<a href="index.php">Go to Blog</a>';

	//This function generates a table containing all existing posts and links to remove those posts
    function removePost()
    {
		echo'<h2>Select Post for Removal</h2>';
		
		//connect to database
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME)
				or die("Could not connect to DB");

		$query = "SELECT * FROM " . TABLE_NAME . " ORDER BY id DESC";

		$data = mysqli_query($dbc, $query)
				or die("Could not query database");

		echo'<table class="table">';
		echo'<thead><tr><th><strong>Title</strong></th><th><strong>Entry</th><th><strong>Entry Date</strong></th></tr></thead>';
		echo'<tbody>';

		//loop through data and display in table. Generate removal links for each row.
		while($row = mysqli_fetch_array($data))
		{
			echo'<tr><td>' . $row['title'] . '</td>';
			echo'<td><em>' . substr($row['entry'], 0, 50) . '</em></td>';
			echo'<td>' . $row['entry_date'] . '</td>';
			echo'<td><a href="removePost.php?id=' . $row['id'] . '&amp;title='
					. $row['title'] . '">Remove Post</a>';
			echo '</td></tr>';
		}
		echo'</tbody>';
		echo"</table>";

		mysqli_close($dbc)
				or die("Couldn't close DB connection");
	}

	//This function generates a form to enter a new blog post
	function addPost()
	{
		echo'<h2>Add New Post</h2>';
		echo'<form action="addPost.php" method="post">';
		echo'<div class="form-group">';
		echo'<label for="title">Title</label>';
		echo'<input type="text" id="title" class="form-control" name="title">';
		echo'<br>';
		echo'<label for="entry">Entry</label>';
		echo'<textarea maxlength="1500" id="entry" class="form-control" name="entry"></textarea>';
		echo'<br>';
		echo'<input type="submit" name="submit" class="btn" value="Post Entry">';
		echo'</form>';
	}
	addPost();
	removePost();
	require_once('footer.php');
?>