<div class="container">
  <!-- Insert Button -->
  <div class="row">
    <div class="col-lg-6 col-md">
      <a href="<?= BASEURL; ?>/genre/addgenre" class="btn btn-success mb-3 px-4" id="insert-genre">Insert Genre</a>
      <!-- End Insert -->
    </div>
    <!-- Alert -->
    <div class="col-lg-6 col-md">
      <?php Flasher::flash(); ?>
    </div>
    <!-- End Alert -->
  </div>

  <!-- Content -->
  <div class="row">
    <?php foreach ($data['genre'] as $genre) : ?>
      <div class="col-lg-6 col-md-12">
        <div class="card genre-card">
          <a href="<?= BASEURL; ?>/genre/<?= $genre['genre_slug']; ?>" class="card bg-dark text-white genre-card img-genre">
            <img src="<?= BASEURL; ?>/public/img/<?= $genre['image']; ?>" class="card-img opacity-25 genre-card" alt="<?= $genre['name']; ?>">
            <div class="card-img-overlay d-flex flex-column align-items-start justify-content-end p-2">
              <h4 class="card-title mb-1"><?= $genre['name']; ?></h4>
              <p class="card-text"><?= $genre['description']; ?></p>
            </div>
        </div>
        </a>
        <div class="btn-group mb-3" role="group" style="width: 100%;">
          <a href="<?= BASEURL; ?>/genre/editgenre/<?= $genre['genre_slug']; ?>" class="btn btn-warning genre-ebtn" id="edit-genre">Edit</a>

          <form action="<?= BASEURL; ?>/genre/deletegenre/<?= $genre['genre_slug']; ?>" method="post">
            <button type=" submit" class="btn btn-danger genre-dbtn" id="delete-genre" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>