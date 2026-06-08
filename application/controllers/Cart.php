<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
        $this->load->model('Products_model');
    }


   
public function add()
{
    $product_id = $this->input->post('product_id');
    $qty = (int)$this->input->post('qty');
    $product = $this->Products_model->read_by($product_id);

    $cart = $this->session->userdata('cart') ?? [];

    $cart_qty = 0;
    foreach ($cart as $item) {
        if ($item['product_id'] == $product_id) {
            $cart_qty = $item['qty'];
            break;
        }
    }

    if ($cart_qty + $qty > $product->stock) {
        echo 'Stok tidak cukup! Sisa stok: '.$product->stock;
        return;
    }

    $found = false;
    foreach ($cart as &$item) {
        if ($item['product_id'] == $product_id) {
            $item['qty'] += $qty;
            $found = true;
            break;
        }
    }
    unset($item);

    if (!$found) {
        $cart[] = [
            'product_id' => $product_id,
            'name'       => $product->name,
            'qty'        => $qty,
            'price'      => $product->price
        ];
    }

    $this->session->set_userdata('cart', $cart);
    echo 'Produk berhasil ditambahkan ke keranjang!';
}

    public function view()
    {
        $data['cart'] = $this->session->userdata('cart') ?? [];
        $this->load->view('cart/cart_view', $data);
    }

    public function remove($product_id)
    {
        $cart = $this->session->userdata('cart') ?? [];
        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart[$key]);
                break;
            }
        }
        $cart = array_values($cart);
        $this->session->set_userdata('cart', $cart);
        redirect('cart/view');
    }

    public function clear()
    {
        $this->session->unset_userdata('cart');
        redirect('cart/view');
    }
}