<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="mb-5">
                    <?= $category->getErrMsg(); ?>
                    <?= $category->getValidMsg(); ?>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titre :</label>
                        <input type="text" name="title" <?= $category->htmlValue('title'); ?> class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</section>