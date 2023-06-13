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
        max-width: 600px;
        width: 100%;
        height: 600px; /* Ajusta la altura según tus necesidades */
    }

    .form-title {
        font-size: 28px;
        margin-bottom: 30px;
        color: #333;
    }

    .question {
        margin-bottom: 30px;
        text-align: left;
    }

    .question h3 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
    }

    .options {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .options li {
        margin-right: 10px;
    }

    .options label {
        display: inline-block;
        background-color: #f1f1f1;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        color: #333;
    }

    .options label {
        display: inline-block;
        background-color: #f1f1f1;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        color: #333;
    }

    .options input[type="radio"] {
        display: none;
    }

    .options label:hover,
    .options input[type="radio"]:not(:disabled):checked + label {
        background-color: #36a0f3;
        color: #ffffff;
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

        <form action="{{ route('guardar_respuestas', ['evaluacionId' => $evaluacionId]) }}" method="POST">
            @csrf
            <h2>{{$area->nombre}}</h2>
            @foreach($preguntas as $pregunta)
                <div class="question">
                    <h3>{{ $pregunta->pregunta }}</h3>
                    <ul class="options">
                        @foreach($denverEscala as $opcion)
                            <li>
                                <input type="radio" name="pregunta_{{ $pregunta->id }}" value="{{ $opcion->etiqueta }}" id="opcion_{{ $pregunta->id }}_{{ $opcion->id }}">
                                <label for="opcion_{{ $pregunta->id }}_{{ $opcion->id }}">{{ $opcion->etiqueta }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
          <button type="submit" name="guardar_respuestas" class="btn btn-primary form-button">Guardar respuestas</button>
        </form>
    </div>
</div>
