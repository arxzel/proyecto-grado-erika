<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->NombreMaquina : 'Nuevo Registro'; ?>
</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=Maquina">Registros  </a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $alm->id != null ? $alm->NombreMaquina : 'Nuevo Registro'; ?></li>
    </ol>
</nav>

<form id="frm-maquina" action="?c=Maquina&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-warning">
                    Máquina Configuración
                </div>
                <div class="card-body">
                    <h5 class="card-title">Operación de la máquina</h5>
                    <p class="card-text">Opere la máquina desde aquí.</p>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Nombre de la máquina</span>
                        <input type="text" name="NombreMaquina" class="form-control" value="<?php echo $alm->NombreMaquina; ?>">
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Ip de la máquina</span>
                        <input type="text" id="IP" name="IP" class="form-control" value="<?php echo $alm->IP; ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header bg-danger">
                    Maquina Operación
                </div>
                <div class="card-body">
                    <h5 class="card-title">Configuración de la máquina</h5>
                    <p class="card-text">Llene los datos correspondientes y gúardelos.</p>

                    <div class="form-check form-switch">
                        <input class="form-check-input" id="EstadoMaquina" name="EstadoMaquina" type="checkbox"
                               <?php echo $alm->EstadoMaquina == 1 ? 'checked' : ''; ?> 
                               value="<?php echo $alm->EstadoMaquina; ?>">
                        <label class="form-check-label" for="EstadoMaquina">Encender / Apagar Máquina</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" id="EstadoMotor" type="checkbox" name="EstadoMotor"
                               <?php echo $alm->EstadoMotor == 1 ? 'checked' : ''; ?> 
                               value="<?php echo $alm->EstadoMotor; ?>">
                        <label class="form-check-label" for="EstadoMotor">Iniciar / Detener Marcha</label>
                    </div>

                    <div class="form-group">
                        <label for="formControlRange">Velocidad: </label>
                        <span class="font-weight-bold indigo-text mr-2 mt-1">0</span>
                        <input id="Velocidad" name="Velocidad" class="border-0" type="range" min="0" max="3" step="1" 
                               value="<?php echo $alm->Velocidad; ?>"/>
                        <span class="font-weight-bold indigo-text ml-2 mt-1">3</span>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad de Ml:</span>
                        <input type="number" id="CantidadMl" name="CantidadMl" class="form-control" value="<?php echo $alm->CantidadMl; ?>">
                    </div>

                </div>
            </div>
        </div>

        <hr />

        <div class="text-right">
            <button id="btn-guardar" class="btn btn-success">Guardar</button>
        </div>
        <hr /><hr />
    </div>
</form>


