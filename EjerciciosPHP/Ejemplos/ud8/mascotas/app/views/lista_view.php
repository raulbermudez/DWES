<div id="resultado">
            <?php
                if (!isset($data['animales']) || !$data['animales']) {
                    echo "<p>No hay animales</p>";
                } else{
                    foreach ($data['animales'] as $animal) {
                        echo "<p>Nombre: " . $animal['nombre'] . "</p>";
                        echo "<p>Raza: " . $animal['raza'] . "</p>";
                        echo "<img src='" . $animal['foto'] . "' alt='Foto del perro '>";
                    }
                }
            ?>
        </div>