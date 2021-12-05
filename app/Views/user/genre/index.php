<div class="container">
  <!-- Content -->
  <div class="row">
    <?php foreach ($data['genre'] as $genre) : ?>
      <div class="col-lg-6 cold-md-6 mb-3">
        <div class="card">
          <a href="<?= BASEURL; ?>/page/genre/<?= $genre['genre_slug']; ?>" class="card bg-dark text-white img-genre">
            <img src="<?= BASEURL; ?>/public/img/<?= $genre['image']; ?>" class="card-img opacity-25" alt="<?= $genre['name']; ?>">
            <div class="card-img-overlay d-flex flex-column align-items-start justify-content-end p-2">
              <h2 class="card-title mb-1"><?= $genre['name']; ?></h2>
              <p class="card-text"><?= $genre['description']; ?></p>
            </div>
        </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>

</div>