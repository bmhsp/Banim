<div class="container">
  <a href="<?= BASEURL; ?>/genre" class="btn btn-primary px-5" style="width: 100%;">Back</a>
  <div class="row">
    <?php foreach ($data['genre'] as $genre) : ?>
      <div class="col-lg-4 col-md-6 col-sm-12 g-4">
        <div class="card text-center">
          <a href="<?= BASEURL; ?>/anime/detail/<?= $genre['slug']; ?>" class="img-wrapper">
            <img src="<?= BASEURL; ?>/public/img/<?= $genre['image']; ?>" class="card-img-top" alt="<?= $genre['title']; ?>">
          </a>
          <div class="card-img-overlay card-anime py-1">
            <?= $genre['title']; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>