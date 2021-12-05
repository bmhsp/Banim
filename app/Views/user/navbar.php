<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand logo" href="<?= BASEURL; ?>">
      <img src="<?= BASEURL; ?>/public/img/logo.png" alt="banim" width="30">
      <span class="text-info">Ba</span><span class="text-warning">nim</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($_SERVER['REQUEST_URI'] == '/banim/') : ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= BASEURL; ?>">Home</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>">Home</a>
          </li>
        <?php endif; ?>
        <?php if ($_SERVER['REQUEST_URI'] == '/banim/page/anime') : ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= BASEURL; ?>/page/anime">Anime</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>/page/anime">Anime</a>
          </li>
        <?php endif; ?>
        <?php if ($_SERVER['REQUEST_URI'] == '/banim/page/genre') : ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= BASEURL; ?>/page/genre">Genre</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>/page/genre">Genre</a>
          </li>
        <?php endif; ?>
        <li class="nav-item d-lg-none">
          <a href="<?= BASEURL; ?>/auth/login" class="btn btn-success btn-sm px-4" style="width: 100%;">Login as Admin</a>
        </li>
      </ul>
    </div>
    <a href="<?= BASEURL; ?>/auth/login" class="btn btn-success btn-sm px-4 d-none d-lg-block">Login as Admin</a>
  </div>
</nav>