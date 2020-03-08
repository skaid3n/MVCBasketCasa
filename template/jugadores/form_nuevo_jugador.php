<form method="POST" action="<?= URL ?>jugadores/registrar" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="inputnombre">Nombre</label>
        <input type="text" value = "<?= $this->jugador['nombre'] ?>" class="form-control" name="nombre" placeholder="" required>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['nombre']))? $this->errores['nombre']:null?></small>
    </div>
    <div class="form-group">
        <label for="inputapellidos">Apellidos</label>
        <input type="text" value = "<?= $this->jugador['apellidos'] ?>" class="form-control" name="apellidos" required>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['apellidos']))? $this->errores['apellidos']:null?></small>
    </div>

    <div class="form-group">
        <label for="inputequipo">Nombre Equipo</label>
        <select class="form-control" name="equipo_id">
            <?php foreach($this->equipos as $key => $registro): ?>
                <option value="<?= $registro->id ?>" <?= ($this->jugador['equipo_id'] == $registro->id) ? 'selected': null ?> ><?= $registro->nombrEquipo ?></option>
            <?php endforeach; ?>
        </select>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['equipo_id']))? $this->errores['equipo_id']:null?></small>
    </div>
    
    <div class="form-group">
        <label for="inputnacionalidad">Nacionalidad</label>
        <input type="text" value = "<?= $this->jugador['nacionalidad'] ?>"class="form-control" name="nacionalidad" required>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['nacionalidad']))? $this->errores['nacionalidad']:null?></small>
    </div>

    <div class="form-group">
        <label for="inputfecha">Fecha Nacimiento</label>
        <input type="date" value = "<?= $this->jugador['fechaNac'] ?>"class="form-control" name="fechaNac" required>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['fechaNac']))? $this->errores['fechaNac']:null?></small>
    </div>

    <div class="form-group">
        <label for="inputdraft">Draft</label>
        <input type="text" value = "<?= $this->jugador['draft'] ?>"class="form-control" name="draft" required>
        <small id="nameHelp" class="form-text text-danger"><?= (isset($this->errores['draft']))? $this->errores['draft']:null?></small>
    </div>


    			  				
    <!-- botones acción -->
    <hr>
    <a href="<?= URL ?>jugadores" class="btn btn-secondary" role="button" aria-pressed="true">Cancelar</a>
	<button type="reset" class="btn btn-secondary">Reset</button>
    <button type="submit" class="btn btn-primary" >Añadir</button>
    
</form>