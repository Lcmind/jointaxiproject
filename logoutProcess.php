<?php
  @session_start();
  $result = session_destroy();

  if($result) {
?>
  <script>
    location.href = "index.php";
  </script>
<?php }
?>
