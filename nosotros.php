<?php
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre Nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
    
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem exercitationem molestiae, ex vero 
                    sapiente laudantium vel officiis veritatis dignissimos quam nobis alias! Ipsa veritatis, deserunt architecto quas quaerat nostrum pariatur.
                </p>
    
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus quis quos placeat vitae minus quisquam minima ex atque, inventore 
                    provident, veritatis necessitatibus odit, explicabo illo rem quibusdam. Labore, ut atque!
                </p>
            </div>
        </div>

    </main>

    <section class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono segurdidad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quidem labore ex temporibus eum doloremque dolor officia 
                    dolorum, similique impedit ducimus facilis obcaecati sint provident repudiandae odit nostrum id alias?
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quidem labore ex temporibus eum doloremque dolor officia 
                    dolorum, similique impedit ducimus facilis obcaecati sint provident repudiandae odit nostrum id alias?
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque quidem labore ex temporibus eum doloremque dolor officia 
                    dolorum, similique impedit ducimus facilis obcaecati sint provident repudiandae odit nostrum id alias?
                </p>
            </div>

        </div>
    </section>
<?php
    incluirTemplate('footer');
?>