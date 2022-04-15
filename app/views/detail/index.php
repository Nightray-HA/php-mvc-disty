<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['mhs']['NAMA']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['NRP']; ?></h6>
            <p class="card-text"><?= $data['mhs']['EMAIL']; ?></p>
            <p class="card-text"><?= $data['mhs']['NAMA_JURUSAN']; ?></p>
            <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
        </div>
    </div>

    <div>
        <h4>Pilih Mata Kuliah</h4>
        <form action="<?= BASEURL; ?>/detail/tambah" method="post">
            <input type="hidden" name="mhs" id="mhs" value="<?= $data['mhs']['ID_MHS'] ?>">
            <div class="form-group">
                <label for="mk">Jurusan</label>
                <select class="form-control" id="mk" name="mk">
                    <?php
                    foreach ($data['mk'] as $mk) : ?>
                        <option value="<?= $mk['ID_MATKUL'] ?>"><?= $mk['NAMA_MATKUL'] ?></option>
                    <?php endforeach;
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Mata Kuliah </button>
        </form>
    </div>
</div>