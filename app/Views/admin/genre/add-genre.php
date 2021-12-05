<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-8 mb-3">
      <!-- Alert -->
      <div class="col">
        <?php Flasher::flash(); ?>
      </div>
      <!-- End Alert -->
      <form action="<?= BASEURL; ?>/genre/insertgenre" method="post" enctype="multipart/form-data">
        <input type="hidden" name="genre_slug">
        <div class="card bg-dark text-white mb-3">
          <img src="<?= BASEURL; ?>/public/img/default.jpg" class="card-img img-preview">
          <div class="input-group">
            <input type="file" class="img-upload form-control mb-2" id="image" name="image" onchange="previewImg(this)">
          </div>
          <div class="input-group">
            <input type="text" class="form-control mb-2" id="name" name="name" placeholder="Name" required>
          </div>
          <div class="input-group">
            <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="description"></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-success px-5 me-2">Add</button>
        <a href="<?= BASEURL; ?>/genre" class="btn btn-primary px-5">Back</a>
      </form>
    </div>
  </div>
</div>