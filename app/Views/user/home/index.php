<div class="container">

  <!-- Slider -->
  <div class="col-md-6">
    <?php Flasher::flash(); ?>
  </div>
  <div class="row mb-3">
    <div class="col">
      <div id="animeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#animeCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
          <button type="button" data-bs-target="#animeCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#animeCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
          <?php $i = 0; ?>
          <?php foreach ($data['anime'] as $anime) : ?>
            <div class="carousel-item <?= $i == 0 ? 'active' : ''; ?>">
              <a href="<?= BASEURL; ?>/page/detail/<?= $anime['slug']; ?>">
                <img src="<?= BASEURL; ?>/public/img/<?= $anime['image']; ?>" class="d-block w-100 img-fluid opacity-50">
              </a>
              <div class="container">
                <div class="carousel-caption d-none d-md-block">
                  <h5><?= $anime['title']; ?></h5>
                  <p><?= $anime['genre1_id']; ?> | <?= $anime['genre2_id']; ?> | <?= $anime['genre3_id']; ?></p>
                </div>
              </div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#animeCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#animeCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="d-flex bg-primary">
    <div class="col text-start my-auto p-2">
      <h5 class="text-light">Ongoing</h4>
    </div>
    <div class="col text-end my-auto p-2">
      <a href="<?= BASEURL; ?>/page/anime/<?= $data['linkOngoing']['status_slug']; ?>" class="btn btn-light py-1 fw-bold">More</a>
    </div>
  </div>

  <div class="row">
    <?php foreach ($data['ongoing'] as $anime) : ?>
      <div class="col-lg-4 col-md-6 col-sm-12 g-4">
        <div class="card text-center">
          <a href="<?= BASEURL; ?>/page/detail/<?= $anime['slug']; ?>" class="text-light img-wrapper">
            <img src="<?= BASEURL; ?>/public/img/<?= $anime['image']; ?>" class="card-img-top" alt="<?= $anime['title']; ?>">
            <div class="card-img-overlay card-anime py-1">
              <?= $anime['title']; ?>
            </div>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="d-flex bg-primary mt-3">
    <div class="col text-start my-auto p-2">
      <h5 class="text-light">Finished</h4>
    </div>
    <div class="col text-end my-auto p-2">
      <a href="<?= BASEURL; ?>/page/anime/<?= $data['linkFinished']['status_slug']; ?>" class="btn btn-light py-1 fw-bold">More</a>
    </div>
  </div>

  <div class="row">
    <?php foreach ($data['finished'] as $anime) : ?>
      <div class="col-lg-4 col-md-6 col-sm-12 g-4">
        <div class="card text-center">
          <a href="<?= BASEURL; ?>/page/detail/<?= $anime['slug']; ?>" class="text-light img-wrapper">
            <img src="<?= BASEURL; ?>/public/img/<?= $anime['image']; ?>" class="card-img-top" alt="<?= $anime['title']; ?>">
            <div class="card-img-overlay card-anime py-1">
              <?= $anime['title']; ?>
            </div>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>