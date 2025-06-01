<?php $this->load->view('layout/header', ['title' => 'Edit Task']); ?>

<h2>Edit Task</h2>

<?= validation_errors('<div class="alert alert-danger">', '</div>') ?>

<?= form_open('tasks/edit/'.$task->id) ?>
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?= set_value('title', $task->title) ?>" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"><?= set_value('description', $task->description) ?></textarea>
    </div>

    <div class="mb-3">
        <label>Assigned To</label>
        <select name="assigned_to" class="form-control">
            <?php foreach ($users as $user): ?>
                <option value="<?= $user->id ?>" <?= $user->id == $task->assigned_to ? 'selected' : '' ?>>
                    <?= $user->username ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control" value="<?= set_value('due_date', $task->due_date) ?>" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending" <?= $task->status == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="in_progress" <?= $task->status == 'in_progress' ? 'selected' : '' ?>>in_progress</option>
            <option value="completed" <?= $task->status == 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>
    </div>

    <button class="btn btn-primary">Update Task</button>
<?= form_close() ?>

<?php $this->load->view('layout/footer'); ?>
