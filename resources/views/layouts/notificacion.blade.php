<div class="container">
    @if (session('success'))
        <div role="alert" id="alerta" class="alert alert-success css-alerta">
            <p class="texto-alerta">{{ session('success') }}</p>
        </div>
    @elseif (session('primary'))
        <div role="alert" id="alerta" class="alert alert-primary css-alerta">
            <p class="texto-alerta">{{session('primary')}}</p>
        </div>
    @elseif (session('secondary'))
        <div role="alert" id="alerta" class="alert alert-secondary css-alerta">
            <p class="texto-alerta">{{session('secondary')}}</p>
        </div>
    @elseif (session('danger'))
        <div role="alert" id="alerta" class="alert alert-danger css-alerta">
            <p class="texto-alerta">{{session('danger')}}</p>
        </div>
    @elseif (session('warning'))
        <div role="alert" id="alerta" class="alert alert-warning css-alerta">
            <p class="texto-alerta">{{session('warning')}}</p>
        </div>
    @elseif (session('info'))
        <div role="alert" id="alerta" class="alert alert-info css-alerta">
            <p class="texto-alerta">{{session('info')}}</p>
        </div>
    @elseif (session('light'))
        <div role="alert" id="alerta" class="alert alert-light css-alerta">
            <p class="texto-alerta">{{session('light')}}</p>
        </div>
    @elseif (session('dark'))
        <div role="alert" id="alerta" class="alert alert-dark css-alerta">
            <p class="texto-alerta">{{session('dark')}}</p>
        </div>
    @endif
</div>

<script>

    $('#alerta').fadeTo(2500,500)
    .slideUp(500, ()=>{
        $('alerta').slideUp(500)
    })

</script>