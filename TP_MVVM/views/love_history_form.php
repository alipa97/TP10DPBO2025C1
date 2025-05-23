<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($loveHistory) ? 'Edit Love History' : 'Add Love History'; ?></h2>
<form action="index.php?entity=loveHistory&action=<?php echo isset($loveHistory) ? 'update&id=' . $loveHistory['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama yg jatuh cinta:</label>
        <input type="text" name="lover_name" value="<?php echo isset($loveHistory) ? $loveHistory['lover_name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Nama Crush:</label>
        <select name="crush_id" class="border p-2 w-full" required>
            <?php foreach ($crushes as $crush): ?>
            <option value="<?php echo $crush['id']; ?>" <?php echo isset($loveHistory) && $loveHistory['crush_id'] == $crush['id'] ? 'selected' : ''; ?>><?php echo $crush['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Tanggal Mulai Jatuh Cinta:</label>
        <input type="date" name="start_date" value="<?php echo isset($loveHistory) ? $loveHistory['start_date'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Status:</label>
        <select name="status_id" class="border p-2 w-full" required>
            <?php foreach ($loveStatuses as $status): ?>
            <option value="<?php echo $status['id']; ?>" <?php echo isset($loveHistory) && $loveHistory['status_id'] == $status['id'] ? 'selected' : ''; ?>><?php echo $status['status_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>