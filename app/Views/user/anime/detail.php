<div class="container mt-3 detail-wrapper">

  <!-- Content -->
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col">
        <img src="<?= BASEURL; ?>/public/img/<?= $data['anime']['image']; ?>" class="img-fluid rounded-start" alt="<?= $data['anime']['title']; ?>">
        <div class="card-body">
          <div class="row">
            <!-- Alert -->
            <div class="col">
              <?php Flasher::flash(); ?>
            </div>
            <!-- End Alert -->
            <div class="btn-group" role="group">
              <h5 class="btn btn-danger"><?= $data['anime']['released']; ?></h5>
              <h5 class="btn btn-danger"><?= $data['anime']['studio']; ?></h5>
              <h5 class="btn btn-danger"><?= $data['status']['status_name']; ?></h5>
            </div>
          </div>
          <h1 class="card-title"><?= $data['anime']['title']; ?></h1>
          <p class="card-text" style="text-align: justify;"><?= $data['anime']['synopsis']; ?></p>
          <p class="card-text">
            <small class="text-muted">Genre : <?= $data['anime']['genre1_id']; ?> | <?= $data['anime']['genre2_id']; ?> | <?= $data['anime']['genre3_id']; ?></small>
          </p>

          <div class="d-flex justify-content-between">
            <a href="https://www.youtube.com/results?search_query=trailer+anime+<?= $data['anime']['title']; ?>" target="_blank" class="btn btn-warning px-3 text-bold"><i class="bi bi-camera-video me-2"></i>Trailer</a>
            <a href="<?= BASEURL; ?>/page/anime" class="btn btn-primary px-4">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>