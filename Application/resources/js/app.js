import { createApp } from 'vue';

import $ from 'jquery/src/jquery.js';

import { Ziggy } from './ziggy.js'; // Importe o arquivo gerado pelo Ziggy
import { useRoute, ZiggyVue } from 'ziggy-js';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/src/sweetalert2.scss'

import 'bootstrap/dist/js/bootstrap.js';
import 'bootstrap/dist/css/bootstrap.css';

window.onload = function() {
  window.$ = window.jQuery = $;
  window.Swal = Swal;
};

// Função para criar um componente Vue
const mountComponent = (component, selector) => {
  const element = document.querySelector(selector);
  if (element) {
    const app = createApp(component);
    app.use(ZiggyVue, Ziggy);  // Use ZiggyVue com Ziggy antes do mount
    app.mount(selector);
  }
};

// Importar seus componentes
import headercomponent from './Pages/header.vue';
import footercomponent from './Pages/footer.vue';
import infoform from './Pages/infoform.vue';

// componetes de teste 
// import headertest from './Pages/headertest.vue';
// import maintest from './Pages/maintest.vue';
// import footertest from './Pages/footertest.vue';

// Montar componentes específicos em elementos específicos
mountComponent(headercomponent, '#header');
mountComponent(footercomponent, '#footer');

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

// componentes de teste
// mountComponent(headertest, '#header-test');
// mountComponent(maintest, '#main-test');
// mountComponent(footertest, '#footer-test');
