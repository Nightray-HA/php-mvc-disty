<div class="container mt-5">

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['mhs']['NAMA']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['NRP']; ?></h6>
      <p class="card-text"><?= $data['mhs']['EMAIL']; ?></p>
      <p class="card-text"><?= $data['mhs']['NAMA_JURUSAN']; ?></p>
      <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
    </div>
  </div>

  <div class="mt-2">
    <h3>Matkul yang diambil:</h3>
    <table class="table ">
      <tbody>
        <tr>
          <?php foreach ($data['d'] as $d) : ?>
            <td><?= $d['NAMA_MATKUL'] ?></td>
          <?php endforeach; ?>
        </tr>
        <tr>
      </tbody>
    </table>
  </div>
</div>