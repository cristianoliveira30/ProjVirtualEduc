import { createApp } from 'vue';
import { Ziggy } from './ziggy.js'; // Importe o arquivo gerado pelo Ziggy
import { useRoute, ZiggyVue } from 'ziggy-js';

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
      });
          mountComponent(infoform, '#testBlades');
      ;
  });
})

// componentes de teste
// mountComponent(headertest, '#header-test');
// mountComponent(maintest, '#main-test');
// mountComponent(footertest, '#footer-test');
