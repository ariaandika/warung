<?php

namespace App\Controllers;

class Page extends BaseController {
  public function keranjang() {
    return view('pages/keranjang_view');
  }
  public function produk() {
    return view('pages/produk_view');
  }
}
