<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
  <div class="container py-4">

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Tu música, tus reglas</h1>
        <p class="col-md-8 fs-4">Descubre millones de canciones, playlists y álbumes hechos para ti. Explora nuevos sonidos o revive tus favoritos. Todo en un solo lugar: Spotify.</p>
        <button class="btn btn-primary btn-lg" href="https://www.spotify.com/ec/premium/" type="button">Explora Spotify</button>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Personaliza tu ambiente</h2>
          <p>Cambia entre modo claro u oscuro, adapta los colores y haz que tu experiencia musical se vea como suena: única. Spotify se adapta a ti.</p>
          <button class="btn btn-outline-light" type="button">Activa el modo oscuro</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Organiza tu música</h2>
          <p>Crea playlists, sigue artistas y agrupa tus canciones favoritas en colecciones. Todo perfectamente ordenado para que encuentres lo que amas al instante.</p>
          <button class="btn btn-outline-secondary" type="button">Crea tu playlist</button>
        </div>
      </div>
    </div>

  </div>
</div>
