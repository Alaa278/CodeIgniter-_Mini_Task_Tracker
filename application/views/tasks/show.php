<?php $this->load->view('layout/header', ['title' => 'Task Details']); ?>

<h2>Task Details</h2>

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <td><?= $task->title ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?= $task->description ?></td>
    </tr>
    <tr>
        <th>Assigned To</th>
        <td><?= $task->assigned_user ?></td>
    </tr>
    <tr>
        <th>Due Date</th>
        <td><?= $task->due_date ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?= $task->status ?></td>
    </tr>
</table>

<a href="<?= site_url('tasks') ?>" class="btn btn-secondary">Back to List</a>

<?php $this->load->view('layout/footer'); ?>
