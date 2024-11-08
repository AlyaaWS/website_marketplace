<?php
class Mkategori extends CI_Model {

    // Fungsi untuk mendapatkan semua kategori
    function tampil() {
        $q = $this->db->get("kategori");
        return $q->result_array();
    }

    // Fungsi untuk mendapatkan detail kategori berdasarkan ID
    function detail($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('kategori');
        return $q->row_array();
    }

    // Fungsi untuk mendapatkan produk berdasarkan kategori
    function produk($id_kategori) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
        $q = $this->db->get();
        return $q->result_array();
    }

}
