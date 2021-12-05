<?php

class Anime extends BaseController
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
        'status' => $this->model('HomeModel')->getAllStatus(),
      ];
      $this->view('template/header', $data);
      $this->view('admin/navbar');
      $this->view('admin/anime/status', $data);
      $this->view('template/footer');
    } else {
      $data = [
        'title' => 'Anime',
        'anime' => $this->model('AnimeModel')->getLastAnimeAdded()
      ];

      $this->view('template/header', $data);
      $this->view('admin/navbar');
      $this->view('admin/anime/index', $data);
      $this->view('template/footer');
    }
  }

  public function detail($slug)
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'title' => 'Detail',
      'anime' => $this->model('AnimeModel')->getAnimeBySlug($slug),
      'status' => $this->model('AnimeModel')->getStatusAnime($slug)
    ];

    $this->view('template/header', $data);
    $this->view('admin/navbar');
    $this->view('admin/anime/detail', $data);
    $this->view('template/footer');
  }

  public function add()
  {
    $data = [
      'title' => 'Add',
      'genre' => $this->model('GenreModel')->getAllGenre()
    ];

    $this->view('template/header', $data);
    $this->view('admin/navbar');
    $this->view('admin/anime/add', $data);
    $this->view('template/footer');
  }

  public function insert()
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    var_dump($_GET['url']);
    die;

    if ($this->model('AnimeModel')->getTitle($_POST) > 0) {
      Flasher::setFlash('Title is already <b>taken</b>', 'danger');
      header('Location:' . BASEURL . '/anime/add');
      return false;
    }

    if ($this->model('AnimeModel')->insertAnime($_POST) > 0) {
      Flasher::setFlash('Anime was <b>successfully</b> added', 'success');
      header('Location:' . BASEURL . '/anime');
      exit;
    } else {
      Upload::uploadImage('/anime/add');
    }
  }

  public function delete($slug)
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'anime' => $this->model('AnimeModel')->getAnimeBySlug($slug),
      'path' => $_SERVER['DOCUMENT_ROOT']
    ];


    if ($this->model('AnimeModel')->deleteAnime($slug) > 0) {
      if ($data['anime']['image'] == 'default.jpg') {
        Flasher::setFlash('<b>' . $data['anime']['title'] . '</b> was deleted', 'success');
        header('Location:' . BASEURL . '/anime');
        exit;
      } else {
        unlink($data['path'] . '/banim/public/img/' . $data['anime']['image']);
        Flasher::setFlash('<b>' . $data['anime']['title'] . '</b> was deleted', 'success');
        header('Location:' . BASEURL . '/anime');
        exit;
      }
    } else {
      Flasher::setFlash('<b>' . $data['anime']['title'] . '</b> was fail deleted', 'danger');
      header('Location:' . BASEURL . '/anime/detail/' . $slug);
      exit;
    }
  }

  public function edit($slug)
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'title' => 'Edit',
      'anime' => $this->model('AnimeModel')->getAnimeBySlug($slug),
      'status' => $this->model('AnimeModel')->getStatusAnime($slug),
      'genre' => $this->model('GenreModel')->getAllGenre()
    ];

    $this->view('template/header', $data);
    $this->view('admin/navbar');
    $this->view('admin/anime/edit', $data);
    $this->view('template/footer');
  }

  public function update($slug)
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'anime' => $this->model('AnimeModel')->getAnimeBySlug($slug),
      'path' => $_SERVER['DOCUMENT_ROOT']
    ];

    if ($this->model('AnimeModel')->updateAnime($_POST) > 0) {
      if ($data['anime']['image'] == 'default.jpg') {
        Flasher::setFlash('<b>' . $data['anime']['title'] . '</b> was edited', 'success');
        header('Location:' . BASEURL . '/anime');
        exit;
      } elseif ($_FILES['image']['error'] === 4) {
        Flasher::setFlash('<b>' . $data['anime']['title'] . '</b> was edited', 'success');
        header('Location:' . BASEURL . '/anime');
        exit;
      } else {
        unlink($data['path'] . '/banim/public/img/' . $data['anime']['image']);
        Flasher::setFlash('<b>' . $data['anime']['title'] . '</b> was edited', 'success');
        header('Location:' . BASEURL . '/anime');
        exit;
      }
      Flasher::setFlash('<b>' . $data['anime']['title'] . '</b> was edited', 'success');
      header('Location:' . BASEURL . '/anime');
      exit;
    } else {
      Upload::uploadImage('/anime/edit/' . $slug);
    }
  }

  public function search()
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'title' => 'Anime',
      'anime' => $this->model('AnimeModel')->searchAnime()
    ];

    $this->view('template/header', $data);
    $this->view('admin/navbar');
    $this->view('admin/anime/index', $data);
    $this->view('template/footer');
  }
}
