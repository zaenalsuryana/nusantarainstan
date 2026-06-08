<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function create_order($user_id, $address, $phone, $cart, $payment_method = null, $payment_proof = null)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['qty'] * $item['price'];
        }

        $order_data = [
            'user_id'          => $user_id,
            'order_date'       => date('Y-m-d H:i:s'),
            'status'           => 'pending',
            'total_price'      => $total,
            'shipping_address' => $address,
            'shipping_phone'   => $phone,
            'payment_method'   => $payment_method,
            'payment_proof'    => $payment_proof
        ];
        $this->db->insert('orders', $order_data);
        $order_id = $this->db->insert_id();

        foreach ($cart as $item) {
            $item_data = [
                'order_id'   => $order_id,
                'product_id' => $item['product_id'],
                'qty'        => $item['qty'],
                'price'      => $item['price'],
                'subtotal'   => $item['qty'] * $item['price']
            ];
            $this->db->insert('order_items', $item_data);

            $this->db->set('stock', 'stock - '.$item['qty'], FALSE)
                     ->where('id_product', $item['product_id'])
                     ->update('products');
        }

        return $order_id;
    }

    public function get_order($order_id)
    {
        $this->db->where('id_order', $order_id);
        $order = $this->db->get('orders')->row();

        if ($order) {
            $this->db->where('order_id', $order_id);
            $order->items = $this->db->get('order_items')->result();
        }

        return $order;
    }

    public function update_status($id_order, $status)
    {
        $this->db->where('id_order', $id_order)
                 ->update('orders', ['status' => $status]);
    }

    public function get_all_orders_detail($start_date = null, $end_date = null)
    {
        $this->db->select('orders.*, users.fullname, users.username');
        $this->db->from('orders');
        $this->db->join('users', 'users.userid = orders.user_id');
        if ($start_date && $end_date) {
            $this->db->where('order_date >=', $start_date);
            $this->db->where('order_date <=', $end_date);
        }
        $this->db->order_by('order_date', 'DESC');
        return $this->db->get()->result();
    }

    public function get_orders_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('order_date', 'DESC');
        return $this->db->get('orders')->result();
    }
}