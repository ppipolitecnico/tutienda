<?php    if (!defined ('BASEPATH')) exit ('No direct access allowed');
      class ExcelController extends CI_Controller
      {


      public function index()
      {
          //load library excel
          $this->load->library('excel');

          //Here i used microsoft excel 2007
          $objReader= PHPExcel_IOFactory::createReader('Excel2007');

          //Set to read only
          $objReader->setReadDataOnly(true);


          //Load excel file
          
          $objPHPExcel=$objReader->load('assets/uploads/files/data.xlsx');
          $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);

          //load model

          $this->load->model('excelModel');

          //loop from first data untill last data
          for($i=2;$i<=4;$i++)
          {
           
         


              $n_nota= $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
              $nit_cc= $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
              $nombre= $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
              $direccion= $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
              $barrio= $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
              $telefono= $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
              $descripcion= $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
              $cantidad= $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
              $fecha= $objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
              $hora= $objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
              
              
              
              $data_user=array('n_nota'=>$n_nota,
                'nit_cc'=>$nit_cc,
                'nombre'=>$nombre,
                'direccion'=>$direccion,
                'barrio'=>$barrio,
                'telefono'=>$telefono,
                'descripcion'=>$descripcion,
                'cantidad'=>$cantidad,
                'fecha'=>$fecha,
                'hora_servicio'=>$hora,
                'cod_zona'=>$i,
                'cod_estado'=>2);

              $this->excelModel->add_data($data_user);




          }
          echo 'listo';

      }


  }           

  ?>