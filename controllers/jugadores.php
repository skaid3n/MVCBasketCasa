<?php   
    	require_once('fpdf/fpdf.php');
        require_once('class/mi_pdf.php');
    class Jugadores Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {
            session_start();
            $jugadores = $this->model->get();
            $this->view->datos = $jugadores;
            $this->view->cabecera = $this->model->cabeceraTabla();


            $this->view->render('jugadores/index');
        }

        #Metodos relacionados con el CRUD jugadores.
        
        function create(){
            session_start();
            $this->view->equipos = $this->model->getEquipos();

            if(!isset($this->view->jugador)) $this->view->jugador = null;

            $this->view->render('jugadores/create/index');
        }

        function registrar() {
            
            # Sanear datos $_POST del formulario

            $jugador = 
            [
                'nombre'                => filter_var($_POST['nombre'], FILTER_SANITIZE_STRING),
                'apellidos'             => filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING),
                'equipo_id'             => filter_var($_POST['equipo_id'], FILTER_SANITIZE_NUMBER_INT),
                'nacionalidad'          => filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING),
                'fechaNac'              => filter_var($_POST['fechaNac'], FILTER_SANITIZE_STRING),
                'draft'                 => filter_var($_POST['draft'], FILTER_SANITIZE_STRING)
                
            ];


            # Validar datos del formulario

            $errores = array();

            # Valiar nombre
            if (empty($jugador['nombre'])) {
                $errores['nombre'] = "Campo obligatorio";
            }

            # Validar apellidos
            if (empty($jugador['apellidos'])) {
                $errores['apellidos'] = "Campo obligatorio";
            }

            # Validar equipo_id
            if (empty($jugador['equipo_id'])) {
                $errores['equipo_id'] = "Campo obligatorio";
            } else if (!filter_var($jugador['equipo_id'], FILTER_VALIDATE_INT)) {
                $errores['equipo_id'] = "Valor no permitido";

            }
            
            # Validar nacionalidad
            if (empty($jugador['nacionalidad'])) {
                $errores['nacionalidad'] = "Campo obligatorio";

            }

            # Validar fechaNac
            if (empty($jugador['fechaNac'])) {
                $errores['fechaNac'] = "Campo obligatorio";
            }

            # Validar draft
            if (empty($jugador['draft'])) {
                $errores['draft'] = "Campo obligatorio";
            }
        
            if (!empty($errores)) {
                
                # Datos no validados
                $this->view->errores = $errores;
                $this->view->mensaje = "Errores en el formulario.";
                $this->view->jugador = $jugador;
                $this->create();
               
            } else {

                # La función insert devuelve el mensaje resultante de añadir el registro
                $mensaje=$this->model->insert($jugador);
                
                $this->view->mensaje = $mensaje;
                $this->render();
                
            }     
            
        }
        
        function edit($param){
            session_start();
            $this->view->id = $param[0];
            $this->view->equipos = $this->model->getEquipos();
            // var_dump($this->view->equipos);
            // exit(0);
            $this->view->jugador = $this->model->getJugador($this->view->id);
            $this->view->jugador["id"] = $param[0];

            $this->view->render('jugadores/edit/index');
        }

        function show($param = null) {
            session_start();
            $this->view->id = $param[0];
            $this->view->equipos = $this->model->getEquipos();

            $this->view->jugador = $this->model->getJugador($param[0]);
            $this->view->jugador["id"] = $param[0];

            if (!isset($this->view->jugador)) $this->view->jugador = null;
            $this->view->render('jugadores/show/index');
        }

        function actualizar() {
         
            $jugador = 
            [
                'id'                    => $_POST['id'],
                'nombre'                => filter_var($_POST['nombre'], FILTER_SANITIZE_STRING),
                'apellidos'             => filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING),
                'equipo_id'             => filter_var($_POST['equipo_id'], FILTER_SANITIZE_NUMBER_INT),
                'nacionalidad'          => filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING),
                'fechaNac'              => filter_var($_POST['fechaNac'], FILTER_SANITIZE_STRING),
                'draft'                 => filter_var($_POST['draft'], FILTER_SANITIZE_STRING)
                
            ];

            $errores = array();

            if (empty($jugador['id'])) {
                $errores['id'] = "No recoge el ID";
            }
            
            if (empty($jugador['nombre'])) {
                $errores['nombre'] = "Campo obligatorio";
            }

            if (empty($jugador['apellidos'])) {
                $errores['apellidos'] = "Campo obligatorio";
            }

            if (empty($jugador['equipo_id'])) {
                $errores['equipo_id'] = "Campo obligatorio";
            } else if (!filter_var($jugador['equipo_id'], FILTER_VALIDATE_INT)) {
                $errores['equipo_id'] = "Valor no permitido";

            }
            
            if (empty($jugador['nacionalidad'])) {
                $errores['nacionalidad'] = "Campo obligatorio";

            }

            if (empty($jugador['fechaNac'])) {
                $errores['fechaNac'] = "Campo obligatorio";
            }

            if (empty($jugador['draft'])) {
                $errores['draft'] = "Campo obligatorio";
            }

                    
            if (!empty($errores)) {
                
                # Datos no validados
                $this->view->errores = $errores;
                $this->view->mensaje = "Errores en el formulario.";
                $this->view->jugador = $jugador;
                $this->create();
               
            } else {

                $mensaje=$this->model->update($jugador);
                
                $this->view->mensaje = $mensaje;
                $this->render();
                
            }
        }

        function delete($param) {
            session_start();
            $this->model->delete($param[0]);
            $this->view->cabecera = $this->model->cabeceraTabla();
            
            $jugadores = $this->model->get();
            $this->view->datos = $jugadores;
            
            $this->view->render('jugadores/index');
        }


        public function buscar($param = null){
            if (!isset($_SESSION)){
                session_start();
            }
            $param = $_GET['expresion'];

            $jugadores = $this->model->buscar($param);

            // var_dump($jugadores);
            // exit(0);

            $this->view->cabecera = $this->model->cabeceraTabla();
            $this->view->datos = $jugadores;
            
            $this->view->render('jugadores/index');
        }

        public function ordenar($param = null){
            if (!isset($_SESSION)){
                session_start();
            }
            $jugadores = $this->model->ordenar($param);
            // var_dump($jugadores);
            // exit(0);
            $this->view->cabecera = $this->model->cabeceraTabla();
            $this->view->datos = $jugadores;


            
            $this->view->render('jugadores/index');
        }

        public function imprimir_pdf(){
            $pdf = new mi_pdf();
            $pdf->Addpage();
            $pdf->SetFont('Arial', '', 8);
    
            $pdf-> Cabecera_archivos();
    
            $archivos = $this->model->get();
            
            $total_capacidad = 0;
    
            foreach( $archivos as $i => $archivo){
    
                $pdf->Cell(5,8,utf8_decode($archivo->id),0,0);
    
                $pdf->Cell(30,8,utf8_decode($archivo->nombre),0,0);
    
                $pdf->Cell(20,8,utf8_decode($archivo->apellidos),0,0);
    
                $pdf->Cell(40,8,utf8_decode($archivo->nombrEquipo),0,0);

                $pdf->Cell(30,8,utf8_decode($archivo->nacionalidad),0,0);

                $pdf->Cell(25,8,utf8_decode($archivo->fechaNac),0,0);

                $pdf->Cell(30,8,utf8_decode($archivo->draft),0,1);

            }
    
            $pdf->Cell(45,10,utf8_decode('Numero de elementos: '), 'T', 0);
            $pdf->Cell(45,10,utf8_decode($i+1), 'T', 0);
            $pdf->Cell(90,10,utf8_decode(""), 'T', 0);
    
            $pdf->Output('I', 'jugadores.pdf');
            
            
        }
        

    }
    
?>