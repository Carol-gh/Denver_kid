<!DOCTYPE html>
<html>
<head>
  <title>Formulario Flotante</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Estilo del botón */
    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #337ab7;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    /* Estilo del formulario flotante */
    .floating-form {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #f1f1f1;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      display: none; /* El formulario estará oculto inicialmente */
    }

    /* Estilo del icono */
    .icon {
      font-size: 20px;
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
</head>
<body>
  <button class="button" onclick="openForm()">Abrir formulario</button>

  <div class="floating-form" id="myForm">
    <i class="fas fa-times icon" onclick="closeForm()"></i> <!-- Icono para cerrar el formulario -->
    <h2>Formulario</h2>
    <form>
      <!-- Aquí van los campos del formulario -->
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <input type="submit" value="Enviar">
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <script>
    function openForm() {
      // Obtener el elemento del formulario
      var form = document.getElementById("myForm");

      // Mostrar el formulario
      form.style.display = "block";
    }

    function closeForm() {
      // Obtener el elemento del formulario
      var form = document.getElementById("myForm");

      // Ocultar el formulario
      form.style.display = "none";
    }
  </script>
</body>
</html>
