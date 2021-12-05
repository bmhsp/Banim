<div class="container mt-3 add-wrapper">
  <!-- Alert -->
  <div class="col">
    <?php Flasher::flash(); ?>
  </div>
  <!-- End Alert -->
  <div class="card mb-3">
    <div class="row g-0">
      <form action="<?= BASEURL; ?>/anime/insert" method="post" enctype="multipart/form-data">
        <input type="hidden" name="slug">
        <img src="<?= BASEURL; ?>/public/img/default.jpg" class="img-fluid rounded-start img-preview">
        <div class="input-group">
          <input type="file" class="form-control img-upload" id="image" name="image" onchange="previewImg(this)">
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="btn-group" role="group">
              <div class="btn btn-danger">
                <input type="text" class="form-control" id="released" name="released" placeholder="Released">
              </div>
              <div class="btn btn-danger">
                <input type="text" class="form-control" id="studio" name="studio" placeholder="Studio">
              </div>
              <div class="btn btn-danger">
                <select class="form-select" id="status_id" name="status_id">
                  <option value="3" selected>Status</option>
                  <option value="1">Ongoing</option>
                  <option value="2">Finished</option>
                </select>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" id="title" name="title" placeholder="Title" class="form-control" required>
          </div>
          <div class="input-group mb-3">
            <textarea class="form-control" aria-label="With textarea" placeholder="Synopsis" name="synopsis"></textarea>
          </div>
          <div class="input-group mb-3">
            <select class="form-select" id="genre1_id" name="genre1_id">
              <option selected>Genre 1</option>
              <?php foreach ($data['genre'] as $genre) : ?>
                <option value="<?= $genre['name']; ?>"><?= $genre['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <select class="form-select" id="genre2_id" name="genre2_id">
              <option selected>Genre 2</option>
              <?php foreach ($data['genre'] as $genre) : ?>
                <option value="<?= $genre['name']; ?>"><?= $genre['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <select class="form-select" id="genre3_id" name="genre3_id">
              <option selected>Genre 3</option>
              <?php foreach ($data['genre'] as $genre) : ?>
                <option value="<?= $genre['name']; ?>"><?= $genre['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-success px-5">Add</button>
          <a href="<?= BASEURL; ?>/anime" class="btn btn-primary px-5">Back</a>
        </div>
      </form>
    </div>
  </div>
</div>