<main class="form-signin">
  <form action="<?= BASEURL; ?>/auth/register" method="POST">
    <h1 class="h3 mb-3 fw-normal text-center text-light">Register</h1>

    <!-- Alert -->
    <div class="col">
      <?php Flasher::flash(); ?>
    </div>
    <!-- End Alert -->

    <div class="form-floating mb-3">
      <input type="text" class="form-control <?= $data['usernameError'] ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" name="username" autofocus>
      <label for="username">Username</label>
      <p class="text-danger"><?= $data['usernameError']; ?></p>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control <?= $data['usernameError'] ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
      <label for="password">Password</label>
      <p class="text-danger"><?= $data['passwordError']; ?></p>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control <?= $data['usernameError'] ? 'is-invalid' : ''; ?>" id="password2" placeholder="Confirm password" name="password2">
      <label for="password2">Confirm password</label>
      <p class="text-danger"><?= $data['password2Error']; ?></p>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p class="text-light mt-2 text-center">Already have account? <a href="<?= BASEURL; ?>/auth/login"> Login</a></p>
  </form>
</main>