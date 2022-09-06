<template id="my-template">
    <swal-title>
        Si cambia la vacuna deberá elegir las fechas nuevamente.
    </swal-title>
    <swal-icon type="warning" color="red"></swal-icon>
    <swal-button type="confirm">
        ¡Lo comprendo!
    </swal-button>
    <swal-button type="cancel">
        Cancelar
    </swal-button>
    <swal-param name="allowEscapeKey" value="false" />
    <swal-param name="customClass" value='{ "popup": "my-popup" }' />
</template>
