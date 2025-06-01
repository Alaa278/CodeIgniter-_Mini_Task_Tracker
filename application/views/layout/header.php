<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'Task Tracker' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="<?= site_url('tasks') ?>">Task Tracker</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <?php if ($this->session->userdata('logged_in')): ?>
                <li class="nav-item">
                    <span class="nav-link text-white">Welcome, <?= $this->session->userdata('username') ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('auth/logout') ?>">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container mt-4">
