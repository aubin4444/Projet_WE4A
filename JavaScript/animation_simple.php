<script>

    function like_click() {
    var image = document.getElementById('like_img');
    if (image.src.match("./images/like_off.png")) {
        image.src = "./images/like_on.png";
    } else {
        image.src = "./images/like_off.png";
    }
    }

</script>