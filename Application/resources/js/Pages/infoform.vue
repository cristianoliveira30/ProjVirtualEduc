<template>
    <div class="container-fluid d-flex justify-content-center">
        <form class="form-info rounded-4 m-3" method="POST" enctype="multipart/form-data">

            <div v-show="currentStep === 1">
                <p class="title-info border-bottom p-2">Informações Adicionais</p>
                <div class="d-grid justify-content-cente flex-column col">

                    <div class="row mb-3" style="justify-self: center;">
                        <!--  From Uiverse.io by AbanoubMagdy1  -->
                        <div class="wave-group">
                            <input id="segemail" v-model="form1.segemail" required="" type="email" class="input">
                            <span class="bar"></span>
                            <label class="label-email">
                                <span class="label-char" style="--index: 0">E</span>
                                <span class="label-char" style="--index: 1">m</span>
                                <span class="label-char" style="--index: 2">a</span>
                                <span class="label-char" style="--index: 3">i</span>
                                <span class="label-char" style="--index: 4">l</span>
                                <span class="label-char ms-1" style="--index: 5"> </span>
                                <span class="label-char" style="--index: 6">D</span>
                                <span class="label-char" style="--index: 7">e</span>
                                <span class="label-char ms-1" style="--index: 8"> </span>
                                <span class="label-char" style="--index: 9">R</span>
                                <span class="label-char" style="--index: 10">e</span>
                                <span class="label-char" style="--index: 11">c</span>
                                <span class="label-char" style="--index: 12">u</span>
                                <span class="label-char" style="--index: 13">p</span>
                                <span class="label-char" style="--index: 14">e</span>
                                <span class="label-char" style="--index: 15">r</span>
                                <span class="label-char" style="--index: 16">a</span>
                                <span class="label-char" style="--index: 17">ç</span>
                                <span class="label-char" style="--index: 18">ã</span>
                                <span class="label-char" style="--index: 19">o</span>
                            </label>
                        </div>

                    </div>

                    <div class="row p-4">
                        <!-- From Uiverse.io by Yaya12085 -->
                        <label class="custum-file-upload col" for="filedocumento">
                            <div v-if="form1.documento === null">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 
                                                7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 
                                                8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 
                                                11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 
                                                10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 
                                                4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 
                                                15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 
                                                21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 
                                                12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 
                                                23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 
                                                15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd"
                                                fill-rule="evenodd">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>CPF, CNH ou Passaporte</span>
                                </div>
                            </div>
                            <div v-else>
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477
                                             9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 
                                             1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>{{ form1.documento.name }}</span>
                                </div>
                            </div>

                            <input type="file" id="filedocumento" @change="handleFileUpload('documento', $event)">
                        </label>

                        <!-- From Uiverse.io by Yaya12085  -->
                        <label class="custum-file-upload col" for="filefoto">
                            <div v-if="form1.foto === null">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 
                                                7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 
                                                8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 
                                                11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 
                                                10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 
                                                4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 
                                                15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 
                                                21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 
                                                11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 
                                                10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 
                                                20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd"
                                                fill-rule="evenodd">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>Imagem do seu rosto</span>
                                </div>
                            </div>
                            <div v-else>
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green"
                                        class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 
                                            9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 
                                            1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </div>
                                <div class="text">
                                    <span>{{ form1.foto.name }}</span>
                                </div>
                            </div>
                            <input type="file" id="filefoto" @change="handleFileUpload('foto', $event)">
                        </label>
                    </div>

                </div>
                <button class="nextStep" type="button" @click="nextStep">Próximo</button>
            </div>

            <div v-show="currentStep === 2">
                <p class="title-info border-bottom p-2">Selecione os tópicos que você tem interesse</p>
                <div class="d-grid justify-content-cente flex-column col">
                    <div class="mb-3 border-bottom" style="justify-self: center;">
                        <h4>Tópicos selecionados:</h4>
                        <selDisciplinas v-for="disciplina in disciplinasSelecionadas" :disciplina="disciplina"
                            :key="disciplina" :disciplinasSelecionadas="disciplinasSelecionadas"
                            @mostrar="mostrarDisciplina">
                        </selDisciplinas>
                    </div>

                    <div class="">
                        <cadaDisciplina v-for="disciplina in disciplinas" :disciplina="disciplina" :key="disciplina"
                            :disciplinasSelecionadas="disciplinasSelecionadas" @ocultar="ocultarDisciplina">
                        </cadaDisciplina>
                    </div>

                </div>
                <button type="button" @click="prevStep" class="btn btn-secondary">Voltar</button>
                <button type="submit" @click="addInteresses" class="btn btn-success">Enviar</button>
            </div>

        </form>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import { useInfo } from '../Composables/useInformation';
import { usePageTools } from '../Composables/usePagesTools';

const {
    disciplinas,
    disciplinasSelecionadas,
    form1,
    getDisciplinas,
    handleFileUpload,
    ocultarDisciplina,
    mostrarDisciplina,
    addInteresses,
} = useInfo();

const {
    ziggyReady,
    currentStep,
    waitForZiggyRoutes,
    nextStep,
    prevStep,
} = usePageTools();

// Componente "cadaDisciplina"
const cadaDisciplina = {
    props: ['disciplina', 'disciplinasSelecionadas'],
    template: `<button 
                  class="badge rounded-pill text-light bg-primary m-1" 
                  v-show="!disciplinasSelecionadas.includes(disciplina)" 
                  @click="$emit('ocultar', disciplina)" 
                  type="button">
                  {{ disciplina }}
               </button>`
}

// Componente "selDisciplinas"
const selDisciplinas = {
    props: ['disciplina', 'disciplinasSelecionadas'],
    template: `<button 
                  class="badge rounded-pill text-light bg-info m-1"
                  v-show="disciplinasSelecionadas.includes(disciplina)" 
                  @click="$emit('mostrar', disciplina)" 
                  type="button">
                  {{ disciplina }} 
                  <i class="bi bi-x"></i>
               </button>`
}

// Monta o componente ao ser carregado
onMounted(() => {
    waitForZiggyRoutes(() => {
        getDisciplinas();
    });
});
</script>
