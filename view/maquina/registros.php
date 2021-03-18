<div class="well well-sm text-right">
    <!--<a class="btn btn-primary" href="?c=Maquina&a=Crud">Editar Máquina</a>-->
    <a class="btn btn-primary" href="?c=Maquina&a=Crud&id=1">Editar</a>
</div>

<div class="row mt-3">
    <div class="col">
        <div class="card">
            <div class="card-header bg-success">
                Tabla
            </div>
            <div class="card-body">

                <h5 class="card-title">Datos estadísticos</h5>
                <p class="card-text">Haga consultas a la base de datos.</p>


                <div class="card border-success mb-3">
                    <div class="card-header">Buscar</div>
                    <div class="card-body">
                        <form id="frm-buscar" action="?c=Maquina&a=Buscar" method="post" enctype="multipart/form-data">
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha inicio:</span>
                                <input type="date" 
                                       class="form-control" 
                                       name="fechaInicio"
                                       aria-label="Sizing example input" 
                                       aria-describedby="inputGroup-sizing-sm"
                                       data-validacion-tipo="requerido" 
                                       value="<?php echo $this->buscador->fechaInicio; ?>" />
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Fin:</span>
                                <input type="date" 
                                       class="form-control" 
                                       name="fechaFinal"
                                       aria-label="Sizing example input" 
                                       aria-describedby="inputGroup-sizing-sm"
                                       data-validacion-tipo="requerido"
                                       value="<?php echo $this->buscador->fechaFinal; ?>" />
                            </div>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Cantidad de Ml:</span>
                                <input type="number" 
                                       class="form-control" 
                                       name="cantidadMl"
                                       data-validacion-tipo="requerido" 
                                       value="<?php echo $this->buscador->cantidadMl; ?>">
                            </div>

                            <button class="btn btn-primary">Buscar</button>
                        </form>
                    </div>
                </div>

                <table id="myTable" class="display table table-striped table-hover mb-3">
                    <thead class="table-dark">
                        <tr>
                            <th># Registro</th>
                            <th>Fecha & Hora</th>
                            <th>Vel.</th>
                            <th>Ml</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->Listar() as $r): ?>
                            <tr>
                                <td><?php echo $r->id; ?></td>
                                <td><?php echo $r->FechaHora; ?></td>
                                <td><?php echo $r->Velocidad; ?></td>
                                <td><?php echo $r->CantidadMl; ?></td>
                                <!--<td>
                                    <a href="?c=Maquina&a=Crud&id=<?php //echo $r->id; ?>">Editar</a>
                                </td>
                                <td>
                                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alumno&a=Eliminar&id=<?php echo $r->IP; ?>">Eliminar</a>
                                </td>-->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

