<?php
    require_once('authorize.php');
    require_once('connectVars.php');
    require_once('header.php');

    if (isset($_GET['id']) && isset($_GET['title']))
    {
        $id = $_GET['id'];
        $title = $_GET['title'];
    }

    //if user confirms delete, delete post. If not, do not delete
    if (isset($_POST['submit']))
    {
        if ($_POST['confirm'] == 'Yes')
        {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME)
                or die("Could not connect to database from removal script");

            $query = "DELETE FROM " . TABLE_NAME . " WHERE id = " . $_POST['id'];

            mysqli_query($dbc, $query)
                or die(mysqli_error($dbc));

            echo '<p>The post titled<strong> ' . $_POST['title'] . '</strong> has been deleted.';
        }
        else
        {
            echo '<p class="error">Blog post not removed</p>';
        }
    }
    //if user is just coming to this page, show post details along with a yes/no confirmation
    else if (isset($id) && isset($title))
    {
        echo '<p>Are you sure you want to delete this?</p>';
        echo '<p>Title: ' . $title . '</p>';
        echo '<form method="post" action="removePost.php">';
        echo '<div class="form-group">';
        echo '<input type="radio" name="confirm" value="Yes"> Yes';
        echo '<input type="radio" name="confirm" value="No" checked="checked"> No<br>';
        echo '<input type="submit" class="btn" value="Submit" name="submit">';

        echo '<input type="hidden" name="id" value="' . $id . '">';
        echo '<input type="hidden" name="title" value="' . $title . '">';
        echo '</form>';
    }

    echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
    echo '<a href="index.php">blog</a>';

    require_once('footer.php');
?>