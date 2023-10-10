<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Alternatif_model');

        if ($this->session->userdata('id_user') != "1") {

?>
<script type="text/javascript">
alert('Anda tidak berhak mengakses halaman ini!');
window.location = '<?php echo base_url("perhitungan/index"); ?>'
</script>
<?php
        }
    }

    public function index()
    {
        // $data = [
        //     'page' => "Alternatif",
        //     'list' => $this->Alternatif_model->tampil(),

        // ];
        // $this->load->view('alternatif/index', $data);
        redirect('alternatif/loadRecord');
    }

    public function loadRecord($rowno = 0)
    {

        // Search text
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }

        // Row per page
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        // All records count
        $allcount = $this->Alternatif_model->getrecordCount($search_text);

        // Get records
        $users_record = $this->Alternatif_model->getData($rowno, $rowperpage, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url() . '/Alternatif/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        /*
      start 
      add boostrap class and styles
    */
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        /*
      end 
      add boostrap class and styles
    */

        // Initialize
        $this->pagination->initialize($config);

        $data['page'] = "Alternatif";
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        // Load view
        $this->load->view('alternatif/index', $data);

        // $this->load->view('user_view', $data);
    }

    public function import_excel()
    {
        $data['page'] = "Upload File Data Alternatif";
        $this->load->view('alternatif/import_excel', $data);
    }

    public function excel()
    {
        if (isset($_FILES["file"]["name"])) {
            // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

            $object = PHPExcel_IOFactory::load($file_tmp);

            foreach ($object->getWorksheetIterator() as $worksheet) {

                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                for ($row = 4; $row <= $highestRow; $row++) {

                    $nama = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

                    $data[] = array(
                        'nama'          => $nama,
                    );
                }
            }

            $this->db->insert_batch('alternatif', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Import file excel berhasil disimpan!</div>');
            redirect('alternatif/loadRecord');
            
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Import file excel gagal disimpan!</div>');
            redirect('alternatif/loadRecord');
        
        }
    }

    //menampilkan view create
    public function create()
    {
        $data['page'] = "Alternatif";
        $this->load->view('alternatif/create', $data);
    }

    //menambahkan data ke database
    public function store()
    {
        $data = [
            'nama' => $this->input->post('nama')
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() != false) {
            $result = $this->Alternatif_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                redirect('alternatif/loadRecord');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data gagal disimpan!</div>');
            redirect('alternatif/create');
        }
    }

    public function edit($id_alternatif)
    {
        $alternatif = $this->Alternatif_model->show($id_alternatif);
        $data = [
            'page' => "Alternatif",
            'alternatif' => $alternatif
        ];
        $this->load->view('alternatif/edit', $data);
    }

    public function update($id_alternatif)
    {
        $id_alternatif = $this->input->post('id_alternatif');
        $data = array(
            'nama' => $this->input->post('nama')
        );

        $this->Alternatif_model->update($id_alternatif, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
        redirect('alternatif/loadRecord');
    }

    public function destroy($id_alternatif)
    {
        $this->Alternatif_model->delete($id_alternatif);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('alternatif/loadRecord');
    }
}