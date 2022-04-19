<?php

class Pengurus extends DB{

    // Mengambil data pengurus
    function getPengurus(){
        $query = "SELECT * FROM pengurus";
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