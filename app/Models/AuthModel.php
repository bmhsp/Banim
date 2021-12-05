<?php

class AuthModel
{
  private $table = 'user';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function login($username, $password)
  {
    $this->db->query("SELECT * FROM user WHERE username = :username");
    $this->db->bind('username', $username);

    $row = $this->db->single();

    if (password_verify($password, $row['password'])) {
      $_SESSION['login'] = true;
      return $row;
    } else {
      return false;
    }
  }

  public function register($data)
  {
    $query = "INSERT INTO user
    VALUE (null,
    :username, :password)";

    $this->db->query($query);
    $this->db->bind('username', $data['username']);
    $this->db->bind('password', $data['password']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function getUsername($data)
  {
    $this->db->query("SELECT * FROM user WHERE username = :username");
    $this->db->bind('username', $data['username']);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
