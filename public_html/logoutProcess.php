<?php
  @session_start();
  $result = session_destroy();

  if($result) {
?>
  <script>
    location.href = "main.php";
  </script>
<?php }
?>
