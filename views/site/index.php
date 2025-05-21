<?php

/** @var yii\web\View $this */

$this->title = 'Spotify';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4 bi bi-spotify">   Bienvenido a Spotify!</h1>

        <p class="lead">La mejor experiencia musical, al alcance de todos.</p>

        <p><a class="btn btn-lg btn-success" href="https://www.spotify.com/ec/premium/">Conoce los planes</a></p>
    </div>

    <div class="body-content">

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://store-images.s-microsoft.com/image/apps.19923.13571498826857201.b5f74f11-d59e-47fe-9613-1c3e91cff740.2bde81f8-83a8-466e-a609-74994653f956?h=1280" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">


        <div class="container">
          <div class="carousel-caption text-start">
            <h1>El Mejor Servicio de Streaming</h1>
            <p>La mejor manera de escuchar música, al alcande de todos.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Inicia Sesion</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
         <img src="https://img.youtube.com/vi/mxMj6faysY4/maxresdefault.jpg" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <div class="container">
          <div class="carousel-caption">
            <h1>Spotify para Artistas</h1>
            <p>Inicia y promueve tu musica con nosotros.</p>
            <p><a class="btn btn-lg btn-primary" href="https://artists.spotify.com/home">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://www.usatoday.com/gcdn/-mm-/393ba0194f4edf2a9077d04187f2aad8365a3ae8/c=0-0-3556-2000/local/-/media/2019/10/02/USATODAY/usatsports/MotleyFool-TMOT-c663946d-spotdevices.jpg" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Disponible en todos tus dispositivos</h1>
            <p>Escucha toda tu musica y listas de reproduccion en cualquier dispositivo.</p>
            <p><a class="btn btn-lg btn-primary" href="https://open.spotify.com/intl-es">Escucha</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

    <h1 class="display-4">   Conoce los servicios!</h1>

  </div>

      <div class="row mt-4">
      <div class="col-lg-4">
        <img src="https://enagenda.com.ar/uploads/noticias/5/2023/08/8a91f0f5196a17c5b5445ba5bd26db0c3263e13e.jpg" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <h2>Albums</h2>
        <p>Cada álbum es una historia, cada canción un capítulo. Descúbrelos todos, solo en Spotify.</p>
        <p><a class="btn btn-secondary" href="http://localhost:8080/index.php?r=album%2Findex">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="https://cdn.themedizine.com/2023/08/ma%CC%81s-escuchados-spotify-julio-2023.jpeg" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <h2>Artistas</h2>
        <p>Cada artista tiene una historia, cada canción revela su voz. Conócelos a fondo, solo en Spotify.</p>
        <p><a class="btn btn-secondary" href="http://localhost:8080/index.php?r=artista%2Findex">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="https://www.sopitas.com/wp-content/uploads/2024/12/taylor-swift-artista-mas-escuchada-spotify-1.png" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <h2>Canciones</h2>
        <p>Cada canción guarda una emoción, cada nota cuenta algo más. Siente cada momento, solo en Spotify.</p>
        <p><a class="btn btn-secondary" href="http://localhost:8080/index.php?r=cancion%2Findex">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
            <img src="https://fotografias.lasexta.com/clipping/cmsimages02/2023/12/15/87826775-B2EF-43DD-AA08-3FB8BBC44D5C/listado-generos-musicales_98.jpg?crop=1300,731,x0,y7&width=1900&height=1069&optimize=high&format=webply" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <h2>Géneros</h2>
        <p>Cada género tiene su esencia, cada ritmo su identidad. Explora todos los sonidos, solo en Spotify.</p>
        <p><a class="btn btn-secondary" href="http://localhost:8080/index.php?r=genero%2Findex">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

            <div class="col-lg-4">
                <img src="https://playlist-promotion.com/wp-content/uploads/2020/12/How-To-Get-On-Spotify-Editorial-Playlists-6.jpg" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <h2>Playlists</h2>
        <p>Cada playlist crea un ambiente, cada canción elige el momento. Encuentra la tuya, solo en Spotify.</p>
        <p><a class="btn btn-secondary" href="http://localhost:8080/index.php?r=playlist%2Findex">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

            <div class="col-lg-4">
                <img src="https://s3-alpha.figma.com/hub/file/3465376209/40e75b71-7add-45e6-ac70-d9c27a4f8637-cover.png" 
            alt="Imagen centrada" 
            style="display: block; margin: 0 auto; width: 80%;">

        <h2>Inicia Sesion</h2>
        <p>¿Qué esperas para empezar con la mejor experiencia musical de tu vida?.</p>
        <p><a class="btn btn-secondary" href="http://localhost:8080/index.php?r=site%2Flogin">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

      
    </div><!-- /.row -->

    </div>
</div>
