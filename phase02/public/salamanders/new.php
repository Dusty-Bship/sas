<?php

require_once('../../private/initialize.php');

$test = $_GET['test'] ?? '';

if($test =='404') {
  error_404();
} elseif($test == '500') {
  error_500();
} elseif($test == 'redirect') {
  redirect_to(url_for('/salamanders/index.php'));
}

$page_title = 'Create Salamander'; 
include(SHARED_PATH . '/salamander-header.php'); 
?>

<a href="index.php"><< Back to List</a>
<h1>Create Salamander</h1>

<form action ="<?= url_for('/salamanders/create.php'); ?>" method="post">
  <label for="salamanderName">Name</label><br>
  <input type="text" name="salamanderName"><br>
  <input type="submit" value="Create Salamander">
</form>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>