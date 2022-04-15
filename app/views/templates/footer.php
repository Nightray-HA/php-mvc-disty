<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script>
    $(function() {
        //Ori
        $('.tombolTambahData').on('click', function() {
            $('#formModalLabel').html('Tambah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#nama').val('');
            $('#nrp').val('');
            $('#email').val('');
            $('#jurusan').val('');
            $('#id').val('');
        });
        // Jurusan
        $('.tombolTambahJurusan').on('click', function() {
            $('#formModalLabel').html('Tambah Data Jurusan');
            $('.modal-footer button[type=submit]').html('Tambah Data');
            $('#nama').val('');
        });


        //Ori
        $('.tampilModalUbah').on('click', function() {

            $('#formModalLabel').html('Ubah Data Mahasiswa');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/mahasiswa/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= BASEURL; ?>/mahasiswa/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama').val(data.NAMA);
                    $('#nrp').val(data.NRP);
                    $('#email').val(data.EMAIL);
                    $('#jurusan').val(data.NAMA_JURUSAN);
                    $('#id').val(data.NAMA_JURUSAN);
                }
            });

        });

        //Jurusan
        $('.tampilModalJurusan').on('click', function() {

            $('#formModalLabel').html('Ubah Data Jurusan');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/jurusan/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= BASEURL; ?>/jurusan/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama').val(data.NAMA_JURUSAN);
                    $('#id').val(data.ID_JURUSAN);
                }
            });

        });

        //Matkul
        $('.tampilModalMatKul').on('click', function() {

            $('#formModalLabel').html('Ubah Data Mata Kuliah');
            $('.modal-footer button[type=submit]').html('Ubah Data');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/matakuliah/ubah');

            const id = $(this).data('id');

            $.ajax({
                url: '<?= BASEURL; ?>/matakuliah/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama').val(data.NAMA_MATKUL);
                    $('#id').val(data.ID_MATKUL);
                }
            });

        });
    });
</script>
</body>

</html>