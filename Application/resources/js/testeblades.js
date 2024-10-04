import { createApp } from 'vue';
import infoform from './Pages/infoform.vue'

$(document).ready(function () {
    $('#buttonaddform').on('click', function() {
        Swal.fire({
            html: `
                <div id="testBlades"></div>
            `,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: `
                <i class="fa fa-thumbs-down"></i>
            `,
            cancelButtonAriaLabel: "Thumbs down"
        }).then(() => {
            // Monte o componente Vue no elemento SweetAlert quando ele for exibido
            const app = createApp(infoform);
            app.mount('#testBlades'); // Monta o componente no ID do SweetAlert
        });
    });
})