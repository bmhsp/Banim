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
            <div>
              <a href="<?= BASEURL; ?>/anime/edit/<?= $data['anime']['slug']; ?> " class="btn btn-warning px-4" id="edit-anime">Edit</a>
              <button type="button" class="btn btn-danger px-4" id="delete-anime" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
            </div>
            <a href="<?= BASEURL; ?>/anime" class="btn btn-primary px-4">Back</a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered justify-content-center">
    <div class="modal-content bg-dark text-light" style="max-width: 15rem;">
      <div class="modal-header justify-content-center">
        <form action="<?= BASEURL; ?>/anime/delete/<?= $data['anime']['slug']; ?>" method="post">
          <input type="hidden" name="image">
          <h5 class="modal-title" id="deleteModalLabel">Are you Sure?</h5>
      </div>
      <div class="modal-footer justify-content-around">
        <input type="hidden" name="image" id="image">
        <button type="submit" class="btn btn-danger px-4">Delete</button>
        <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">Cancel</button>
      </div>
      </form>
    </div>
  </div>
</div>