 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Dashboard extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            if ($this->session->userdata('id_user') != "1") {

    ?>
             <script type="text/javascript">
                 alert('Anda tidak berhak mengakses halaman ini!');
                 window.location = '<?php echo base_url("perhitungan/index"); ?>'
             </script>
 <?php
            }
            $data['page'] = "Dashboard";
            $this->load->view('admin/index', $data);
        }
    }
