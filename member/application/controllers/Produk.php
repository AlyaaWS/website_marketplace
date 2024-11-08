<?php
class Produk extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

    // Fungsi untuk menampilkan semua produk dan kategori
    function index() {
        $this->load->model("Mproduk");
        $this->load->model("Mkategori");
        
        $kategori_id = $this->input->get('kategori'); // Mendapatkan kategori dari parameter GET
        $data['kategori_id'] = $kategori_id; // Untuk menandai kategori yang dipilih
        
        if ($kategori_id) {
            $data['produk'] = $this->Mproduk->tampil_by_kategori($kategori_id);
        } else {
            $data['produk'] = $this->Mproduk->tampil();
        }
        
        $data['kategori'] = $this->Mkategori->tampil();

        $this->load->view('header');
        $this->load->view('produk_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_produk) {
        $this->load->model('Mproduk');
        $data["produk"] = $this->Mproduk->detail_umum($id_produk);

        $inputan = $this->input->post();
        if ($inputan) {
            $this->load->model("Mkeranjang");
            $this->Mkeranjang->simpan($inputan, $id_produk);

            $this->session->set_flashdata('pesan_sukses', 'Produk masuk ke keranjang belanja');
            redirect('', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('produk_detail', $data);
        $this->load->view('footer');
    }
}
