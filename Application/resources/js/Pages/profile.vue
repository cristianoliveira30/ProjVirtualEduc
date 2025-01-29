<template>
    <div v-if="seguidores || seguidos || sugestaoSeguir.length">
        <h1>Seguidos: {{ seguidos }}</h1>
        <h1>Seguidores: {{ seguidores }}</h1>
        <div v-if="sugestaoSeguir.length > 0">
            <h1>Sugestão para seguir:</h1>
            <h1 v-for="sugestao in sugestaoSeguir" :key="sugestao.id">
                {{ sugestao.nomeusu }}
                <div>
                    <button v-if="sugestao.textButton == 'follow'" @click="toggleFollow(sugestao)"
                        class="btn btn-primary">
                        seguir
                    </button>
                    <button v-else @click="toggleFollow(sugestao)"
                        class="btn btn-danger">
                        deixar de seguir
                    </button>
                </div>
            </h1>
        </div>
        <h1 v-else>Sem sugestão para seguir</h1>

        <h1 class="success">Seguindo</h1>
        <h2 v-for="seguido in listaSeguindo">
            {{ seguido.nomeusu }}
            <div>
                <button v-if="seguido.textButton == 'unfollow'" @click="toggleFollow(seguido)" class="btn btn-danger">
                    deixar de seguir
                </button>
                <button v-else @click="toggleFollow(seguido)" class="btn btn-primary">
                    seguir
                </button>
            </div>
        </h2>
    </div>
    <div v-else>
        <h1>Carregando...</h1>
    </div>

</template>


<script setup>
import { onMounted } from 'vue';
import { useProfile } from '../Composables/useRelacionamentos';

// Importa propriedades e métodos do composable
const {
    sugestaoSeguir,
    seguidos,
    listaSeguindo,
    seguidores,
    waitForZiggyRoutes,
    getQtdSeg,
    getSugestaoSeguir,
    getListaSeguindo,
    comecarSeguir,
    deixarSeguir,
} = useProfile();

// Define a função para alternar entre seguir/deixar de seguir
const toggleFollow = (user) => {
    if (user.textButton === 'follow') {
        comecarSeguir(user.id);
        user.textButton = 'unfollow';
    } else {
        deixarSeguir(user.id);
        user.textButton = 'follow';
    }
};

// Executa no momento em que o componente é montado
onMounted(() => {
    waitForZiggyRoutes(() => {
        getQtdSeg(); // Carrega a quantidade de seguidores/seguidos
        getSugestaoSeguir(); // Carrega a sugestão de quem seguir
        getListaSeguindo();
    });
});
</script>
