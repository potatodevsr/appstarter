<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Login</h1>

<?= form_open("/appstarter/login/create") ?>

<div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" 
                value="<?= old('name') ?>">
</div>

<div>
        <label for="email">Password</label>
        <input type="Password" name="password">
</div>

<button>Log in</button>


</form>

<?= $this->endSection() ?>