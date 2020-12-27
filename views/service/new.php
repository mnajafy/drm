<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="mb-5">
                    <?= $service->getErrMsg(); ?>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="email" <?= $service->htmlValue('email'); ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Prix</label>
                        <input type="text" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</section>