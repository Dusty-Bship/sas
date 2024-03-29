<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php'); 

$id = $_GET['id'];

$salamander = find_salamander_by_id($id);

if (is_post_request()) {
  $salamander = [];
  $salamander['id'] = $id;
  $salamander['name'] = $_POST['name'] ?? '';
  $salamander['habitat'] = $_POST['habitat'] ?? '';
  $salamander['description'] = $_POST['description'] ?? '';
  $result = update_salamander($salamander);
  redirect_to(url_for('salamanders/show.php?id=' . $id));
} else {
  $salamander = find_salamander_by_id($id);

  $salamander_set = find_all_salamanders();
  $salamander_count = mysqli_num_rows($salamander_set);
  mysqli_free_result($salamander_set);
}
?>

<form action="<?= url_for('salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
<label for="name">
     <p>Name:<br> <input type="text" name="name" value="<?= h($salamander['name']); ?>"></p>
 </label>
 <label for="habitat">
   <textarea rows="4" cols="50" name="habitat">
     <p>Habitat: <br>
            <?= h($salamander['habitat']); ?>
        </textarea>
    </p>
</label>
 <label for="description">
     <p>Description:<br>
         <textarea rows="4" cols="50" name="description">
            <?= h($salamander['description']); ?>
        </textarea> 
     </p>
 </label>
 <lable for="submit">
     <p><input type="submit" value="Edit Salamander"></p>
 </label>
</form>

<?php
include(SHARED_PATH . '/salamander-footer.php'); 
?>
