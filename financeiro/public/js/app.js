function updateDeleteModal(route){
  $("#form-delete").attr('action', route);
}

function uploadImage(){
  $('#img_source').click();
}

function changeImage(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#img_source_preview')
              .attr('src', e.target.result)
              .width('auto')
      };

      reader.readAsDataURL(input.files[0]);
  }
}