<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function index()
    {
        $data['cart'] = $this->cart->contents();

        $this->load->view('mockup/layout/core/header');
        $this->load->view('mockup/layout/core/css');
        $this->load->view('mockup/layout/core/topbar');
        $this->load->view('checkout', $data);
        $this->load->view('mockup/layout/core/footer');
    }

    function hapus_cart()
    { //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo json_encode(['status' => true]);
        exit;
    }

    public function send()
    {
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'bms.bintangmuarasejati@gmail.com';
        $config['smtp_pass'] = 'www.bintangmuarasejati.com';
        $config['charset'] = 'iso-8859-1';
        $config['smtp_port'] = 465;
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";

        $data = array(
            'name' => $this->input->post('nama'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('address'),
            'payment' => $this->input->post('paymentMethod'),
            'an' => $this->input->post('cc-name'),
            'rek' => $this->input->post('cc-number'),
            'invoice' => date('YmdHis'),
            'date' => date('Y-m-d H:i:s')
        );
        
        $this->load->library('email', $config);

        // $this->load->view('invoice', $data);
        // return;

        $this->email->from('no-reply@bintangmuarasejati.com', 'Konfirmasi Pembelian');
        $this->email->to($data['email']);
        $this->email->subject('Invoice #' . $data['invoice']);
        $this->email->message($this->load->view('invoice', $data, true));

        if ($this->email->send()) {
            echo 'Email berhasil dikirim';
        } else {
            echo 'Email tidak berhasil dikirim';
            echo '<br />';
            echo $this->email->print_debugger();
        }
    }
}
