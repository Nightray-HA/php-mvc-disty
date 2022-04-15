<div class="container mt-5">
  <? var_dump($data) ?>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['jurusan']['NAMA_JURUSAN']; ?></h5>
      <h6>Mata kuliah tersedia :</h6>
      <?php if ($data['jurusan']['MK'] == null) {
        echo '<p>Belum ada mata kuliah</p>';
      } else {
        foreach ($data['jurusan'] as $jurusan) : ?>
          <p><?= $jurusan['MK'] ?></p>
      <?php endforeach;
      } ?>
      <a href="<?= BASEURL; ?>/jurusan" class="card-link">Kembali</a>
    </div>
  </div>

</div>