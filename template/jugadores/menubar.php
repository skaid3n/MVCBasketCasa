<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Inicio <span class="sr-only">(current)</span></a>
      </li>
      
      <!-- Capa Gestión perfiles -->
      <?php if (isset($_SESSION['id'])): ?>
        <?php if ($_SESSION['rol_name'] != "Registrado"): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>jugadores/create">Crear</a>
          </li>
        <?php endif ?>
      <?php endif ?>
 
     
      <!-- Fin capa gestión de perfiles -->
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ordenar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>jugadores/ordenar/nombre">Nombre</a>
          <a class="dropdown-item" href="<?= URL ?>jugadores/ordenar/apellidos">Apellidos</a>
          <a class="dropdown-item" href="<?= URL ?>jugadores/ordenar/equipo_id">Nombre Equipo</a>
          <a class="dropdown-item" href="<?= URL ?>jugadores/ordenar/nacionalidad">Nacionalidad</a>
          <a class="dropdown-item" href="<?= URL ?>jugadores/ordenar/fechaNac">Fecha Nacimiento</a>
          <a class="dropdown-item" href="<?= URL ?>jugadores/ordenar/draft">Draft</a>
        </div>
      </li>
    </ul>
    
    <form class="form-inline my-2 my-lg-0">
      <input name="expresion" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      
      <button class="btn btn-light my-2 my-sm-0" formaction="<?= URL ?>jugadores/buscar" type="submit">Buscar</button>
      <a class="nav-link" href="<?= URL ?>jugadores/imprimir_pdf"><strong>PDF</strong></a>
    </form>


  </div>
</nav>