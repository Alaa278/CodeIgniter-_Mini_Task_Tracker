<?php $this->load->view('layout/header', ['title' => 'Admin Dashboard']); ?>

<h2>Admin Dashboard</h2>
<a href="<?= site_url('tasks') ?>" class="btn btn-outline-info m-3">View Tasks</a>

<div class="row text-center">
    <div class="col-md-4">
        <div class="card bg-primary text-white mb-3">
            <div class="card-body">
                <h4>Total Tasks</h4>
                <p class="display-6"><?= $total_tasks ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white mb-3">
            <div class="card-body">
                <h4>Completed Tasks</h4>
                <p class="display-6"><?= $completed_tasks ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-danger text-white mb-3">
            <div class="card-body">
                <h4>Overdue Tasks</h4>
                <p class="display-6"><?= $overdue_tasks ?></p>
            </div>
        </div>
    </div>
</div>

<h4>Users</h4>
<table class="table table-bordered">
    <thead>
        <tr><th>ID</th><th>Username</th></tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr><td><?= $user->id ?></td><td><?= $user->username ?></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->load->view('layout/footer'); ?>
