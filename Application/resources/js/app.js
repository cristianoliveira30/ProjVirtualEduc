import { createApp } from 'vue';

// Função para criar um componente Vue
const mountComponent = (component, selector) => {
  const element = document.querySelector(selector);
  if (element) {
    createApp(component).mount(selector);
  }
};

// Importar seus componentes
import header from './Pages/header.vue';
import footer from './Pages/footer.vue';

// componetes de teste 
import headertest from './Pages/headertest.vue';
import maintest from './Pages/maintest.vue';
import footertest from './Pages/footertest.vue';

// Montar componentes específicos em elementos específicos
mountComponent(header, '#header');
mountComponent(footer, '#footer');

// componentes de teste
mountComponent(headertest, '#header-test');
mountComponent(maintest, '#main-test');
mountComponent(footertest, '#footer-test');
