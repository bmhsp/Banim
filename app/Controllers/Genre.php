<?php

class Genre extends BaseController
{
  public function index()
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);

    if (isset($uri_segments[3])) {
      $data = [
        'title' => ucfirst($uri_segments[3]),
        'genre' => $this->model('GenreModel')->getGenre()
      ];
      $this->view('template/header', $data);
      $this->view('admin/navbar');
      $this->view('admin/genre/single-genre', $data);
      $this->view('template/footer');
    } else {
      $data = [
        'title' => 'Genre',
        'genre' => $this->model('GenreModel')->getAllGenre()
      ];
      $this->view('template/header', $data);
      $this->view('admin/navbar');
      $this->view('admin/genre/index', $data);
      $this->view('template/footer');
    }
  }

  public function addGenre()
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'title' => 'Add Genre'
    ];

    $this->view('template/header', $data);
    $this->view('admin/navbar');
    $this->view('admin/genre/add-genre', $data);
    $this->view('template/footer');
  }

  public function insertGenre()
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    if ($this->model('GenreModel')->getGenreName($_POST) > 0) {
      Flasher::setFlash('Genre name is already <b>taken</b>', 'danger');
      header('Location:' . BASEURL . '/genre/addgenre');
      return false;
    }

    if ($this->model('GenreModel')->insertGenre($_POST) > 0) {
      Flasher::setFlash('Genre was <b>successfully</b>  added', 'success');
      header('Location:' . BASEURL . '/genre');
      exit;
    } else {
      Upload::uploadImage('/genre/addgenre');
    }
  }

  public function editGenre($genre_slug)
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'title' => 'Edit Genre',
      'genre' => $this->model('GenreModel')->getGenreBySlug($genre_slug)
    ];

    $this->view('template/header', $data);
    $this->view('admin/navbar');
    $this->view('admin/genre/edit-genre', $data);
    $this->view('template/footer');
  }

  public function updateGenre($genre_slug)
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'genre' => $this->model('GenreModel')->getGenreBySlug($genre_slug),
      'path' => $_SERVER['DOCUMENT_ROOT']
    ];

    if ($this->model('GenreModel')->updateGenre($_POST) > 0) {
      if ($data['genre']['image'] == 'default.jpg') {
        Flasher::setFlash('Genre <b>' . $data['genre']['name'] . '</b> was edited', 'success');
        header('Location:' . BASEURL . '/genre');
        exit;
      } elseif ($_FILES['image']['error'] === 4) {
        Flasher::setFlash('Genre <b>' . $data['genre']['name'] . '</b> was edited', 'success');
        header('Location:' . BASEURL . '/genre');
        exit;
      } else {
        unlink($data['path'] . '/banim/public/img/' . $data['genre']['image']);
        Flasher::setFlash('Genre <b>' . $data['genre']['name'] . '</b> was edited', 'success');
        header('Location:' . BASEURL . '/genre');
        exit;
      }
    } else {
      Upload::uploadImage('/genre/editgenre/' . $genre_slug);
    }
  }

  public function deleteGenre($genre_slug)
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'genre' => $this->model('GenreModel')->getGenreBySlug($genre_slug),
      'path' => $_SERVER['DOCUMENT_ROOT']
    ];

    if ($this->model('GenreModel')->deleteGenre($genre_slug) > 0) {
      if ($data['genre']['image'] == 'default.jpg') {
        Flasher::setFlash('Genre <b>' . $data['genre']['name'] . '</b> was deleted', 'success');
        header('Location:' . BASEURL . '/genre');
        exit;
      } else {
        unlink($data['path'] . '/banim/public/img/' . $data['genre']['image']);
        Flasher::setFlash('Genre <b>' . $data['genre']['name'] . '</b> was deleted', 'success');
        header('Location:' . BASEURL . '/genre');
        exit;
      }
    } else {
      Flasher::setFlash('Genre <b>' . $data['genre']['name'] . '</b> was fail deleted', 'danger');
      header('Location:' . BASEURL . '/genre');
      exit;
    }
  }
}
