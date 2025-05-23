<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Love History List</h2>
<a href="index.php?entity=loveHistory&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Love History</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Nama</th>
        <th class="border p-2">Crush</th>
        <th class="border p-2">Status</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($loveHistoryList as $loveHistory): ?>
    <tr>
        <td class="border p-2"><?php echo $loveHistory['lover_name']; ?></td>
        <td class="border p-2"><?php echo $loveHistory['crush_name']; ?></td>
        <td class="border p-2"><?php echo $loveHistory['status_name']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=loveHistory&action=edit&id=<?php echo $loveHistory['id']; ?>" class="text-blue-500">Edit</a>
            <a href="index.php?entity=loveHistory&action=delete&id=<?php echo $loveHistory['id']; ?>" class="text-red-500 ml-2" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>