<?php

namespace App\Controllers;

class Home extends BaseController {
    public function index() {
        $produkModel = new ProdukModel(); 
        $produk = $produkModel->findAll();
        $data['produks'] = $produk;
        
        return view('home_view');
    }
}
