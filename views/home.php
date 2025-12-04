<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>NetBeans - Productos</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #f4f4f4;
      }

      /* CABECERA */
      header {
        background: #222;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
      }

      header img {
        height: 50px;
        margin-right: 15px;
      }

      h1 {
        margin: 0;
      }

      /* CONTENEDOR */
      .container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
      }

      /* TARJETA PRODUCTO */
      .card {
        background: white;
        border-radius: 10px;
        width: 250px;
        padding: 15px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
      }

      .card img {
        width: 100%;
        height: 150px;
        object-fit: contain;
      }

      .name {
        font-size: 18px;
        font-weight: bold;
        margin: 10px 0 3px;
      }

      .category {
        color: #4caf50;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .description {
        font-size: 14px;
        color: #555;
        height: 60px;
        overflow: hidden;
      }

       .developer {
        text-align: center;
        margin-top: 30px;
        font-style: italic;
      }
    </style>
  </head>
  <body>
    <header>
      <img src="./assets/img/logoNetBeans.png" alt="Logo" />
      <h1>Catálogo de Productos - NetBeans</h1>
    </header>

    <div class="container">
      <?php foreach ($productos as $p): ?>
      <div class="card">
        <!-- <img src="<?php echo $p["./views/img/logoNetBeans.png"]; ?>" alt="Producto" /> -->

        <div class="name"><?php echo htmlspecialchars($p['nombre']); ?></div>

        <div class="category">
          <?php echo htmlspecialchars($p['categoria']); ?>
        </div>

        <div class="description">
          <?php echo htmlspecialchars($p['descripcion']); ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </body>
     <div class="developer">Desarrollado por: Jorghi Cote</div>
</html>
