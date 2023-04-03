<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Tasks<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Tasks</h1>

    <a href="/appstarter/tasks/new">New Task</a>

    <ul>
        <?php foreach($tasks as $task): ?>
            <li>
                <a href="<?= "/appstarter/tasks/show/" . $task['id'] ?>">
                <?= $task['description'] ?>
                </a>
            </li>      
        <?php endforeach; ?>
    </ul>

<?= $this->endSection() ?>