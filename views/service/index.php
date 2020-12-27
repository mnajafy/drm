<section class="py-5">
    <div class="container">
    <a href="<?= $this->to(['url' => 'service/new']) ?>" class="btn btn-primary mb-3">New</a>
    <a href="<?= $this->to(['url' => 'category/new']) ?>" class="btn btn-primary mb-3">New Category</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Prix</th>
                    <th scope="col">categorie</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td>12.00 $</td>
                    <td>alpha</td>
                    <td>
                        <a href="#" class="btn btn-primary">view</a>
                        <a href="#" class="btn btn-primary">update</a>
                        <a href="#" class="btn btn-primary">delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>