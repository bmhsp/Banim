<?php

class GenreModel
{
  private $table = 'genre';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllGenre()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY name ASC');
    return $this->db->resultSet();
  }

  public function getGenreName($data)
  {
    $this->db->query("SELECT * FROM genre WHERE name = :name");
    $this->db->bind('name', $data['name']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function getGenre()
  {
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);

    $query = "SELECT `genre`.`genre_slug` , `anime`.* 
              FROM `genre` JOIN `anime` 
              ON `genre`.`genre_slug` = `anime`.`genre1_id` 
              OR `genre`.`genre_slug` = `anime`.`genre2_id` 
              OR `genre`.`genre_slug` = `anime`.`genre3_id`
              WHERE `genre1_id` = :genre_slug 
              OR `genre2_id` = :genre_slug 
              OR `genre3_id` = :genre_slug
              GROUP BY `genre1_id`, `genre2_id`, `genre3_id`
              ORDER BY title ASC
              ";

    // $query = "SELECT * FROM :anime WHERE genre_id=:genre_slug";

    $this->db->query($query);

    if (!isset($_SESSION['login'])) {
      $this->db->bind('genre_slug', $uri_segments[4]);
    } else {
      $this->db->bind('genre_slug', $uri_segments[3]);
    }

    return $this->db->resultSet();
  }

  public function getGenreBySlug($genre_slug)
  {
    $this->db->query('SELECT * FROM genre WHERE genre_slug = :genre_slug');
    $this->db->bind('genre_slug', $genre_slug);
    return $this->db->single();
  }


  public function insertGenre($data)
  {
    $image = Upload::uploadImage('');
    if (!$image) {
      return false;
    }

    $genre_slug =  preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["name"])));
    $query = "INSERT INTO genre
              VALUES
              (null, :name, :genre_slug, :description, :image)";

    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('genre_slug', $genre_slug);
    $this->db->bind('description', $data['description']);
    $this->db->bind('image', $image);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function updateGenre($data)
  {
    $oldImage = $_POST['oldImage'];
    if ($_FILES['image']['error'] === 4) {
      $image = $oldImage;
    } else {
      $image = Upload::uploadImage('anime/edit/' . $data['slug']);
      if (!$image) {
        return false;
      }
    }

    $genre_slug =  preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["name"])));
    $query = "UPDATE genre SET
              name = :name,
              genre_slug = :genre_slug,
              description = :description,
              image = :image
              WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('name', $data['name']);
    $this->db->bind('genre_slug', $genre_slug);
    $this->db->bind('description', $data['description']);
    $this->db->bind('image', $image);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteGenre($genre_slug)
  {
    $query = "DELETE FROM genre WHERE genre_slug = :genre_slug";

    $this->db->query($query);
    $this->db->bind('genre_slug', $genre_slug);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
