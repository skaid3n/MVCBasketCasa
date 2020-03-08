<!doctype html>
<html lang="es">

<?php require_once("template/partials/head.php") ?>

<body>
    <?php require_once("template/partials/menu.php") ?>

    <!-- Page Content -->
    <div class="container">
        <br><br><br><br>

        <?php require_once("template/partials/mensaje.php") ?>


        <!-- Estilo card de bootstrap -->
        <div class="card">
            <div class="card-header">
                Tabla Equipos
            </div>
            <div class="card-body">
                <section>
                    <article>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <?php foreach ($this->cabecera as $key => $valor): ?>
                                    <th><?=$valor?></th>
                                    <?php endforeach;?>
                                    <?php if (isset($_SESSION['id'])): ?><th>Acciones</th> <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->datos as $registro => $value):?>
                                <tr>
                                    <td><?=$value->id?></td>
                                    <td><?=$value->nombrEquipo?></td>
                                    <td><?=$value->ciudad?></td>
                                    <td><?=$value->nombre?></td>
                                    <?php if (isset($_SESSION['id'])): ?>
									<?php if ($_SESSION['rol_name'] == "Administrador"): ?>
										<td>
											<a href="<?= URL ?>jugadores/show/<?=$value->id?>" title="Visualizar"><i class="material-icons">visibility</i></a>
											<a href="<?= URL ?>jugadores/edit/<?=$value->id?>" title="Editar"><i class="material-icons">edit</i></a>
											<a href="<?= URL ?>jugadores/delete/<?=$value->id?>"><i class="material-icons">clear</i></a>
										</td>
									<?php endif ?>
									<?php if ($_SESSION['rol_name'] == "Editor"): ?>
										<td>
											<a href="<?= URL ?>jugadores/show/<?=$value->id?>" title="Visualizar"><i class="material-icons">visibility</i></a>
											<a href="<?= URL ?>jugadores/edit/<?=$value->id?>" title="Editar"><i class="material-icons">edit</i></a>
										</td>
									<?php endif ?>
									<?php if ($_SESSION['rol_name'] == "Registrado"): ?>
										<td>
											<a href="<?= URL ?>jugadores/show/<?=$value->id?>" title="Visualizar"><i class="material-icons">visibility</i></a>
										</td>
									<?php endif ?>
								<?php endif ?>
							</tr>
						<?php endforeach;?>
                            </tbody>
                        </table>
                        <h5>El número de equipo es: <?= count($this->datos);?></h4>
                    </article>
                </section>

            </div>
        </div>
    </div>

    <!-- /.container -->

    <?php require_once("template/partials/footer.php") ?>
    <?php require_once("template/partials/javascript.php") ?>

</body>

</html>