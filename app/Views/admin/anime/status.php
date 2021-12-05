<div class="container">
  <a href="<?= BASEURL; ?>/home" class="btn btn-primary px-5" style="width: 100%;">Back</a>
  <!-- Content -->
  <div class="row">
    <?php foreach ($data['status'] as $anime) : ?>
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