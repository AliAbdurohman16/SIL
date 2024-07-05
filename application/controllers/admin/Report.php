<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_detail_pembayaran');
	}

    public function index()
    {
        $data = [
            'title' => "Report",
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function prosess(){
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $data = [
            'title'         => "Hasil Laporan",
            'data'          => $this->M_detail_pembayaran->report($start_date, $end_date)->result(),
            'start_date'    => $start_date,
            'end_date'      => $end_date
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/laporan/index', $data);
    }

    // public function prosess(){
    //     ob_start(); // Start output buffering

    //     $start_date = $this->input->post('start_date');
    //     $end_date = $this->input->post('end_date');
    
    //     $data = [
    //         'title'         => "Laporan",
    //         'data'          => $this->M_detail_pembayaran->report($start_date, $end_date)->result(),
    //     ];
    
    //     // Load library excel
    //     require_once(APPPATH . 'libraries/PHPExcel-1.8/Classes/PHPExcel.php');
    //     require_once(APPPATH . 'libraries/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
    
    //     // Create new Excel object
    //     $object = new PHPExcel();

    //     // Set properties
    //     $object->getProperties()->setCreator("SIL");
    //     $object->getProperties()->setLastModifiedBy("SIL");
    //     $object->getProperties()->setTitle("Laporan");
    //     $object->setActiveSheetIndex(0);

    //     // Add data
    //     $object->getActiveSheet()->setCellValue('A1', 'Pasien');
    //     $object->getActiveSheet()->setCellValue('B1', 'Pemeriksaan');
    //     $object->getActiveSheet()->setCellValue('C1', 'Parameter');
    //     $object->getActiveSheet()->setCellValue('D1', 'Tanggal');
    //     $object->getActiveSheet()->setCellValue('E1', 'Tarif');

    //     $row = 2;

    //     foreach ($data['data'] as $key) {
    //         $object->getActiveSheet()->setCellValue('A'.$row, $key->nama);
    //         $object->getActiveSheet()->setCellValue('B'.$row, $key->jenis_pemeriksaan);
    //         $object->getActiveSheet()->setCellValue('C'.$row, $key->parameter);
    //         $object->getActiveSheet()->setCellValue('D'.$row, date('d-m-Y', strtotime($key->tanggal)));
    //         $object->getActiveSheet()->setCellValue('E'.$row, $key->tarif);
    //         $row++;
    //     }

    //     // Add total
    //     // $object->getActiveSheet()->setCellValue('D'.$row, 'Total:');
    //     // $object->getActiveSheet()->setCellValue('E'.$row, '=SUM(E2:E'.($row).')');

    //     $filename = "Data Laporan $start_date - $end_date" . ".xlsx";

    //     $object->getActiveSheet()->setTitle("Data Laporan");

    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment; filename="' . $filename . '"');
    //     header('Cache-Control: max-age=0');

    //     $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
    //     $writer->save('php://output');

    //     if ($writer){
	// 		$this->session->set_flashdata('msg', swal("succ", "Data berhasil export."));
	// 	}else{
	// 		$this->session->set_flashdata('msg', swal("err", "Data gagal export. Data kosong atau terjadi kegagalan yang lain!"));
	// 	}

    //     ob_end_flush(); // Flush output buffer
    // }
}