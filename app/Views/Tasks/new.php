<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>New task<?= $this->endSection() ?>
<?= $this->section('content') ?>

<h1>New task</h1>

<?= form_open("/tasks/create") ?>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="">
    </div>
    <button>Save</button>
    <a href="<?= ("/tasks") ?>">Cancle</a>
</form>

<?= $this->endSection() ?>