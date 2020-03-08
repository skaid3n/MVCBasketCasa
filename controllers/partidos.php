<?php

    class Partidos Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {
            session_start();
            $partidos = $this->model->get();
            $this->view->datos = $partidos;
            $this->view->cabecera = $this->model->cabeceraTabla();

            $this->view->render('partidos/index');
        }
    }
?>