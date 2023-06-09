<?php
    require 'includes/funciones.php';

    //importar conexion
    require 'includes/config/database.php';
    $db = conectarDB();
    
    incluirTemplate('header');

    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /');
    }

    $query = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db,$query);
    $propiedad = mysqli_fetch_array($resultado);
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']?></h1>

        <img src="imagenes/<?php echo $propiedad['imagen']?>" alt="imagen de la propiedad" loading="lazy">
        

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono wc" loading="lazy">
                    <p><?php echo $propiedad['wc']?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento" loading="lazy">
                    <p><?php echo $propiedad['estacionamiento']?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" loading="lazy">
                    <p><?php echo $propiedad['habitaciones']?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion']?></p>
        </div>
    </main>

    <?php
    incluirTemplate('footer');
?>