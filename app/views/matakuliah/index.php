<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mata Kuliah
            </button>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/matakuliah/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="cari matakuliah.." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Mata Kuliah</h3>
            <ul class="list-group">
                <?php foreach ($data['mk'] as $mk) : ?>
                    <li class="list-group-item">
                        <?= $mk['NAMA_MATKUL']; ?>
                        <a href="<?= BASEURL; ?>/matakuliah/hapus/<?= $mk['ID_MATKUL']; ?>" class="mr-2 btn btn-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                        <a href="<?= BASEURL; ?>/matakuliah/ubah/<?= $mk['ID_MATKUL']; ?>" class="mr-2 btn btn-success float-right tampilModalMatKul" data-toggle="modal" data-target="#formModal" data-id="<?= $mk['ID_MATKUL']; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/matakuliah/detail/<?= $mk['ID_MATKUL']; ?>" class="mr-2 btn btn-primary float-right">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/matakuliah/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <?php
                            foreach ($data['jurusan'] as $jurusan) : ?>
                                <option value="<?= $jurusan['ID_JURUSAN'] ?>"><?= $jurusan['NAMA_JURUSAN'] ?></option>
                            <?php endforeach;
                            ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>