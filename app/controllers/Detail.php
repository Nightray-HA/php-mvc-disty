<?php

class Detail extends Controller
{
    public function index($id)
    {
        $data['judul'] = 'Tambah Mata Kuliah';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $data['mk'] = $this->model('Mahasiswa_model')->getMatkulByMahasiswaID($id);
        $this->view('templates/header', $data);
        $this->view('detail/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Detail_model')->tambahDataDetail($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}
