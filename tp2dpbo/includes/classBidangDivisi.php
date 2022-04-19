<?php

class BidangDivisi extends DB{

    // Mengambil data bidang divisi
    function getBidangDivisi(){
        $query = "SELECT * FROM bidang_divisi";
        return $this->execute($query);
    }

    // Tambah data bidang divisi
    function add($data){
        $jabatan = $data['jabatanBidang'];
        $id_divisi = $data['divisiBidang'];

        $query = "INSERT INTO bidang_divisi VALUES ('', '$jabatan', '$id_divisi')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    // Hapus data bidang divisi
    function delete($id){

        $query = "DELETE FROM bidang_divisi WHERE id_bidang = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

}

?>