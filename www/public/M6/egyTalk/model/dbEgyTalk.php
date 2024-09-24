<?php

class dbEgyTalk
{
  /**
   * Används i metoder genom $this->db</code>
   */
  private $db;
  public function __construct()
  {
    // Definierar konstanter med användarinformation.
    define('DB_USER', 'egytalk');
    define('DB_PASSWORD', '12345');
    define('DB_HOST', 'mariadb');
    define('DB_NAME', 'egytalk');

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
    $this->db = new PDO($dsn, DB_USER, DB_PASSWORD);
  }
  /**
   * Kontrollerar av användare och lösen.
   * Skapar global sessions-array med användarinformation.
   *
   * @param $username Användarnamn
   * @param $password Lösenord
   * @return $response användardata eller tom []
   */
  function auth($username, $password)
  {
    $username = trim(filter_var($username, FILTER_UNSAFE_RAW));
    $response = [];

    $stmt = $this->db->prepare("SELECT * FROM user WHERE username = :user");
    $stmt->bindValue(":user", $username);
    $stmt->execute();

    /** Kontroll att resultat finns */
    if ($stmt->rowCount() == 1) {
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if (password_verify($password, $user['password'])) {
        $response['uid'] = $user['uid'];
        $response['username'] = $user['username'];
        $response['firstname'] = $user['firstname'];
        $response['surname'] = $user['surname'];
      }
    }
    return $response;
  }

  /**
   * Hämtar alla status-uppdateringar i tabellen post
   *
   * @return array med alla status-uppdateringar
   */
  function getAllPosts()
  {
    $stmt = $this->db->prepare("SELECT user.username, post.post_txt, post.date, post.pid FROM user JOIN post ON user.uid = post.uid ORDER By post.date DESC;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getUserPosts($uid)
  {
    $stmt = $this->db->prepare("SELECT post_txt, date FROM post WHERE uid = :uid ORDER By date DESC");

    $stmt->bindValue(":uid", $uid);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function getPost($pid)
  {
    $stmt = $this->db->prepare("SELECT user.username, post.post_txt, post.date, post.pid FROM user JOIN post ON user.uid = post.uid WHERE pid = :pid");
    $stmt->bindValue(":pid", $pid);

    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function getComments($pid)
  {
    $stmt = $this->db->prepare("SELECT user.username, comment.comment_txt, comment.date FROM user JOIN comment ON user.uid = comment.uid WHERE pid = :pid");
    $stmt->bindValue(":pid", $pid);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function postComment($pid, $uid, $comment)
  {
    $stmt = $this->db->prepare("INSERT INTO comment (pid, uid, comment_txt, date) VALUES (:pid, :uid, :comment, NOW())");

    $stmt->bindValue(":pid", $pid);
    $stmt->bindValue(":uid", $uid);
    $stmt->bindValue(":comment", $comment);

    $stmt->execute();
  }
  
}
