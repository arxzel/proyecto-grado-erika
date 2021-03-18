<div class="row">
    <div class="col-xs-12">
        <hr />
        <footer class="text-center well">
            <p>Desarrollado por <a href="#">Erika Lisseth Sanchez Rizo</a></p>
        </footer>
    </div>    
</div>
</div>

<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

</script>

<script>
    $(document).ready(function () {

        $("#btn-guardar").click(function (event) {
            //$("#frm-maquina").submit();
            event.preventDefault();
            if (!window.confirm("¿Realmente desea continuar?"))
                return;
            var IP = $("#IP").val();
            var EstadoMaquina = $("#EstadoMaquina").is(":checked");
            var EstadoMotor = $("#EstadoMotor").is(":checked");
            var Velocidad = $("#Velocidad").val();
            var CantidadMl = $("#CantidadMl").val();
            var data = new Object();
            data.estado_maquina = EstadoMaquina;
            data.estado_motor = EstadoMotor;
            data.velocidad = Velocidad;
            data.cantidad_ml = CantidadMl;
            var json = new Object();
            json.type = "event_machine";
            json.data = data;
            datos = JSON.stringify(json);
            console.log(datos);
            $.ajax({
                type: "POST",
                url: "http://localhost/ErikaProyecto/API/EndPoint.php",
                // url: "http://" + IP + "/",
                data: datos,
                /*beforeSend: function (xhr) {
                 xhr.setRequestHeader('Content-Type', 'application/json');
                 },*/
                contentType: "text/json; charset=utf-8",
                dataType: 'json',
                timeout: 3000,
                //processData: false,
                success: function (dataJson) {
                    try {
                        console.log(dataJson);
                        response = dataJson;
                        //response = JSON.parse(dataJson);

                        if (response.type === "response" && response.data.status === "success") {
                            alert("¡Maquina configurada con éxito!")
                            $("#frm-maquina").submit();
                        } else {
                            console.error("Ha ocurrido un error: ", response);
                            alert("Ha ocurrido un error, no se pudo completar la operación");
                        }
                    } catch (err) {
                        console.error(err);
                        alert("Ha ocurrido un error, no se pudo completar la operación");
                    }
                }, error: function (err) {
                    alert("Ha ocurrido un error, no se pudo completar la operación");
                    console.error("Ha ocurrido un error durante el llamado: ", err);
                }
            });
        });
        $("#frm-busca").submit(function () {
            return $(this).validate();
        });
    });
</script>
</body>
</html>