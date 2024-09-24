<?php
function getUserPosts()
{
    $db = include('../inc/egytalk_connect.php');
    $stmt = $db->prepare("SELECT post_txt, date FROM post WHERE uid = :uid ORDER By date DESC");

    $stmt->bindValue(":uid", $_SESSION['uid']);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllPosts()
{
    $db = include('../inc/egytalk_connect.php');
    $stmt = $db->prepare("SELECT user.username, post.post_txt, post.date, post.pid FROM user JOIN post ON user.uid = post.uid ORDER By post.date DESC;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPost($pid)
{
    $db = include('../inc/egytalk_connect.php');
    $stmt = $db->prepare("SELECT user.username, post.post_txt, post.date, post.pid FROM user JOIN post ON user.uid = post.uid WHERE pid = :pid");
    $stmt->bindValue(":pid", $pid);

    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getComments($pid)
{
    $db = include('../inc/egytalk_connect.php');
    $stmt = $db->prepare("SELECT user.username, comment.comment_txt, comment.date FROM user JOIN comment ON user.uid = comment.uid WHERE pid = :pid");
    $stmt->bindValue(":pid", $pid);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function postComment($comment)
{
    $db = include('../inc/egytalk_connect.php');
    $stmt = $db->prepare("INSERT INTO comment (pid, uid, comment_txt, date) VALUES (:pid, :uid, :comment, NOW())");

    $stmt->bindValue(":pid", $_SESSION['pid']);
    $stmt->bindValue(":uid", $_SESSION['uid']);
    $stmt->bindValue(":comment", $comment);

    $stmt->execute();
}