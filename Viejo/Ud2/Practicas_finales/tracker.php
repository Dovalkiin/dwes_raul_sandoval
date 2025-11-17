<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        const NOMBRE_LOG = "log_proyecto.txt";
        const SEPARADOR = "|";
        echo ini_set("display_errors", 1);
        error_reporting(E_ALL);
        $tarea_id = 101;
        $nombre_tarea = "Implementación de la interfaz de usuario";
        $tiempo_empleado = 1.75;
        $estado = "COMPLETADA";
        $linea_log = $tarea_id . SEPARADOR . $nombre_tarea . SEPARADOR . $tiempo_empleado . SEPARADOR . $estado . SEPARADOR . date("Y-m-d H:i:s") . "\n";
        if(is_writable(NOMBRE_LOG)){
            $gestor = fopen(NOMBRE_LOG, "a");
            fwrite($gestor, $linea_log);
            fclose($gestor);
            echo "<h2>Exito al actualizar el archivo</h2>";
        }else{
            echo "<h2>Fracaso al actualizar el archivo</h2>";
        }

        function formatear_estado($estado){
            switch($estado){
                case "COMPLETADA":
                    echo "<span color-style = 'green'>COMPLETADA</span>";
                    break;
                case "PENDIENTE":
                    echo "<span color-style = 'blue'>PENDIENTE</span>";
                    break;
                default:
                    echo "<span color-style = 'red'>CANCELADA</span>";
            }
        }

        $tareas = file(NOMBRE_LOG);
        $reporte_tareas = [];
        $total_horas_proyecto = 0.0;
        foreach ($tareas as $tarea){
            $campos = explode(SEPARADOR, $tarea);
            $datos_tarea["ID"] = $campos[0];
            $datos_tarea["Nombre"] = $campos[1];
            $datos_tarea["Tiempo"] = $campos[2];
            $datos_tarea["Estado"] = $campos[3];
            $datos_tarea["Fecha"] = $campos[4];
            $reporte_tareas[] = $datos_tarea;
            $total_horas_proyecto += $datos_tarea["Tiempo"];
        }
        echo "<table>\n";
        echo "\t<tr><th>ID</th><th>Nombre</th><th>Tiempo</th><th>Estado</th><th>Fecha</th></tr>\n";
        foreach($reporte_tareas as $tarea_formateada)
        {
            echo "\t<tr>";
            foreach ($tarea_formateada as $dato)
            {
                echo "<td>$dato</td>";
            }
            echo "</tr>\n";
        }
        echo "<table>\n";

        
    ?>
</body>
</html>