<div class="container">
    <h3 class="mt-3">List of Peoples</h3>

    <div class="row">
        <div class="col-md">

            <!-- Fitur Pencarian -->
            <div class="row">
                <div class="col-md-5">

                    <h5>Results : <?= $total_rows; ?></h5>

                    <form action="<?= base_url('peoples'); ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Mahasiswa ..." name="keyword" autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if( empty($peoples) ) : ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    Data not found!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach( $peoples as $people ) : ?>
                    <tr>
                        <th><?= ++$start; ?></th>
                        <td><?= $people['name']; ?></td>
                        <td><?= $people['email']; ?></td>
                        <td>
                            <a href="" class="badge badge-warning">Detail</a>
                            <a href="" class="badge badge-success">Edit</a>
                            <a href="" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>