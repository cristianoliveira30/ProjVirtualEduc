<template>
    <div class="container-fluid d-flex justify-content-center">
        <form class="form-info rounded-4 m-3" method="POST" enctype="multipart/form-data">
            <div v-if="currentStep === 1">
                <p class="title-info border-bottom p-2">Informações Adicionais</p>
                <div class="d-grid justify-content-cente flex-column col">
                    <div class="row mb-3" style="justify-self: center;">
                        <!--  From Uiverse.io by AbanoubMagdy1  -->
                        <div class="wave-group">
                            <input id="emailsecundario"required="email" type="email" class="input">
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
                            <input required="file" type="file" id="documento">
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
                            <input required="file" type="file" id="foto">
                        </label>
                    </div>

                </div>
                <button class="nextStep" type="button" @click="nextStep">Próximo</button>
            </div>

            <div v-if="currentStep === 2">
                <p class="title-info border-bottom p-2">Selecione os tópicos que você tem interesse</p>
                <div class="d-grid justify-content-cente flex-column col">
                    <div class="mb-3 border-bottom" style="justify-self: center;">
                        <h4>Tópicos selecionados:</h4>
                        <selDisciplinas 
                            v-for="disciplina in disciplinasSelecionadas" 
                            :disciplina="disciplina" 
                            :key="disciplina"
                            :disciplinasSelecionadas="disciplinasSelecionadas"
                            @mostrar="mostrarDisciplina">
                        </selDisciplinas>
                    </div>

                    <div class="">
                        <cadaDisciplina 
                            v-for="disciplina in disciplinas" 
                            :disciplina="disciplina" 
                            :key="disciplina"
                            :disciplinasSelecionadas="disciplinasSelecionadas"
                            @ocultar="ocultarDisciplina">
                        </cadaDisciplina>
                    </div>

                </div>
                <button type="button" @click="prevStep" class="btn btn-secondary">Voltar</button>
                <button type="submit" @click="addInteresses" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</template>
<script>
import { route } from 'ziggy-js';
import axios from 'axios';


$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
		'Accept': 'application/json',
	}
});

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

export default {
    name: 'infoform',
    data() {
        return {
            currentStep: 1, // Controla qual parte do formulário é exibida
            disciplinas: [],  // Array de disciplinas que será preenchido via AJAX
            disciplinasSelecionadas: []  // Disciplinas que serão ocultadas
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
        ocultarDisciplina(disciplina) {
            // Move a disciplina para o array de ocultas e adiciona a selecionadas
            this.disciplinasSelecionadas.push(disciplina);
        },
        mostrarDisciplina(disciplina) {
            // Remove a disciplina do array de ocultas e de selecionadas
            this.disciplinasSelecionadas = this.disciplinasSelecionadas.filter(d => d !== disciplina);
        },
        addInteresses() {
            Swal.fire({
                title: 'Carregando...',
                html: 'Por favor, aguarde.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            try {
                const form1 = {};
                const form2 = this.disciplinasSelecionadas;
                const link = route('addDisciplinas');

                // Serializa os dados do formulário
                $(this).serializeArray().forEach(function(field) {
                    form1[field.name] = field.value;
                });

                // Prepara o objeto final a ser enviado
                const form = {
                    dados: form1,
                    disciplinas: form2
                }

                // Converte para JSON
                const json = JSON.stringify(form);

                // Faz a requisição AJAX
                $.ajax({
                    url: link,
                    method: 'POST',
                    contentType: 'application/json',
                    data: json,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    success: (response) => {
                        console.log(response);
                        Swal.fire({
                            icon: "success",
                            title: "Concluído",
                            text: "Cadastro bem sucedido!"
                        })
                        .then(() => {
                            window.location.href = response.redirect;
                        });

                    },
                    error: (xhr, status, error) => {
                        console.log(xhr, status, error);
                    }
                });
            }
            catch {
                console.log('Erro ao adicionar interesses');
            }
        }
    },
    components: {
        cadaDisciplina,
        selDisciplinas
    }
};
</script>