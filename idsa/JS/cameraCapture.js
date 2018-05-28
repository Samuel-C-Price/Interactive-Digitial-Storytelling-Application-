//Page 1
function readURL(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#image-upload-wrap1').hide();
      $('#file-upload-image1').attr('src', e.target.result);
      $('#file-upload-content1').show();
      $('#image-title1').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    removeUpload();
  }
}
function removeUpload() {
  $('#file-upload-input1').replaceWith($('#file-upload-input1').clone());
  $('#file-upload-content1').hide();
  $('#image-upload-wrap1').show();
}
