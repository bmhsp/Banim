<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand logo" href="<?= BASEURL; ?>/home">
      <img src="<?= BASEURL; ?>/public/img/logo.png" alt="banim" width="30">
      <span class="text-info">Ba</span><span class="text-warning">nim</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($_SERVER['REQUEST_URI'] == '/banim/home') : ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= BASEURL; ?>/home">Home</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>/home">Home</a>
          </li>
        <?php endif; ?>
        <?php if ($_SERVER['REQUEST_URI'] == '/banim/anime') : ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= BASEURL; ?>/anime">Anime</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>/anime">Anime</a>
          </li>
        <?php endif; ?>
        <?php if ($_SERVER['REQUEST_URI'] == '/banim/genre') : ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= BASEURL; ?>/genre">Genre</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL; ?>/genre">Genre</a>
          </li>
        <?php endif; ?>
        <li class="nav-item d-lg-none">
          <a href="<?= BASEURL; ?>/auth/logout" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal" data-bs-target="#logoutModal" style="width: 100%;">Logout</a>
        </li>
      </ul>
    </div>
    <a href="<?= BASEURL; ?>/auth/logout" class="btn btn-danger btn-sm px-4 d-none d-lg-block" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
  </div>
</nav>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered justify-content-center">
    <div class="modal-content bg-dark text-light" style="max-width: 15rem;">
      <div class="modal-header justify-content-center">
        <form action="<?= BASEURL; ?>/auth/logout" method="post">
          <input type="hidden" name="image">
          <h5 class="modal-title" id="logoutModalLabel">Are you Sure?</h5>
      </div>
      <div class="modal-footer justify-content-around">
        <input type="hidden" name="image" id="image">
        <button type="submit" class="btn btn-danger px-4">Yes</button>
        <button type="button" class="btn btn-primary px-3" data-bs-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>