<?php

    class Pabellon Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {
            session_start();

            $pabellon = $this->model->get();
            $this->view->datos = $pabellon;
            $this->view->cabecera = $this->model->cabeceraTabla();

            $this->view->render('pabellon/index');
        }
    }
?>