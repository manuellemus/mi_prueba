@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Programador Jr prueba</div>

                <div class="card-body">
                    <p>Ejercicio 1</p>
                    <p>1. - ¿Es correcto el siguiente código php? Explique por qué y si no de la solución</p>
                    <br>
                    <p>Lenguaje PHP</p>
                    <pre>
                        $var1 = 'Hola';
                        $var = 2:
                        $resultado = $var1 + '  Mundo ' +$var +' números: ' + 3 + 4;
                        echo $resultado;
                    </pre>
                    <p>No, no es correcto, la concatenacion esta totalmente mal, se concatena con "." y la finalizacion de una sentencia es con ";" y no con ":"
                        haciendo enfacis en la finalizacion de <b>$var = 2:</b>
                    </p>
                    <hr>
                    <p><b>Solucion</b></p>
                    <pre>
                    $var1 ='hola';
                    $var = 2;

                    $resultado = $var1 . ' Mundo ' . $var . ' numeros: ' . 3 . 4;

                    echo $resultado;
                    </pre>
                    <p><b>La salida de este codigo es :</b></p>
                    @php
                    $var1 ='hola';
                    $var = 2;

                    $resultado = $var1 . ' Mundo ' . $var . ' numeros: ' . 3 . 4;

                    echo $resultado;

                    @endphp

                </div>
            </div>
        </div>
    </div>
</div>
@endsection