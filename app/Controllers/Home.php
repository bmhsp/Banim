<?php

class Home extends BaseController
{
  public function index()
  {
    if (!isset($_SESSION['login'])) {
      header('Location:' . BASEURL . '/auth/login');
    }

    $data = [
      'title' => 'Home',
      'ongoing' => $this->model('HomeModel')->getOngoing(),
      'anime' => $this->model('AnimeModel')->getAnimeForCarousel(),
      'linkOngoing' => $this->model('HomeModel')->linkOngoing(),
      'finished' => $this->model('HomeModel')->getFinished(),
      'linkFinished' => $this->model('HomeModel')->linkFinished()
    ];

    $this->view('template/header', $data);
    $this->view('admin/navbar');
    $this->view('admin/home/index', $data);
    $this->view('template/footer');
  }
}
