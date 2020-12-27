<section class="py-5">
    <div class="container">
        <p><b>bienvenue : </b><?= $auth->getData('email') ?></p>
        <a href="<?= $this->to(['url' => 'admin/disconnect']) ?>" class="btn btn-primary">deconexion</a>
        <a href="<?= $this->to(['url' => 'admin/update', 'email' => $auth->getData('email')]) ?>" class="btn btn-danger">Update</a>
    </div>
</section>