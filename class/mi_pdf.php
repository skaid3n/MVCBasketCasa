<?php 
    class mi_pdf extends FPDF {
        function Header(){
            $encabezado1 = "Proyecto MVC";
            $encabezado2 = "Antonio Miguel Pavon Rodriguez";
            $this->SetFont('Arial', '', 10);
            $this->Cell(90,10,utf8_decode($encabezado1),'B',0,'L');
            $this->Cell(90,10,utf8_decode($encabezado2),'B',1,'R');
        }

        function Footer(){
            $this->SetY(-10);
            $this->SetFont('Arial', '', 10);

            $this->Cell(0,10,utf8_decode('Página: ' . $this->PageNo()), 'T', 0, 'C');

        }

        function Cabecera_archivos(){

            $this->Cell(5,8,utf8_decode('#'), 'B', 0);
            #Tipo de archivo
            $this->Cell(30 ,8,utf8_decode('Nombre'), 'B', 0);
            #Nombre de archivo
            $this->Cell(20,8,utf8_decode('Apellidos'), 'B', 0);
            #Tamaño de archivo
            $this->Cell(40,8,utf8_decode('Equipo'), 'B', 0);

            $this->Cell(30,8,utf8_decode('Nacionalidad'), 'B', 0);

            $this->Cell(25,8,utf8_decode('Fecha Nac.'), 'B', 0);

            $this->Cell(30,8,utf8_decode('Draft'), 'B', 1, 1);
        }
    }
?>