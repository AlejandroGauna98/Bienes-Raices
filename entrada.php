<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="imagen de la propiedad" loading="lazy">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nobis a aliquam nulla architecto et.
                Numquam, ratione? Nobis corporis mollitia quod inventore delectus nesciunt quas dolorum laudantium, molestias, numquam est.
            </p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>