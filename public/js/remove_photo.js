$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
       $("#photo_type_bld").on("change", function(e) {
        var files = e.target.files,
        filesLength = files.length;
        for (var i = 0; i < filesLength; i++) {
         var f = files[i]
         var fileReader = new FileReader();
         fileReader.onload = (function(e) {
           var file = e.target;
           $("<span class=\"pip\">" +
           "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
           "<br/><span class=\"remove\">ลบรูป</span>" +
           "</span>").insertAfter("#photo_type_bld");
           $(".remove").click(function(){
           $(this).parent(".pip").remove();
          });
         });
         fileReader.readAsDataURL(f);
         }
       });
    } 
    
   });