<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Signup<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Signup</h1>

<?php if (session()->has('errors')): ?>
    <ul>
        <?php foreach(session('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= form_open("/appstarter/signup/create") ?>


<div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" 
                value="<?= old('name') ?>">
</div>

<div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" 
                value="<?= old('name') ?>">
</div>


<div>
        <label for="email">Password</label>
        <input type="Password" name="password">
</div>

<div>
        <label for="email">Repeat Password</label>
        <input type="Password" name="password_confirmation">
</div>

    <button>Sign up</button>
    
    <a href="<?= site_url("/appstarter") ?>">Cancel</a>

</form>

<?= $this->endSection() ?>