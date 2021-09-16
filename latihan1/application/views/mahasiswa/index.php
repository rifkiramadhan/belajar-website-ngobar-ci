<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach( $mahasiswa as $mhs ) : ?>
                    <li class="list-group-item"><?= $mhs['nama']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>