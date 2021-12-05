<div class="container">
  <div class="row">

    <!-- Search -->
    <div class="col-lg-6 col-md">
      <form action="<?= BASEURL; ?>/anime/search" method="post">
        <div class="row">
          <div class="col mb-3">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search anime..." aria-describedby="button-addon2" name="keyword" id="keyword" autocomplete="off">
              <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- End Search -->

    <!-- Insert Button -->
    <div class="col-lg-6 col-md-6">
      <a href="<?= BASEURL; ?>/anime/add" class="btn btn-success px-3" id="insert-anime">
        Insert Anime
      </a>
    </div>
    <!-- End Insert Button -->

    <!-- Alert -->
    <div class="col-md-6 mt-3 mt-md-0">
      <?php Flasher::flash(); ?>
    </div>
    <!-- End Alert -->

  </div>

  <!-- Content -->
  <div class="row">
    <?php foreach ($data['anime'] as $anime) : ?>
      <div class="col-lg-4 col-md-6 col-sm-12 g-4">
        <div class="card text-center">
          <a href="<?= BASEURL; ?>/anime/detail/<?= $anime['slug']; ?>" class="img-wrapper">
            <img src="<?= BASEURL; ?>/public/img/<?= $anime['image']; ?>" class="card-img-top" alt="<?= $anime['title']; ?>">
          </a>
          <div class="card-img-overlay card-anime py-1">
            <?= $anime['title']; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- End Content -->

</div>