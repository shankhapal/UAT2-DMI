/*function img_pathUrl(input){
    $('#profile_photo_prev')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
}

$("#profile_photo").change(function(){
    img_pathUrl(this);
});*/

/*$(document).ready(()=>{
    $('#profile_photo').change(function(){
      const file = this.files[0];
      console.log(file);
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          console.log(event.target.result);
          $('#profile_photo_prev').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
  });*/

  /*$(document).ready(function() {
    // When the file input value changes (user selects an image)
    $("#profile_photo").change(function() {
      // Get the selected file from the input element
      const file = this.files[0];

      if (file) {
        // Create a FileReader object to read the selected file
        const reader = new FileReader();

        // When the FileReader finishes loading the file
        reader.onload = function(e) {
          // Create a new image element to display the preview
          const img = new Image();
          img.src = e.target.result;
          img.alt = "Preview Image";
          img.style.maxWidth = "100px";
          img.style.maxHeight = "100px";
          // Append the image element to the preview container
          $("#profile_photo_prev").replaceWith(img);
        };

        // Read the selected file as a data URL (base64 encoded)
        reader.readAsDataURL(file);
      } else {
        // If no file was selected, hide the image tag
        $("#profile_photo_prev").hide();
      }
    });
  });*/

  $(document).ready(function() {
    // When the file input value changes (user selects an image)
    $("#profile_photo").change(function() {
      // Get the selected file from the input element
      const file = this.files[0];

      if (file) {
        // Create a blob URL for the selected file
        const blobURL = URL.createObjectURL(file);

        // Create a new image element to display the preview
        const img = new Image();
        img.src = blobURL;
        img.alt = "Preview Image";
        img.style.maxWidth = "300px";
        img.style.maxHeight = "300px";

        // Remove the previous preview image (if any)
        $("#profile_photo_prev").remove();

        // Append the image element to the preview container
        $("#profile_photo").after(img);
      } else {
        // If no file was selected, remove the preview image
        $("#profile_photo_prev").remove();
      }
    });
  });