import { ref } from 'vue';
import axios from 'axios';
import { route } from 'ziggy-js';
import { Ziggy } from '../ziggy.js';

// Configure o Ziggy para ser acessado globalmente
window.route = route;
window.Ziggy = Ziggy;

// Configuração AJAX padrão
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json',
    }
});

export function useProfile() {
    const sugestaoSeguir = ref([]);
    const seguidos = ref(0);
    const seguidores = ref(0);
    const listaSeguindo = ref([]);
    const listaSeguidores = ref([]);

    const getQtdSeg = async () => {
        if (!ziggyReady.value) {
            console.error('As rotas do Ziggy ainda não estão prontas.');
            return;
        }

        const url = route('getQtdSeg', { escolha: 'ambos', id: 'auth' });

        try {
            const response = await axios.get(url);
            seguidos.value = response.data[0].seguindo_count;
            seguidores.value = response.data[0].seguidores_count;
            console.log('Dados:', response.data);
        } catch (error) {
            console.error('Erro ao obter quantidade:', error.response?.data || error.message);
        }
    };

    const getSugestaoSeguir = async () => {
        if (!ziggyReady.value) {
            console.error('As rotas do Ziggy ainda não estão prontas.');
            return;
        }

        const url = route('getSugestaoSeguir', 3);

        try {
            const response = await axios.get(url);
            sugestaoSeguir.value = response.data.map(item => ({
                ...item,
                textButton: 'follow' // Valor padrão para o botão
            }));
            console.log('Sugestões para seguir:', sugestaoSeguir.value);
        } catch (error) {
            console.error('Erro ao obter sugestões:', error.response?.data || error.message);
        }
    };

    const comecarSeguir = async (idSeguido) => {
        const url = route('comecarSeguir', idSeguido);

        try {
            const response = await axios.get(url);
            sugestaoSeguir.value.forEach(element => {
                if (element.id === idSeguido) {
                    element.textButton = 'unfollow';
                }
            });
            seguidos.value++;
            console.log(response.data);
        } catch (error) {
            console.error('Erro ao seguir', error);
        }
    };

    const deixarSeguir = async (idSeguido) => {
        const url = route('deixarSeguir', idSeguido);

        try {
            const response = await axios.get(url);
            sugestaoSeguir.value.forEach(element => {
                if (element.id === idSeguido) {
                    element.textButton = 'follow';
                }
            });
            seguidos.value--;
            console.log(response.data);
        } catch (error) {
            console.error('Erro ao deixar de seguir', error);
        }
    };

    const getListaSeguindo = async () => {
        const url = route('getListaSeguindo');

        try {
            const response = await axios.get(url);
            listaSeguindo.value = response.data.message;
            listaSeguindo.value.forEach(element => {
                element.textButton = 'unfollow';
            });
            console.log(listaSeguindo.value);
        } catch (error) {
            console.error('Erro ao pegar lista', error);
        }
    }

    return {
        sugestaoSeguir,
        seguidos,
        listaSeguindo,
        seguidores,
        listaSeguidores,
        ziggyReady,
        waitForZiggyRoutes,
        getQtdSeg,
        getSugestaoSeguir,
        getListaSeguindo,
        comecarSeguir,
        deixarSeguir,
    };
}
