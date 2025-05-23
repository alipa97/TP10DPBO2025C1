<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($loveStatus) ? 'Edit Love Status' : 'Add Love Status'; ?></h2>
<form action="index.php?entity=loveStatus&action=<?php echo isset($loveStatus) ? 'update&id=' . $loveStatus['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">love Status Name:</label>
        <input type="text" name="status_name" value="<?php echo isset($loveStatus) ? $loveStatus['status_name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>