import { createApp } from 'vue';
import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';

// Função para criar um componente Vue
const mountComponent = (component, selector) => {
  const element = document.querySelector(selector);
  if (element) {
    createApp(component).mount(selector);
  }
};

mountComponent.use(ZiggyVue, Ziggy);

// Importar seus componentes
import headercomponent from './Pages/header.vue';
import footercomponent from './Pages/footer.vue';

// componetes de teste 
import headertest from './Pages/headertest.vue';
import maintest from './Pages/maintest.vue';
import footertest from './Pages/footertest.vue';

// Montar componentes específicos em elementos específicos
mountComponent(headercomponent, '#header');
mountComponent(footercomponent, '#footer');

// componentes de teste
mountComponent(headertest, '#header-test');
mountComponent(maintest, '#main-test');
mountComponent(footertest, '#footer-test');
