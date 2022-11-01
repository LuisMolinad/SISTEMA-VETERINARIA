@extends('app')

@section('titulo')
    Reportes
@endsection

<meta charset="UTF-8">
<link rel="stylesheet" href=" {{ asset('css/grafico.css') }} ">
{{-- *Graficas --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>


{{-- *Corousel --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>



@section('header')
    <h1 class="header">Reportes</h1>
@endsection

@section('content')
    {{-- TODO: Campos ocultos para pasar los valores al grafico --}}
    <input type="text" id="nombreServicios" value="{{ $nombresServicios }}" style="display:none">
    <input type="number" id="citasVacuna" value="{{ $citasVacunaMesActual }}">
    <input type="number" id="citasCirugia" value="{{ $citasCirugiaMesActual }}"style="display:none">
    <input type="number" id="citasLimpiezaDental" value="{{ $citasLimpiezaDentalMesActual }}"style="display:none">
    <input type="number" id="citasServicios" value="{{ $citasServicios }}"style="display:none">


    <div class="graficos-container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <canvas id="myChart">
                    </canvas>
                </div>
                <div class="carousel-item">
                    <canvas id="myChart1">
                    </canvas>
                </div>
                <div class="carousel-item">
                    <canvas id="myChart2">
                    </canvas>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div id="carouselTrimestre" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <canvas id="myChart">
                    </canvas>
                </div>
                <div class="carousel-item">
                    <canvas id="myChart1">
                    </canvas>
                </div>
                <div class="carousel-item">
                    <canvas id="myChart2">
                    </canvas>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTrimestre" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselTrimestre" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div>
            <canvas id="myChart2">
            </canvas>
        </div>
    </div>


    {{--   <div class="graficos-container">
        <div>
            <canvas id="myChart">
            </canvas>
        </div>
        <div>
            <canvas id="myChart1">
            </canvas>
        </div>
        <div>
            <canvas id="myChart2">
            </canvas>
        </div>
    </div> --}}

    {{--  <div class="container">

    </div> --}}
@endsection

@section('js')
    <script src="{{ asset('js/graficas.js') }}"></script>
@endsection
