<div class="container mt-3">
  <div class="row justify-content-center">
    <div class="col-md-8 mb-3">
      <!-- Alert -->
      <div class="col">
        <?php Flasher::flash(); ?>
      </div>
      <!-- End Alert -->
      <form action="<?= BASEURL; ?>/genre/updategenre/<?= $data['genre']['genre_slug']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?= $data['genre']['id']; ?>">
        <input type="hidden" name="genre_slug" value="<?= $data['genre']['genre_slug']; ?>">
        <input type="hidden" name="oldImage" value="<?= $data['genre']['image']; ?>">
        <div class="card bg-dark text-white mb-3">
          <img src="<?= BASEURL; ?>/public/img/<?= $data['genre']['image']; ?>" class="card-img img-preview">
          <div class="input-group">
            <input type="file" class="form-control mb-2 img-upload" id="image" name="image" onchange="previewImg(this)" value="<?= $data['genre']['image']; ?>">
          </div>
          <div class="input-group">
            <input type="text" class="form-control mb-2" id="name" name="name" placeholder="Name" value="<?= $data['genre']['name']; ?>">
          </div>
          <div class="input-group">
            <textarea class="form-control" aria-label="With textarea" placeholder="Description" name="description"><?= $data['genre']['description']; ?></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-warning px-5 me-2">Edit</button>
        <a href="<?= BASEURL; ?>/genre" class="btn btn-primary px-5">Back</a>
      </form>
    </div>
  </div>
</div>