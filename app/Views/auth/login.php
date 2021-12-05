<main class="form-signin">
  <form action="<?= BASEURL; ?>/auth/login" method="post">
    <h1 class="h3 mb-3 fw-normal text-center text-light">Login</h1>

    <!-- Alert -->
    <div class="col">
      <?php Flasher::flash(); ?>
    </div>
    <!-- End Alert -->

    <div class="form-floating mb-2">
      <input type="text" class="form-control <?= $data['usernameError'] ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" name="username" autofocus>
      <label for="username">Username</label>
      <p class="text-danger"><?= $data['usernameError']; ?></p>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control <?= $data['usernameError'] ? 'is-invalid' : ''; ?>" id="passwword" placeholder="Password" name="password">
      <label for="passwword">Password</label>
      <p class="text-danger"><?= $data['passwordError']; ?></p>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
    <p class="text-light mt-2 text-center">Not have any account? <a href="<?= BASEURL; ?>/auth/register"> Register</a></p>
  </form>
</main>