// esse arquivo pega todos os arquivos vue e os carrega, analisem o código pra entender como ele carrega a página e atribui ao Blade 
// pelo id

import { createApp } from 'vue';

// Função para criar um componente Vue
const mountComponent = (component, selector) => {
  const element = document.querySelector(selector);
  if (element) {
    createApp(component).mount(selector);
  }
};

// Importar seus componentes
import Home from './home.vue';
// import About from './exemplo.vue';

// Montar componentes específicos em elementos específicos
mountComponent(Home, '#home');
// mountComponent(Exemplo, '#exemplo');
