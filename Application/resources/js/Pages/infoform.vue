<template>
    <div class="container-fluid d-flex justify-content-center">
        <form class="form-info rounded-4 m-3">
            <div v-if="currentStep === 1">
                <p class="title-info border-bottom p-2">Informações Adicionais</p>
                <div class="d-grid justify-content-cente flex-column col">
                    <div class="row mb-3" style="justify-self: center;">
                        <!--  From Uiverse.io by AbanoubMagdy1  -->
                        <div class="wave-group">
                            <input required="" type="email" class="input">
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
                        <label class="custum-file-upload col" for="file">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                    <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                    <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill=""
                                            d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                            clip-rule="evenodd" fill-rule="evenodd">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="text">
                                <span>CPF, CNH ou Passaporte</span>
                            </div>
                            <input type="file" id="file">
                        </label>

                        <!-- From Uiverse.io by Yaya12085  -->
                        <label class="custum-file-upload col" for="file">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                    <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                    <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill=""
                                            d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                            clip-rule="evenodd" fill-rule="evenodd">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="text">
                                <span>Imagem do seu rosto</span>
                            </div>
                            <input type="file" id="file">
                        </label>
                    </div>

                </div>
                <button class="nextStep" type="button" @click="nextStep">Próximo</button>
            </div>

            <div v-if="currentStep === 2">
                <p class="title-info border-bottom p-2">Selecione os tópicos que você tem interesse</p>
                <div class="d-grid justify-content-cente flex-column col">
                    <div class="row mb-3 border-bottom" style="justify-self: center;">
                        <h4>Tópicos selecionados:</h4>

                    </div>

                    <div class="">
                        <cadaDisciplina v-for="disciplina in disciplinas" v-bind:disciplina="disciplina"v-bind:key="disciplina">
                        <!-- conteúdo que será gerado -->
                        </cadaDisciplina>
                    </div>

                </div>
                <button type="button" @click="prevStep" class="btn btn-secondary">Voltar</button>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</template>
<script>
import { route } from 'ziggy-js';

const cadaDisciplina = {
    props: ['disciplina'],
    template: `<button class="badge rounded-pill text-light bg-primary m-1" type="button"> {{ disciplina }} <i class="bi bi-x"></i></button>`
}

var clickedDisciplinas = [];

export default {
    name: 'infoform',
    data() {
        return {
            currentStep: 1, // Controla qual parte do formulário é exibida
        };
    },
    mounted() {
        this.getDisciplinas();
    },
    methods: {
        nextStep() {
            if (this.currentStep < 2) {
                this.currentStep++;
            }
        },
        prevStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        }, 
        async getDisciplinas() {
            try {
                await $.ajax({
                    url: route('getListaDisciplinas'),
                    method: 'GET',
                    success: (response) => {
                        this.disciplinas = response.disciplinas;
                        console.log(this.disciplinas);
                    },
                    error: (xhr, status, error) => {
                        console.error('Erro ao buscar disciplinas:', (error || xhr || status));
                    }
                });
            } catch (error) {
                console.error('Erro ao buscar disciplinas:', error);
            }
        },
        addDisciplina(disciplina) {
            this.clickedDisciplinas.push(disciplina);
            return console.log(clickedDisciplinas);
        }
    },
    components: {
        cadaDisciplina
    }
};
</script>