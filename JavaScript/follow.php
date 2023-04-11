<script>
    function is_clicked($id){
        var buton = document.getElementById("follow");
        buton.addEventListener("click", function(){
            <?php
                $query_maj_follow = "UPDATE ami SET isAMI='1' WHERE id_utilisateur='".$_SESSION['userID']."' AND id_ami='".$id."';";
                $result_maj_follow = $conn->query($query_maj_follow);
            ?>
        });
    }

</script>
  
  

