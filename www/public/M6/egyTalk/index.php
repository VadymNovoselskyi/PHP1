<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M6 | EgyTalk</title>
</head>

<body>
    <a href="login.html">Log in</a> <br>
    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        echo "<h1> Hello " .  $_SESSION['username'] . "</h1>";
        echo "<h3>Your name " . $_SESSION['name'] . "</h3>";
        ?>

<form method="post" action="api/auth.php">
    <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
    <input type="hidden" name="password" value="<?php echo $_SESSION['password']; ?>">
    <input type="submit" value="auth.php">
</form>
<a href="api/getPosts.php">getPosts.php</a>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php?action=writePost">Post a post</a></li>
    <li><a href="index.php?action=userPosts">Your posts</a></li>
    <li><a href="index.php?action=allPosts">All posts</a></li>
</ul>

<br> <br>

<?php

if (isset($_GET['action'])) {
    $page = $_GET['action'];

    include('model/dbEgyTalk.php');
    $db = new dbEgyTalk();

    switch ($page) {
        case 'post':
            $db->post($_SESSION['uid'], filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS));
            header('Location: index.php?action=userPosts');
            break;

        case 'writePost':
            echo '
            <form method="post" action="index.php?action=post">
            <fieldset>
                    <legend>Post</legend>
                    <label>Text post</label>
                    <textarea name="post" rows="6" cols="20"></textarea> <br><br>
                    <input type="submit" value="Post it!">
                </fieldset>
            </form>
            ';
            break;

        case 'userPosts':
            $posts = $db->getUserPosts($_SESSION['uid']);

            echo "<fieldset>
                    <legend><strong>Your Posts</strong></legend>
                ";

            foreach ($posts as $post) {
                echo "<hr> <h3>From: " . $_SESSION['username'] . "</h3>";
                echo "<p>" . $post['post_txt'] . "</p> <br>";
                echo "<h4>" . $post['date'] . "</h4>";
                echo "<a href='index.php?action=postInteract&pid=" . $post['pid'] . "'>Interact</a>";
            }

            echo "</fieldset>";
            break;

        case 'allPosts':
            $posts = $db->getAllPosts();

            echo "<fieldset>
                    <legend><strong>All Posts</strong></legend>
                ";

            foreach ($posts as $post) {
                echo "<hr> <h3>From: " . $post['username'] . "</h3>";
                echo "<p>" . $post['post_txt'] . "</p> <br>";
                echo "<h4>" . $post['date'] . "</h4>";
                echo "<a href='index.php?action=postInteract&pid=" . $post['pid'] . "'>Interact</a>";
            }

            echo "</fieldset>";
            break;

        case 'postInteract':
            $_SESSION['pid'] = $_GET['pid'];
            $post = $db->getPost($_GET['pid']);
            $comments = $db->getComments($_GET['pid']);

            echo "<fieldset>
            <legend><strong>Post</strong></legend>
            ";

            echo "<h3>From: " . $post['username'] . "</h3>";
            echo "<p>" . $post['post_txt'] . "</p> <br>";
            echo "<h4>" . $post['date'] . "</h4>";

            echo "<fieldset>
                    <legend><strong>All comments</strong></legend>
                ";

            foreach ($comments as $comment) {
                echo "<hr> <h4>From: " . $comment['username'] . "</h4>";
                echo "<p>" . $comment['comment_txt'] . "</p>";
                echo "<h5>" . $comment['date'] . "</h5>";
            }

            echo "</fieldset> <br>";

            include("inc/comment.html");

            echo "</fieldset>";
            break;
        
        case 'comment':
            if($_POST['comment'] != '') $db->postComment($_SESSION['pid'], $_SESSION['uid'],  $_POST['comment']);
            header("Location: index.php?action=postInteract&pid=" . $_SESSION['pid']);   
            break;

        default:
            }
        }
    } else echo "<h1> No good </h1>";
    ?>
</body>

</html>