<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index');
        } else {
            // Process login
            $this->dologin();
        }
    }

    public function dologin()
    {
        $user = $this->input->post('email');
        $pswd = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['email' => $user])->row_array(); // cari user berdasarkan email
        
        if ($user) { // jika user terdaftar
            if (password_verify($pswd, $user['password'])) { // periksa password-nya
                $data = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                $userid = $user['id'];
                $this->session->set_userdata($data);
                
                $this->_updateLastLogin($userid);

                if ($user['role'] == 'PEMILIK') { // periksa role-nya
                    redirect('menu');
                } else if ($user['role'] == 'ADMIN') {
                    redirect('user');
                } else if ($user['role'] == 'KASIR') {
                    redirect('kasir');
                } else {
                    redirect('login');
                }
            } else { // jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error :</b> Password Salah.</div>');
                redirect('/');
            }
        } else { // jika user tidak terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error :</b> User Tidak Terdaftar.</div>');
            redirect('/');
        }
    }

    private function _updateLastLogin($userid)
    {
        $sql = "UPDATE user SET last_login=now() WHERE id=?";
        $this->db->query($sql, array($userid));
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

    public function block()
    {
        $this->load->helper('pos_helper');

        $data = array(
            'user' => infologin(),
            'title' => 'Access Denied!'
        );
        $this->load->view('login/error04', $data);
    }
}
