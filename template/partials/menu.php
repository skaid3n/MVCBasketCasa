<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="<?= URL ?>index">Modelo Vista Controlador</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>index">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>jugadores">Jugadores
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>pabellon">Pabellon
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>torneo">Torneo
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>equipo">Equipo
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <!-- <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>partidos">Partidos
                  <span class="sr-only">(current)</span>
                </a>
              </li> -->
            </ul>
          </div>
          <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <?php if (empty($_SESSION['id'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>user/register">Registrarse</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>user">Login
          </a>
        </li>
        <?php endif ?>
        
        <?php if (!empty($_SESSION['id'])): ?>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['name'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= URL ?>user/editaruser">Editar Perfil</a>
            <a class="dropdown-item" href="<?= URL ?>user/changepass">Cambiar Contraseña</a>
            <a class="dropdown-item" href="<?= URL ?>user/deleteperfil">Eliminar perfil</a>
            <a class="dropdown-item" href="<?= URL ?>user/logout">Logout</a>
            <div class="dropdown-divider"></div>
            <a disabled class="dropdown-item"><?= $_SESSION['rol_name'] ?></a>

          </div>
        <?php endif ?>
        
      </ul>
    </div>
    </div>
</nav>
