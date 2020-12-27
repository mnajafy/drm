<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" <?= $auth->htmlValue('email'); ?> class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </form>
            </div>
            <div class="col-md-6">
                <?= $auth->getErrMsg(); ?>
            </div>
        </div>
    </div>
</section>