import { createApp } from 'vue';

// Função para criar um componente Vue
const mountComponent = (component, selector) => {
  const element = document.querySelector(selector);
  if (element) {
    createApp(component).mount(selector);
  }
};

// Importar seus componentes
import headertest from './Pages/headertest.vue';
import maintest from './Pages/maintest.vue';
import footertest from './Pages/footertest.vue';

// Montar componentes específicos em elementos específicos
mountComponent(headertest, '#header-test');
mountComponent(maintest, '#main-test');
mountComponent(footertest, '#footer-test');
