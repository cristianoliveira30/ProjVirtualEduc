<template>
    <form @submit.prevent="submitCadastro" class="backgroundForm" enctype="multipart/form-data">
        <div>
            <img src="/assets/img/titulo02.png" alt="titulo" style="width: 100%" />
        </div>

        <div v-if="currentStep === 1" class="etapa01">
            <div class="input-box">
                <div class="form-group inputForm">
                    <input v-model="formCadastro.email" class="inputForm02" type="email" placeholder="Email" maxlength="30"
                        required />
                </div>
                <div class="form-group inputForm">
                    <input v-model="formCadastro.password" class="inputForm02" type="password" placeholder="Senha" minlength="8"
                        required />
                </div>
            </div>
            <div class="input-box">
                <div class="form-group inputForm">
                    <input v-model="formCadastro.nomeusu" class="inputForm02" type="text" placeholder="Nome de Usuário"
                        maxlength="50" required />
                </div>
                <div class="form-group inputForm">
                    <input v-model="formCadastro.nomecomp" class="inputForm02" type="text" placeholder="Nome Completo"
                        maxlength="50" required />
                </div>
            </div>
            <div class="input-box">
                <div class="form-group inputForm">
                    <input v-model="formCadastro.telefone" v-mask="'(##) # ####-####'" class="inputForm02" type="text" placeholder="Telefone" maxlength="50"
                        required />
                </div>
                <div class="form-group inputForm">
                    <select v-model="formCadastro.escolaridade" class="inputForm02" required>
                        <option value="" disabled selected>Escolaridade</option>
                        <option value="Fundamental">Fundamental</option>
                        <option value="Médio">Médio</option>
                        <option value="Superior">Superior</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input v-model="formCadastro.termos" type="checkbox" id="checbox-termos" />
                <label for="checbox-termos" class="m-2">Li e concordo com os termos!</label>
            </div>
            <div class="form-group">
                <button id="nextStep" @click.prevent="next" class="btn-virtual">Próximo</button>
            </div>
        </div>

        <div v-else class="etapa02">
            <div class="d-flex">
                <div class="form-group inputForm">
                    <input v-model="formCadastro.cpf" v-mask="['###.###.###-##', '##.###.###/####-##']" class="inputForm02" type="text" placeholder="CPF" maxlength="14"
                        required />
                </div>
                <div class="form-group inputForm" style="width: 50%">
                    <input v-model="formCadastro.nascimento" class="inputForm02" type="date" maxlength="15" required />
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group inputForm">
                    <input v-model="formCadastro.rg" v-mask="'#######'" class="inputForm02" type="text" placeholder="Registro Geral" maxlength="7"
                        required />
                </div>
                <div class="form-group inputForm" style="width: 50%">
                    <input v-model="formCadastro.endereco" class="inputForm02" type="text" placeholder="Endereço" maxlength="50"
                        required />
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group inputForm">
                    <input v-model="formCadastro.cep" v-mask="'#####-###'" class="inputForm02" type="text" placeholder="CEP" maxlength="50"
                        required />
                </div>
                <div class="form-group inputForm" style="width: 50%">
                    <select v-model="formCadastro.estado" class="inputForm02" required>
                        <option selected disabled>Selecionar Estado</option>
                        <option v-for="estado in listaEstados" :key="estado" :value="estado">
                            {{ estado }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group text-center">
                <button @click.prevent="prevStep"
                    class="btn btn-primary border-0 w-25 rounded-1 p-1 mt-2">Voltar</button>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useAuth } from '../Composables/useAuth';
import { usePageTools } from '../Composables/usePagesTools';

const {
    formCadastro,
    listaEstados,
    submitCadastro,
    validarCadastro01,
} = useAuth();

const {
    currentStep,
    prevStep,
    nextStep,
} = usePageTools();

function next() {
    const valid = validarCadastro01(formCadastro);
    valid == true ? nextStep() : console.log(formCadastro, valid);
}
</script>