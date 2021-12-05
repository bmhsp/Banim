<?php

class Page extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home',
      'anime' => $this->model('AnimeModel')->getAnimeForCarousel(),
      'ongoing' => $this->model('HomeModel')->getOngoing(),
      'linkOngoing' => $this->model('HomeModel')->linkOngoing(),
      'finished' => $this->model('HomeModel')->getFinished(),
      'linkFinished' => $this->model('HomeModel')->linkFinished()
    ];

    $this->view('template/header', $data);
    $this->view('user/navbar');
    $this->view('user/home/index', $data);
    $this->view('template/footer');
  }

  public function anime()
  {
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);

    if (isset($uri_segments[4])) {
      $data = [
        'title' => ucfirst($uri_segments[4]),
        'status' => $this->model('HomeModel')->getAllStatus(),
      ];
      $this->view('template/header', $data);
      $this->view('user/navbar');
      $this->view('user/anime/status', $data);
      $this->view('template/footer');
    } else {
      $data = [
        'title' => 'Anime',
        'anime' => $this->model('AnimeModel')->getAllAnimeASC()
      ];

      $this->view('template/header', $data);
      $this->view('user/navbar');
      $this->view('user/anime/index', $data);
      $this->view('template/footer');
    }
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail',
      'anime' => $this->model('AnimeModel')->getAnimeBySlug($slug),
      'status' => $this->model('AnimeModel')->getStatusAnime($slug)
    ];

    $this->view('template/header', $data);
    $this->view('user/navbar');
    $this->view('user/anime/detail', $data);
    $this->view('template/footer');
  }

  public function search()
  {
    $data = [
      'title' => 'Anime',
      'anime' => $this->model('AnimeModel')->searchAnime()
    ];

    $this->view('template/header', $data);
    $this->view('user/navbar');
    $this->view('user/anime/index', $data);
    $this->view('template/footer');
  }

  public function genre()
  {
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);

    if (isset($uri_segments[4])) {
      $data = [
        'title' => ucfirst($uri_segments[4]),
        'genre' => $this->model('GenreModel')->getGenre()
      ];
      $this->view('template/header', $data);
      $this->view('user/navbar');
      $this->view('user/genre/single-genre', $data);
      $this->view('template/footer');
    } else {
      $data = [
        'title' => 'Genre',
        'genre' => $this->model('GenreModel')->getAllGenre()
      ];
      $this->view('template/header', $data);
      $this->view('user/navbar');
      $this->view('user/genre/index', $data);
      $this->view('template/footer');
    }
  }
}
