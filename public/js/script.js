// ===============
//  Preview image
// ===============
function previewImg(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.img-preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    console.log(reader);
  }
}
$(".img-upload").change(function() {
  previewImg(this);
});


// function previewImg() 
// {
//   const image = document.querySelector('#image');
//   const imageLabel = document.querySelector('.img-upload');
//   const imgPreview = document.querySelector('.img-preview');

//   // imageLabel.textContent = image.files[0].name;

//   const imageFile = new FileReader();
//   console.log(imageFile);
//   imageFile.readAsDataURL(image.files[0]);

//   imageFile.onload = function(e) {
//     imgPreview.src = e.target.result;
//   }
// }