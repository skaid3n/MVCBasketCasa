<?php

    class Torneo Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {
            session_start();
            
            $torneo = $this->model->get();
            $this->view->datos = $torneo;
            $this->view->cabecera = $this->model->cabeceraTabla();

            $this->view->render('torneo/index');
        }
    }
?>