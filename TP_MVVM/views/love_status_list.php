<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Love Status List</h2>
<a href="index.php?entity=loveStatus&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Status</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Status Name</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($loveStatusList as $loveStatus): ?>
    <tr>
        <td class="border p-2"><?php echo $loveStatus['status_name']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=loveStatus&action=edit&id=<?php echo $loveStatus['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=loveStatus&action=delete&id=<?php echo $loveStatus['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>