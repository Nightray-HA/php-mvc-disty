<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' m join jurusan j on m.ID_JURUSAN=j.ID_JURUSAN WHERE m.ID_MHS=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getDetailByMahasiswaID($id)
    {
        $this->db->query('SELECT mk.NAMA_MATKUL FROM detail d join matakuliah mk on mk.ID_MATKUL=d.ID_MATKUL WHERE d.ID_MHS = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    public function getMatkulByMahasiswaID($id)
    {
        $this->db->query('SELECT ID_MATKUL, NAMA_MATKUL FROM matakuliah mk join jurusan j on mk.ID_JURUSAN=j.ID_JURUSAN join mahasiswa m on m.ID_JURUSAN=j.ID_JURUSAN WHERE m.ID_MHS = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                  (null,:jurusan, :nrp, :nama, :email )";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE ID_MHS = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    NAMA = :nama,
                    NRP = :nrp,
                    EMAIL = :email,
                    ID_JURUSAN = :jurusan
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
