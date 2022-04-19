<?php

class Pengurus extends DB{

    // Mengambil data pengurus
    function getPengurus(){
        $query = "SELECT * FROM pengurus JOIN bidang_divisi ON pengurus.id_bidang=bidang_divisi.id_bidang ORDER BY pengurus.nim";
        return $this->execute($query);
    }

    function getPengurusJoin(){
        $query = "SELECT * FROM pengurus JOIN divisi ON pengurus.divisi_id=divisi.divisi_id JOIN jabatan ON pengurus.jabatan_id=jabatan.jabatan_id ORDER BY pengurus.pengurus_id";

        return $this->execute($query);
    }

    // Tambah data pengurus
    function add($data){
        $nim = $data['nimPengurus'];
        $nama = $data['namaPengurus'];
        $semester = $data['semesterPengurus'];
        $foto = $data['fotoPengurus'];
        $id_bidang = $data['bidangPengurus'];

        $query = "INSERT INTO pengurus VALUES ('$nim', '$nama', '$semester', '$foto', '$id_bidang')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    // Hapus data pengurus
    function delete($id){

        $query = "DELETE FROM bidang_divisi WHERE id_bidang = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

}

?>