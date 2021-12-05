<?php

class AnimeModel
{
  private $table = 'anime';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllAnimeASC()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY title ASC');
    return $this->db->resultSet();
  }

  public function getAnimeForCarousel()
  {
    $this->db->query("SELECT * FROM anime ORDER BY id DESC LIMIT 3");
    return $this->db->resultSet();
  }

  public function getLastAnimeAdded()
  {
    $this->db->query("SELECT * FROM anime ORDER BY id DESC");
    return $this->db->resultSet();
  }

  public function getAnimeBySlug($slug)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE slug=:slug');
    $this->db->bind('slug', $slug);
    return $this->db->single();
  }

  public function getTitle($data)
  {
    $this->db->query("SELECT * FROM anime WHERE title = :title");
    $this->db->bind('title', $data['title']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function insertAnime($data)
  {
    $image = Upload::uploadImage('');
    if (!$image) {
      return false;
    }

    $slug =  preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["title"])));
    $query = "INSERT INTO anime
              VALUES
              (null, 
              :title, :slug, :studio, :genre1_id, :genre2_id, :genre3_id, :released, :status_id, :synopsis, :image)";


    $this->db->query($query);
    $this->db->bind('title', $data['title']);
    $this->db->bind('slug', $slug);
    $this->db->bind('studio', $data['studio']);
    $this->db->bind('genre1_id', $data['genre1_id']);
    $this->db->bind('genre2_id', $data['genre2_id']);
    $this->db->bind('genre3_id', $data['genre3_id']);
    $this->db->bind('released', $data['released']);
    $this->db->bind('status_id', $data['status_id']);
    $this->db->bind('synopsis', $data['synopsis']);
    $this->db->bind('image', $image);

    $this->db->execute();
    return $this->db->rowCount();
  }


  public function updateAnime($data)
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

    $slug = preg_replace('/[^a-z0-9]+/i', '-', trim(strtolower($_POST["title"])));
    $query = "UPDATE anime SET
              title = :title,
              slug = :slug,
              studio = :studio,
              genre1_id = :genre1_id,
              genre2_id = :genre2_id,
              genre3_id = :genre3_id,
              released = :released,
              status_id = :status_id,
              synopsis = :synopsis,
              image = :image
              WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('title', $data['title']);
    $this->db->bind('slug', $slug);
    $this->db->bind('studio', $data['studio']);
    $this->db->bind('genre1_id', $data['genre1_id']);
    $this->db->bind('genre2_id', $data['genre2_id']);
    $this->db->bind('genre3_id', $data['genre3_id']);
    $this->db->bind('released', $data['released']);
    $this->db->bind('status_id', $data['status_id']);
    $this->db->bind('synopsis', $data['synopsis']);
    $this->db->bind('image', $image);

    $this->db->execute();
    return $this->db->rowCount();
  }

  public function deleteAnime($slug)
  {
    $query = "DELETE FROM anime WHERE slug = :slug";

    $this->db->query($query);
    $this->db->bind('slug', $slug);

    $this->db->single();
    return $this->db->rowCount();
  }

  public function searchAnime()
  {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM anime WHERE title LIKE :keyword";

    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");

    return $this->db->resultSet();
  }

  public function getStatusAnime($slug)
  {
    $query = "SELECT `anime`. *, `status`.`status_name`, `status`.`status_slug`
              FROM `anime` JOIN `status`
              ON `anime`.`status_id` = `status`.`id`
              WHERE `slug` = :slug
              ";

    $this->db->query($query);
    $this->db->bind('slug', $slug);
    return $this->db->single();
  }
}
