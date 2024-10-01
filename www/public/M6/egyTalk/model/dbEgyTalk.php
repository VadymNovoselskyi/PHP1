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
    define('DB_HOST', '127.0.0.1');
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
   * @return $result användardata eller tom []
   */
  function auth($username, $password, $toHash)
  {
    $username = trim(filter_var($username, FILTER_UNSAFE_RAW));
    $result = [];

    $stmt = $this->db->prepare("SELECT * FROM user WHERE username = :user");
    $stmt->bindValue(":user", $username);
    $stmt->execute();

    /** Kontroll att resultat finns */
    if ($stmt->rowCount() == 1) {
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if(!$toHash && $password != $user['password']) return $result;
      if($toHash && !password_verify($password, $user['password'])) return $result;

      $result['uid'] = $user['uid'];
      $result['username'] = $user['username'];
      $result['firstname'] = $user['firstname'];
      $result['surname'] = $user['surname'];
      $result['password'] = $user['password'];  
    }
    return $result;
  }

  function getUserByUID($uid) 
  {
    $result = [];

    $stmt = $this->db->prepare("SELECT uid, firstname, surname, username FROM user WHERE uid = :uid");
    $stmt->bindValue(":uid", $uid);
    $stmt->execute();

    /** Kontroll att resultat finns */
    if ($stmt->rowCount() == 1) {
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      $result['uid'] = $user['uid'];
      $result['username'] = $user['username'];
      $result['firstname'] = $user['firstname'];
      $result['surname'] = $user['surname'];
    }
    return $result;
  }

  function signup($firstname, $surname, $username, $password) 
  {
    $uid = random_bytes(16);
    $uid[6] = chr((ord($uid[6]) & 0x0f) | 0x40);
    $uid[8] = chr((ord($uid[8]) & 0x3f) | 0x80);
    $uid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($uid), 4));

    $firstname = trim(filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS));
    $surname = trim(filter_var($surname, FILTER_SANITIZE_SPECIAL_CHARS));
    $username = trim(filter_var($username, FILTER_UNSAFE_RAW));
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $this->db->prepare("INSERT INTO user(uid, firstname, surname, username, password) VALUES(:uid, :fn, :sn,:user,:pwd)");

    $stmt->bindValue(":uid", $uid);
    $stmt->bindValue(":fn", $firstname);
    $stmt->bindValue(":sn", $surname);
    $stmt->bindValue(":user", $username);
    $stmt->bindValue(":pwd", $password);

    $stmt->execute();

    $result = [];
    $result['uid'] = $uid;
    $result['username'] = $username;
    $result['firstname'] = $firstname;
    $result['surname'] = $surname;
    $result['password'] = $password;

    return $result;
  }


  function post($uid, $post_txt) {
    $stmt = $this->db->prepare("INSERT INTO post (uid, post_txt, date) VALUES (:uid, :post, NOW())");

    $stmt->bindValue(":uid", $uid);
    $stmt->bindValue(":post", $post_txt);

    $stmt->execute();
  }

  function postComment($pid, $uid, $comment)
  {
    $stmt = $this->db->prepare("INSERT INTO comment (pid, uid, comment_txt, date) VALUES (:pid, :uid, :comment, NOW())");

    $stmt->bindValue(":pid", $pid);
    $stmt->bindValue(":uid", $uid);
    $stmt->bindValue(":comment", $comment);

    $stmt->execute();
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
    $stmt = $this->db->prepare("SELECT post_txt, date, pid FROM post WHERE uid = :uid ORDER By date DESC");

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
    $stmt = $this->db->prepare("SELECT comment.cid, comment.uid, user.username, comment.comment_txt, comment.date FROM user JOIN comment ON user.uid = comment.uid WHERE pid = :pid");
    $stmt->bindValue(":pid", $pid);

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
