<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Welcome</h1>

    <a href="<?= site_url("/appstarter/signup") ?>">Sign up</a>

    <?php if (current_user()): ?>

    <p>User is logged in</p>

    <p>Hello <?= esc(current_user()->name) ?></p>

    <a href="<?= site_url("/appstarter/logout") ?>">Log out</a>

<?php else: ?>

    <p>User is not logged in</p>
    
    <a href="<?= site_url("/appstarter/login") ?>">Log in</a>


<?php endif; ?>

<?= $this->endSection() ?>