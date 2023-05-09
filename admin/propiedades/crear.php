<?php
    //Base de datos
    require '../../includes/config/database.php';

    $db = conectarDB();

    //Consulta para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);
    
    //arreglo para manejo de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '' ;
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    //$_SERVER nos trae informacion detallada de lo que pasa en el servidor
    //$_POST trae la informacion cuando hacemos una peticion
    //$_FILES podemos ver el contenido de los archivos

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //Agregamos la funcion "real scape string" para evitar una inyeccion sql

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y/m/d'); 

        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio){
            $errores[] = "El precio es obligatorio";
        }

        if(!$descripcion){
            $errores[] = "Debes añadir una descripcion";
        }

        if(!$habitaciones){
            $errores[] = "Las habitaciones son obligatorias";
        }

        if(!$wc){
            $errores[] = "Este campo es obligatorio";
        }

        if(!$estacionamiento){
            $errores[] = "Debe completar el numero de estacionamientos";
        }

        if(!$vendedorId){
            $errores[] = "El vendedor es obligatorio";
        }

        if(!$imagen['name']){
            $errores[] = 'La imagen es obligatoria';
        }

        //Si el arreglo esta vacio, realiza la consulta
        if(empty($errores)){

            //Subida de archivos
            $carpetaImagenes = '../../imagenes/';

            //crear carpeta
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            //crear el nombre unico
            $nombreImagen = md5(uniqid(rand(),true)) .".jpg";

            //subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


            //Ingresar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen,descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio',
            '$nombreImagen','$descripcion', '$habitaciones', '$wc', '$estacionamiento','$creado' ,'$vendedorId')";

            $resultado = mysqli_query($db,$query);

            if($resultado){
              //Redireccionar al usuario para que no ingrese datos duplicados.
              header('Location: /admin');
            }
        }
    }


    
    require '../../includes/funciones.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>"></textarea>

            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" max="4" value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccione--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton-verde">
        </form>
    </main>
<?php
    incluirTemplate('footer');
?>