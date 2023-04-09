/*function is_clicked() {
    $(document).ready(function() {
        $('#follow').on('click', function(event) {
          event.preventDefault();
          var link = $(this);
          $.ajax({
            type: 'POST',
            url: 'post.php',
            data: { action: 'toggle-isAmi' },
          });
        });
      });
}*/

function removeLink() {
    var link = document.getElementById("follow");
    link.parentNode.removeChild(link);
}
  
  

