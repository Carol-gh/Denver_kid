<style>
    body {
        background-color: #f8f8f8;
        font-family: Arial, sans-serif;
    }

    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('{{ asset('img/login2.jpg') }}');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .form-content {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 800px; /* Aumenta el tamaño del contenedor principal */
        width: 100%;
        height: 800px; /* Ajusta la altura según tus necesidades */
        overflow-y: auto; /* Agrega desplazamiento si el contenido supera el tamaño del contenedor */
    }

    .form-title {
        font-size: 28px;
        margin-bottom: 30px;
        color: #333;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* Centra horizontalmente las áreas */
        margin: 5px; 
    }

    .area-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 10px; /* Ajusta el margen según tus preferencias */
        cursor: pointer;
        padding: 20px;
        border-radius: 8px;
        width: 250px; /* Tamaño cuadrado del contenedor de área */
        height: 250px; /* Tamaño cuadrado del contenedor de área */
    }

    .area-container:hover {
        transform: scale(1.1);
    }

    .area-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        overflow: hidden;
    }

    .area-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .area-name {
    margin-top: 10px;
    font-size: 18px;
    color: #333;
    font-weight: bold; /* Agrega negrita al texto */
    text-transform: uppercase; /* Convierte el texto a mayúsculas */
    letter-spacing: 2px; /* Aumenta el espaciado entre letras */
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Agrega sombra al texto */
    }

    /* Estilos para asignar diferentes colores a cada área */
    .area-container:nth-child(odd) {
        background-color: #1E90FF; /* Color azul oscuro para las áreas impares */
    }

    .area-container:nth-child(even) {
        background-color: #FF00FF; ; /* Color rojo vino para las áreas pares */
    }

    .form-button {
        margin-top: 30px;
        background-color: #36a0f3;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    .form-footer {
        background-color: #36a0f3;
        padding: 20px 0;
        text-align: center;
    }

    .form-footer p {
        margin: 0;
        color: #ffffff;
    }

    .form-decor {
        position: absolute;
        top: -30px;
        left: -30px;
        background-color: #36a0f3;
        width: 60px;
        height: 60px;
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
    }
</style>
<div class="form-container">
    <div class="form-decor"></div>
    <div class="form-content">
        <h1 class="form-title">Evaluación Denver</h1>
        <div class="row">
            @php
                $rowCount = 0;
            @endphp
            @foreach($areas as $area)
                <div class="area-container" onclick="openForm('{{ $area->id }}', {{ $evaluaciondenver->id }})">
                    <div class="area-image">
                        <img src="{{ asset('img/' . $area->id . '.jpg') }}" alt="{{ $area->nombre }}">
                    </div>
                    <div class="area-name">{{ $area->nombre }}</div>
                </div>
                @php
                    $rowCount++;
                    if ($rowCount % 2 == 0) {
                        echo '<div style="flex-basis: 100%;"></div>';
                    }
                @endphp
            @endforeach
        </div>
        <button id="form-button" class="form-button" onclick="finishEvaluation()">Finalizar Evaluación</button>
    </div>
</div>

<script>
var evaluacionId = {{ $evaluaciondenver->id }};
    
    function openForm(areaId, evaluacionId) {
        
        var areaContainer = event.target.closest('.area-container');
        areaContainer.classList.toggle('selected');
        // Redirige a la ruta /preguntas/{area}/{infanteId}
        window.location.href = '/preguntas/' + areaId + '/' + evaluacionId;
    }
    function finishEvaluation() {
        // Lógica para finalizar la evaluación
    
        window.location.href = '{{ route('evaluaciones.show', $evaluaciondenver->id) }}';
    }
</script>
