<template>
    <div v-if="seguidores || seguidos || sugestaoSeguir.length">
        <h1>Seguidos: {{ seguidos }}</h1>
        <h1>Seguidores: {{ seguidores }}</h1>
        <div v-if="sugestaoSeguir.length > 0">
            <h1>Sugestão para seguir:</h1>
            <h1 v-for="sugestao in sugestaoSeguir" :key="sugestao.id">
                {{ sugestao.nomeusu }}
            </h1>
        </div>
        <h1 v-else>Sem sugestão para seguir</h1>
    </div>
    <div v-else>
        <h1>Carregando...</h1>
    </div>
</template>


<script>
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

export default {
    name: 'profile',
    data() {
        return {
            sugestaoSeguir: [],
            seguidos: 0, // Inicializa como 0
            seguidores: 0, // Inicializa como 0
            ziggyReady: false // Flag para verificar se o Ziggy está carregado
        };
    },
    mounted() {
        // Aguarde até que as rotas do Ziggy estejam disponíveis
        this.waitForZiggyRoutes(() => {
            this.getQtdSeg();
            this.getSugestaoSeguir();
        });
    },
    methods: {
        // Função para aguardar a disponibilidade do Ziggy
        waitForZiggyRoutes(callback) {
            if (window.Ziggy && Ziggy.routes) {
                this.ziggyReady = true; // Marca como pronto
                callback();
            } else {
                console.log('Aguardando Ziggy...');
                setTimeout(() => this.waitForZiggyRoutes(callback), 50); // Verifica novamente após 50ms
            }
        },

        async getQtdSeg() {
            if (!this.ziggyReady) {
                console.error('As rotas do Ziggy ainda não estão prontas.');
                return;
            }

            const url = route('getQtdSeg', { escolha: 'ambos', id: 'auth' });

            try {
                const response = await axios.get(url);

                this.seguidos = response.data[0].seguindo_count;
                this.seguidores = response.data[0].seguidores_count;

                console.log('Dados:', response.data);
            } catch (error) {
                console.error('Erro ao obter quantidade:', error.response?.data || error.message);
            }
        },

        async getSugestaoSeguir() {
            if (!this.ziggyReady) {
                console.error('As rotas do Ziggy ainda não estão prontas.');
                return;
            }

            const url = route('getSugestaoSeguir', 3);

            try {
                const response = await axios.get(url);

                this.sugestaoSeguir = response.data;
                console.log('Sugestões para seguir:', response.data);
            } catch (error) {
                console.error('Erro ao obter sugestões:', error.response?.data || error.message);
            }
        }
    }
};
</script>