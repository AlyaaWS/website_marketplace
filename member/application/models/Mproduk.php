<?php
class Mproduk extends CI_Model {

    function tampil() {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get();
        return $q->result_array();
    }

    function tampil_by_kategori($id_kategori) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('produk.id_kategori', $id_kategori);
        $q = $this->db->get();
        return $q->result_array();
    }

    function tampil_produk_terbaru() {
        $this->db->order_by('id_produk', 'desc');
        $q = $this->db->get('produk', 4, 0);
        return $q->result_array();
    }

    function produk_member($id_member) {
        $this->db->where('id_member', $id_member);
        $q = $this->db->get('produk');
        return $q->result_array();
    }

    function simpan($inputan) {
        $config['upload_path'] = $this->config->item("assets_produk");
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload("foto_produk")) {
            $inputan['foto_produk'] = $this->upload->data("file_name");
        }
        
        $inputan['id_member'] = $this->session->userdata("id_member");
        $this->db->insert('produk', $inputan);
    }

    function detail($id_produk) {
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get('produk');
        return $q->row_array();
    }

    function ubah($inputan, $id) {
        $config['upload_path'] = $this->config->item("assets_produk");
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload("foto_produk")) {
            $inputan['foto_produk'] = $this->upload->data("file_name");
        }

        $inputan['id_member'] = $this->session->userdata("id_member");
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $inputan);
    }

    function hapus($id_produk) {
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }

    function detail_umum($id_produk) {
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get('produk');
        return $q->row_array();
    }
}
