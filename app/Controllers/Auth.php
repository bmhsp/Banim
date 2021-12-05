<?php

class Auth extends BaseController
{
  public function register()
  {
    $data = [
      'title' => 'Register',
      'username' => '',
      'password' => '',
      'password2' => '',
      'usernameError' => '',
      'passwordError' => '',
      'password2Error' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'title' => 'Register',
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'password2' => trim($_POST['password2']),
        'usernameError' => '',
        'passwordError' => '',
        'password2Error' => ''
      ];

      $nameValidation = '/^[a-z0-9]*$/';

      // username validation
      if (empty($data['username'])) {
        $data['usernameError'] = 'Please enter username';
      } elseif (!preg_match($nameValidation, $data['username'])) {
        $data['usernameError'] = 'Usename can only contain letters and numbers';
      } elseif ($this->model('AuthModel')->getUsername($_POST) > 0) {
        $data['usernameError'] = 'Username is already taken';
      }

      // password validation
      if (empty($data['password'])) {
        $data['passwordError'] = 'Please enter password';
      } elseif (strlen($data['password']) < 5) {
        $data['passwordError'] = 'Password must be at least 5 characters';
        $data['password2Error'] = 'Password must be at least 5 characters';
      }

      // confirm password validation 
      if (empty($data['password2'])) {
        $data['password2Error'] = 'Please enter password';
      } else {
        if ($data['password'] != $data['password2']) {
          $data['passwordError'] = 'Password not match';
          $data['password2Error'] = 'Password not match';
        }
      }

      if (empty($data['usernameError']) && empty($data['passwordError']) && empty($data['password2Error'])) {
        $_POST['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($this->model('AuthModel')->register($_POST) > 0) {
          Flasher::setFlash('Your account has been <b>created</b>', 'success');
          header('Location:' . BASEURL . '/auth/login');
          exit;
        } else {
          Flasher::setFlash('Registration was <b>failed</b>', 'danger');
          header('Location:' . BASEURL . '/auth/register');
          return false;
        }
      }
    }

    $this->view('template/header', $data);
    $this->view('user/navbar', $data);
    $this->view('auth/register', $data);
  }

  public function login()
  {
    $data = [
      'title' => 'Login',
      'username' => '',
      'password' => '',
      'usernameError' => '',
      'passwordError' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'title' => 'Login',
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'usernameError' => '',
        'passwordError' => ''
      ];

      // username validation
      if (empty($data['username'])) {
        $data['usernameError'] = 'Please enter username';
      }

      // password validation
      if (empty($data['password'])) {
        $data['passwordError'] = 'Please enter password';
      }

      if (empty($data['usernameError']) && empty($data['passwordError']) && empty($data['password2Error'])) {
        $logged = $this->model('AuthModel')->login($data['username'], $data['password']);
        if ($logged) {
          $this->userSession($logged);
          Flasher::setFlash('Welcome back <b>' . $data['username'] . '</b>', 'success');
          header('Location:' . BASEURL . '/home');
          exit;
        } else {
          Flasher::setFlash('Username or password is <b>incorrect</b>', 'danger');
          header('Location:' . BASEURL . '/auth/login');
          return false;
        }
      }
    } else {
      $data = [
        'title' => 'Login',
        'username' => '',
        'password' => '',
        'usernameError' => '',
        'passwordError' => ''
      ];
    }

    $this->view('template/header', $data);
    $this->view('user/navbar', $data);
    $this->view('auth/login', $data);
  }

  public function userSession($user)
  {
    session_start();
    $_SESSION['user_id'] = $user->id;
    $_SESSION['username'] = $user->username;
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    session_unset();
    Flasher::setFlash('Your have been <b>logout</b>', 'success');
    header('Location:' . BASEURL);
  }
}
