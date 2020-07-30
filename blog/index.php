<?php
    require_once('connectVars.php');
    require_once('generateLinks.php');
    require_once('header.php');

    // echo'<a href="admin.php">admin</a>';

    //connect to database and display all existing blog entries
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME)
			or die("Could not connect to database from removal script");

    $query = "SELECT * FROM " . TABLE_NAME . " ORDER BY id DESC";

    $data = mysqli_query($dbc, $query)
            or die("Could not query database");

    $total = mysqli_num_rows($data);


    //set pagination variables
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $results_per_page = 6;
    $skip = (($page - 1) * $results_per_page);
    $num_pages = ceil($total / $results_per_page);


    $query .= " LIMIT $skip, $results_per_page";
    $result = mysqli_query($dbc, $query);

	while ($row = mysqli_fetch_array($result))
	{
		echo'<article class="card">';
        echo'<h2 class="card-header bg-info text-light">' . $row['title'] . '</h2>';
        //echo'<br>';
        echo'<div class="card-body">';
        echo'<p>' . $row['entry_date'] . '</p>';
        echo'<div class="well well-sm">';
        echo'<p>' . $row['entry'] . '</p>';
        echo'</div>';
        echo'</div>';
        echo'</article>';
        echo'<hr>';
    }
    
    //if number of posts exceeds max, begin pagination
    if ($num_pages > 1)
    {
        echo generateLinks($page, $num_pages);
    }

    mysqli_close($dbc);

    require_once('footer.php');
?>


