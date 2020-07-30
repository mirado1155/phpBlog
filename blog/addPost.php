<?php
    require_once('connectVars.php');
    require_once('header.php');

    //Displays blog entry for confirmation
    if (isset($_POST['submit']))
    {
        echo'<h2>Title</h2>';
        echo'<p>' . $_POST['title'] . '</p>';

        echo'<h2>Entry</h2>';
        echo'<p>' . $_POST['entry'] . '</p>';

        echo'<p>Are you sure you want to post this?</p>';
        echo'<form action="addPost.php" method="post">';
        echo'<input type="submit" name="yes" class="btn-sm" value="Yes">';
        echo'<input type="submit" name="no" class="btn-sm" value="No">';
        echo'<input type="hidden" name="title" value="' . $_POST['title'] . '">';
        echo'<input type="hidden" name="entry" value="' . $_POST['entry'] . '">';
        echo'</form>';
    }

    //User clicks 'yes' so the post is removed
    if (isset($_POST['yes']))
    {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME)
                or die("Could not connect to DB");

        if (!isset($_POST['title']))
        {
            $title = '';
        }
        else
        {
            $title = mysqli_real_escape_string($dbc, $_POST['title']);
        }
        

        if (!isset($_POST['entry']))
        {
            $entry = '';
        }
        else
        {
            $entry = mysqli_real_escape_string($dbc, $_POST['entry']);
        }
           
        $query = "INSERT INTO " . TABLE_NAME . " (title, entry, entry_date) VALUES ('" . $title
                . "', '" . $entry . "', NOW())";

        $newPost = mysqli_query($dbc, $query)
                or die("Could not post new entry :(");
        echo'<p>Entry ' . $_POST['title'] . ' Submitted! <a href="admin.php">Back to admin page</a></p>';
        echo'<a href="index.php">blog</a>';
    }
    else if (isset($_POST['no']))
    //user clicks 'no', so post is not removed
    {
        echo'<p>Entry not posted. <a href="admin.php">Back to admin page</a></p>';
        echo'<a href="index.php">blog</a>';
    }

    require_once('footer.php');
?>
