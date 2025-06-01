<?php $this->load->view('layout/header', ['title' => 'Add Task']); ?>

<div class="container mt-4">
    <h3>Add Task</h3>
    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?= form_open('tasks/create') ?>

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Assign To</label>
        <select name="assigned_to" class="form-control" required>
            <option value="">-- Select User --</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user->id ?>"><?= $user->username ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending">Pending</option>
            <option value="in_progress">in_progress</option>
             <option value="completed">Completed</option>
        </select>
    </div>

    <button class="btn btn-success">Save</button>
    <a href="<?= site_url('tasks') ?>" class="btn btn-secondary">Cancel</a>

    <?= form_close(); ?>
</div>

<?php $this->load->view('layout/footer'); ?>
