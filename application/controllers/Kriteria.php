<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Kriteria_model');

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
        $data['page'] = "Kriteria";
        $data['list'] = $this->Kriteria_model->tampil();
        $this->load->view('kriteria/index', $data);
    }

    //menampilkan view create
    public function create()
    {
        // Retrieve the total bobot from the model
        $bobot = $this->Kriteria_model->get_total_bobot()->result();

        // Convert $bobot to a numeric value if needed
        $bobot = floatval($bobot[0]->total);

        // Calculate the sum of $bobot and $tambah
        $total = 100 - $bobot;
        // var_dump($total);
        // die;
        $data['page'] = "Kriteria";
        $data['bobot'] = $total;
        $this->load->view('kriteria/create', $data);
    }

    //menambahkan data ke database
    public function store()
    {
        // Retrieve the total bobot from the model
        $bobot = $this->Kriteria_model->get_total_bobot()->result();

        // Get the value from the input
        $tambah = $this->input->post('bobot');

        // Convert $bobot to a numeric value if needed
        $bobot = floatval($bobot[0]->total);

        // Calculate the sum of $bobot and $tambah
        $total = $bobot + $tambah;

        if ($total > 100) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data bobot lebih dari 100!</div>');
            redirect('Kriteria/create');
            return; // Stop further execution
        }
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'bobot' => $this->input->post('bobot')
        ];

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|is_unique[kriteria.nama_kriteria]');
        $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required|is_unique[kriteria.kode_kriteria]');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');



        if ($this->form_validation->run() != false) {
            $result = $this->Kriteria_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
                redirect('Kriteria');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
            redirect('Kriteria/create');
        }
    }

    public function edit($id_kriteria)
    {
        // Retrieve the total bobot from the model
        $bobot = $this->Kriteria_model->get_total_bobot()->result();

        // Convert $bobot to a numeric value if needed
        $bobot = floatval($bobot[0]->total);

        // Calculate the sum of $bobot and $tambah
        $total = 100 - $bobot;

        $data['page'] = "Kriteria";
        $data['kriteria'] = $this->Kriteria_model->show($id_kriteria);
        $data['bobot'] = $total;
        $this->load->view('kriteria/edit', $data);
    }

    public function update($id_kriteria)
    {
        // Load the model
        $this->load->model('Kriteria_model');

        // Get existing data for the specified id
        $existing_data = $this->Kriteria_model->show($id_kriteria);

        if (empty($existing_data)) {
            show_404(); // Or handle the case where data doesn't exist
        }

        // Retrieve the total bobot from the model
        $bobot = $this->Kriteria_model->get_total_bobot()->result();

        // Get the value from the input
        $tambah = $this->input->post('bobot');

        // Convert $bobot to a numeric value if needed
        $bobot = floatval($bobot[0]->total);
        $bobotsebelumnya = $existing_data->bobot;

        // Calculate the sum of $bobot and $tambah
        $total = ($bobot - $bobotsebelumnya) + $tambah;

        if ($total > 100) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data bobot lebih dari 100!</div>');
            redirect('kriteria/edit/' . $id_kriteria); // Redirect back to the edit form with error messages
            return; // Stop further execution
        }


        // Retrieve input data
        $data = array(
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'kode_kriteria' => $this->input->post('kode_kriteria'),
            'bobot' => $this->input->post('bobot')
        );

        // Validate nama_kriteria and kode_kriteria for uniqueness
        if ($data['nama_kriteria'] != $existing_data->nama_kriteria) {
            $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|is_unique[kriteria.nama_kriteria]');
        }

        if ($data['kode_kriteria'] != $existing_data->kode_kriteria) {
            $this->form_validation->set_rules('kode_kriteria', 'Kode Kriteria', 'required|is_unique[kriteria.kode_kriteria]');
        }

        $this->form_validation->set_rules('bobot', 'Bobot', 'required');

        if ($this->form_validation->run() != false) {
            // Validation successful, update the data
            $this->Kriteria_model->update($id_kriteria, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate!</div>');
            redirect('kriteria');
        } else {
            // Validation failed
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diupdate!</div>');
            redirect('kriteria/edit/' . $id_kriteria); // Redirect back to the edit form with error messages
        }
    }

    public function destroy($id_kriteria)
    {
        $this->Kriteria_model->delete($id_kriteria);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('kriteria');
    }
}
