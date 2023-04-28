<?php require_once('../../private/initialize.php'); 

$page_title = 'Salamander Details';
include(SHARED_PATH . '/salamander-header.php'); 
$id = $_GET['id'] ?? '1'; 
$salamander = find_salamander_by_id($id);
?>

<h2>Salamander Details</h2>
<p>ID:<?= h($salamander['id']); ?></p>
<p>Name:<?= h($salamander['name']); ?></p>
<p>Habitat:<br> <?= h($salamander['habitat']); ?> </p>
<p>Description:<br> <?= h($salamander['description']); ?></p>

<p><a href="<?= url_for('/salamanders/index.php'); ?>">&laquo; Back to Salamander List</a></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
