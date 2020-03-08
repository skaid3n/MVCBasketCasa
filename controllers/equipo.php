<?php

    class Equipo Extends Controller {

        function __construct() {

            parent ::__construct();
            
        }

        function render() {
            session_start();

            $equipo = $this->model->get();
            $this->view->datos = $equipo;
            $this->view->cabecera = $this->model->cabeceraTabla();

            $this->view->render('equipo/index');
        }
    }
?>