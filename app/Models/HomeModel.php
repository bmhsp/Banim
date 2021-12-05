<?php

class HomeModel
{
  private $table = 'anime';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getOngoing()
  {
    $query = "SELECT `anime`. *, `status`.`status_name`
              FROM `anime` JOIN `status`
              ON `anime`.`status_id` = `status`.`id`
              WHERE `status_id` = 1 
              LIMIT 6
              ";

    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getFinished()
  {
    $query = "SELECT `anime`. *, `status`.`status_name`
              FROM `anime` JOIN `status`
              ON `anime`.`status_id` = `status`.`id`
              WHERE `status_id` = 2
              LIMIT 6
              ";

    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getAllStatus()
  {
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $query = "SELECT `anime`. *, `status`.`status_name`, `status`.`status_slug`
              FROM `anime` JOIN `status`
              ON `anime`.`status_id` = `status`.`id`
              WHERE `status_slug` = :status_slug
              ";

    $this->db->query($query);

    if (!isset($_SESSION['login'])) {
      $this->db->bind('status_slug', $uri_segments[4]);
    } else {
      $this->db->bind('status_slug', $uri_segments[3]);
    }

    return $this->db->resultSet();
  }

  public function linkOngoing()
  {
    $query = "SELECT `anime`. *, `status`.`status_name`, `status`.`status_slug`
              FROM `anime` JOIN `status`
              ON `anime`.`status_id` = `status`.`id`
              WHERE `status_id` = 1
              ";

    $this->db->query($query);
    return $this->db->single();
  }

  public function linkFinished()
  {
    $query = "SELECT `anime`. *, `status`.`status_name`, `status`.`status_slug`
              FROM `anime` JOIN `status`
              ON `anime`.`status_id` = `status`.`id`
              WHERE `status_id` = 2
              ";

    $this->db->query($query);
    return $this->db->single();
  }
}
