
<?php $this->load->view('layout/header', ['title' => 'Task List']); ?>

<h2>Task List</h2>
<?php if ($this->session->userdata('role') === 'admin'): ?>
    <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary mb-3">Back to Dashboard</a>
<?php endif; ?>

<a href="<?= site_url('tasks/create') ?>" class="btn btn-success mb-3">Add Task</a>

<form method="get" class="row g-3 mb-3">
    <div class="col-auto">
        <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="pending" <?= ($status_filter == 'pending') ? 'selected' : '' ?>>Pending</option>
            <option value="completed" <?= ($status_filter == 'completed') ? 'selected' : '' ?>>Completed</option>
            <option value="in_progress" <?= ($status_filter == 'in_progress') ? 'selected' : '' ?>>in_progress</option>

        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-secondary">Filter</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th><th>Assigned To</th><th>Status</th><th>Due Date</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= $task->title ?></td>
            <td><?= $task->assigned_user ?></td>
            <td><?= $task->status ?></td>
            <td><?= $task->due_date ?></td>
            <td>
                <a href="<?= site_url('tasks/show/'.$task->id) ?>" class="btn btn-info btn-sm">Show</a>
                <a href="<?= site_url('tasks/edit/'.$task->id) ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="<?= site_url('tasks/delete/'.$task->id) ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this task?')">Delete</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="mt-3">
    <?= $pagination_links ?>
</div>


<?php $this->load->view('layout/footer'); ?>
