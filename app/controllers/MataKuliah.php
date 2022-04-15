<?php

class MataKuliah extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['jurusan'] = $this->model('Jurusan_model')->getAllJurusan();
        $data['mk'] = $this->model('MataKuliah_model')->getAllMataKuliah();
        $this->view('templates/header', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mata Kuliah';
        $data['mk'] = $this->model('MataKuliah_model')->getMataKuliahById($id);
        $this->view('templates/header', $data);
        $this->view('matakuliah/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('MataKuliah_model')->tambahDataMataKuliah($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('MataKuliah_model')->hapusDataMataKuliah($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('MataKuliah_model')->getMataKuliahById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('MataKuliah_model')->ubahDataMataKuliah($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['mhs'] = $this->model('MataKuliah_model')->cariDataMataKuliah();
        $this->view('templates/header', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }
}
