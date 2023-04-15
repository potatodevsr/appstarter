<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Edit task<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Edit task</h1>

<?php if (session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("/appstarter/tasks/update/" . $task->id) ?>
    <?= $this->include('Tasks/form') ?>

    <button>Save</button>
    
    <a href="<?= site_url("/appstarter/tasks/show/" . $task->id) ?>">Cancel</a>

</form>

<?= $this->endSection() ?>