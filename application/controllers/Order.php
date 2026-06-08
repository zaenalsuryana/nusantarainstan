<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
        if (!$this->session->userdata('username')) redirect('auth/login');
    }

    
    public function checkout() {
        $cart = $this->session->userdata('cart');

        foreach ($cart as $item) {
            $product = $this->db->get_where('products', ['id_product' => $item['product_id']])->row();
            if ($item['qty'] > $product->stock) {
                $this->session->set_flashdata('msg', 'Stok produk '.$product->name.' tidak cukup!');
                redirect('cart/view');
                return;
            }
        }

        if ($this->input->method() === 'post') {
            $username = $this->session->userdata('username');
            $user = $this->db->get_where('users', ['username' => $username])->row();
            $user_id = $user->userid;
            $address = $user->address;
            $phone   = $user->phone;

            $payment_method = $this->input->post('payment_method');

            $order_id = $this->Order_model->create_order($user_id, $address, $phone, $cart, $payment_method);

            $this->session->unset_userdata('cart');
            redirect('order/invoice/'.$order_id);
        }  

        $username = $this->session->userdata('username');
        $data['user'] = $this->db->get_where('users', ['username' => $username])->row();
        $this->load->view('order/checkout', $data); 
    }

    public function invoice($order_id)
    {
        $data['order'] = $this->Order_model->get_order($order_id);
        $this->load->view('order/invoice', $data);
    }
    public function my_orders()
    {
    if ($this->session->userdata('usertype') != 'Customer') {
        redirect('auth/login');
        return;
    }
    $user_id = $this->session->userdata('userid');
    $data['orders'] = $this->Order_model->get_orders_by_user($user_id);
    $this->load->view('order/my_orders', $data);
}

   
    public function report()
    {
    $start_date = $this->input->get('start_date');
    $end_date   = $this->input->get('end_date');
    $data['orders'] = $this->Order_model->get_all_orders_detail($start_date, $end_date);
    $data['start_date'] = $start_date;
    $data['end_date'] = $end_date;
    $this->load->view('order/report', $data);
    }

    public function report_pdf()
    {
        $start_date = $this->input->get('start_date');
        $end_date   = $this->input->get('end_date');
        $orders = $this->Order_model->get_all_orders_detail($start_date, $end_date);

        $total = 0;
        foreach($orders as $order) {
            $total += $order->total_price;
        }

        $html = $this->load->view('order/report_pdf', [
            'orders' => $orders,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'total' => $total
        ], true);

        $this->load->library('dompdf_gen');
        $this->dompdf_gen->load_html($html);
        $this->dompdf_gen->render();
        $this->dompdf_gen->stream("order_report.pdf", array("Attachment" => 1));
    }
}