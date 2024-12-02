import { createApp } from 'vue';

import $ from 'jquery/src/jquery.js';

import { Ziggy } from './ziggy.js'; // Importe o arquivo gerado pelo Ziggy
import { ZiggyVue } from 'ziggy-js';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss'

import 'bootstrap/dist/js/bootstrap.js';
import 'bootstrap/dist/css/bootstrap.css';

// Importar seus componentes
import footercomponent from './Pages/footer.vue';
import infoform from './Pages/infoform.vue';
import profile from './Pages/profile.vue';


// Função para criar um componente Vue
const mountComponent = (component, selector) => {
  const element = document.querySelector(selector);
  if (element) {
    console.log(`Montando componente em ${selector}`);
    const app = createApp(component);
    app.use(ZiggyVue, Ziggy);
    app.mount(selector);
  }
};

window.onload = function() {
  window.$ = window.jQuery = $;
  window.Swal = Swal;

  mountComponent(profile, '#divprofile');
  mountComponent(footercomponent, '#footer');
};

// montando uma modal com sweet alert
$(document).ready(function () {
  $('#buttonaddform').on('click', function() {
      Swal.fire({
          html: `
              <div id="testBlades"></div>
          `,
          showCloseButton: true,
          showConfirmButton: false,
          customClass: {
            popup: 'swal2-borderless' // Aplicando o tema
          }
      },
    );
          mountComponent(infoform, '#testBlades');
      ;
  });
})
