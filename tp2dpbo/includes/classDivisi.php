<?php

class Divisi extends DB{

    // Mengambil data divisi
    function getDivisi(){
        $query = "SELECT * FROM divisi";
        return $this->execute($query);
    }

    // Tambah data divisi
    function add($data){
        $nama_divisi = $data['namaDivisi'];

        $query = "INSERT INTO divisi VALUES ('', '$nama_divisi')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    // Hapus data divisi
    function delete($id){

        $query = "DELETE FROM divisi WHERE id_divisi = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

}

?>