<div class="container mt-3 edit-wrapper">
  <!-- Alert -->
  <div class="col">
    <?php Flasher::flash(); ?>
  </div>
  <!-- End Alert -->
  <div class="card mb-3">
    <div class="row g-0">
      <form action="<?= BASEURL; ?>/anime/update/<?= $data['anime']['slug']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['anime']['id']; ?>">
        <input type="hidden" name="slug" value="<?= $data['anime']['slug']; ?>">
        <input type="hidden" name="oldImage" value="<?= $data['anime']['image']; ?>">
        <img src=" <?= BASEURL; ?>/public/img/<?= $data['anime']['image']; ?>" class="img-fluid rounded-start img-preview">
        <div class="input-group">
          <input type="file" class="form-control img-upload" id="image" name="image" onchange="previewImg(this)">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="btn-group mb-3" role="group">
              <div class="btn btn-danger">
                <input type="text" class="form-control" id="released" name="released" placeholder="Released" value="<?= $data['anime']['released']; ?>">
              </div>
              <div class="btn btn-danger">
                <input type="text" class="form-control" id="studio" name="studio" placeholder="Studio" value="<?= $data['anime']['studio']; ?>">
              </div>
              <div class="btn btn-danger">
                <select class="form-select" id="status_id" name="status_id">
                  <?php if ($data['anime']['status_id'] == 1) : ?>
                    <option value="1" selected>Ongoing</option>
                    <option value="2">Finished</option>
                  <?php else : ?>
                    <option value="1">Ongoing</option>
                    <option value="2" selected>Finished</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?= $data['anime']['title']; ?>">
          </div>
          <div class="input-group mb-3">
            <div class="input-group">
              <textarea class="form-control" aria-label="With textarea" id="synopsis" name="synopsis" placeholder="Synopsis"><?= $data['anime']['synopsis']; ?></textarea>
            </div>
          </div>
          <div class="input-group mb-3">
            <select class="form-select" id="genre1_id" name="genre1_id">
              <option selected><?= $data['anime']['genre1_id']; ?></option>
              <?php foreach ($data['genre'] as $genre) : ?>
                <option value="<?= $genre['name']; ?>"><?= $genre['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <select class="form-select" id="genre2_id" name="genre2_id">
              <option selected><?= $data['anime']['genre2_id']; ?></option>
              <?php foreach ($data['genre'] as $genre) : ?>
                <option value="<?= $genre['name']; ?>"><?= $genre['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <select class="form-select" id="genre3_id" name="genre3_id">
              <option selected><?= $data['anime']['genre3_id']; ?></option>
              <?php foreach ($data['genre'] as $genre) : ?>
                <option value="<?= $genre['name']; ?>"><?= $genre['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-warning px-5">Edit</button>
          <a href="<?= BASEURL; ?>/anime/detail/<?= $data['anime']['slug']; ?>" class="btn btn-primary px-5">Back</a>
        </div>
      </form>
    </div>
  </div>
</div>