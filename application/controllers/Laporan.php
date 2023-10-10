<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Perhitungan_model');
        $this->load->library('mypdf');
        // $this->load->library('PHPExcel');
    }

    public function index()
    {
        $data = [
            'hasil' => $this->Perhitungan_model->get_hasil()
        ];

        $this->load->view('laporan', $data);
    }

    public function pdf()
    {
        $data = [
            'page' => "Pdf",
            'hasil' => $this->Perhitungan_model->get_hasil()
        ];
        $this->mypdf->generate('cetakpdf', $data, 'laporan-penerima-bantuan-sosial', 'A4', 'potrait');
    }

    public function excel()
    {
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Data Penerima Bantuan Sosial")
            ->setSubject("Penerima Bantuan Sosial")
            ->setDescription("Laporan Semua Data Penerima Bantuan Sosial")
            ->setKeywords("Data Penerima Bantuan Sosial")
            ->setCategory('Data');

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENERIMA BANTUAN SOSIAL DESA SEKARWANGI"); // Set kolom A1 
        $excel->getActiveSheet()->mergeCells('A1:D1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NAMA"); // Set kolom B3 
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NILAI"); // Set kolom C3 
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "RANK"); // Set kolom D3 

        // Add data to the sheet
        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getActiveSheet();

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $hasil = $this->Perhitungan_model->get_hasil();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($hasil as $data) { // Lakukan looping pada variabel hasil

            $nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($data->id_alternatif);

            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $nama_alternatif['nama']);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nilai);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $no);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(35); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D

        // Set headers
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Penerima Bantuan Sosial.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save('php://output');
    }
}
