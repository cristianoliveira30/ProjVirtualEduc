import Swal from "sweetalert2";
import { route } from "ziggy-js";
import axios from "axios";
import { reactive, ref, toRaw } from "vue";

export function useAuth() {
    const routes = reactive({
        login: route("login"),
        cadastro: route("cadastro"),
        password: route("password.request"),
    });

    const formCadastro = reactive({
        email: "",
        password: "",
        nomeusu: "",
        nomecomp: "",
        telefone: "",
        escolaridade: "",
        termos: false,
        cpf: "",
        nascimento: "",
        rg: "",
        endereco: "",
        cep: "",
        estado: "",
    });

    const formLogin = reactive({
        email: "",
        password: "",
    });

    const listaEstados = [
        "AC",
        "AL",
        "AP",
        "AM",
        "BA",
        "CE",
        "DF",
        "ES",
        "GO",
        "MA",
        "MT",
        "MS",
        "MG",
        "PA",
        "PB",
        "PR",
        "PE",
        "PI",
        "RJ",
        "RN",
        "RS",
        "RO",
        "RR",
        "SC",
        "SP",
        "SE",
        "TO",
    ];

    const status = ref("");

    const submitLogin = async (formLogin) => {
        try {
            Swal.fire({
                title: "Carregando...",
                html: "Por favor, aguarde.",
                allowOutsideClick: false,
                background: "#203cc1",
                color: "#f8f7ff",
                didOpen: () => {
                    Swal.showLoading();
                },
            });

            const data = {
                email: toRaw(formLogin.email),
                password: toRaw(formLogin.password),
            };

            const response = await axios.post(route("login.action"), data);

            if (response.data.message === "Senha ou Email incorretos") {
                Swal.close();
                Swal.fire({
                    icon: "error",
                    title: "Login maldoso ou inválido!",
                    text: "Senha ou Email incorretos",
                    background: "#203cc1",
                    color: "#f8f7ff",
                    confirmButtonColor: "#fa0081",
                });
            } else if (response.data.redirect) {
                Swal.close();
                Swal.fire({
                    icon: "success",
                    title: "Concluído",
                    text: "Login bem sucedido!",
                    background: "#203cc1",
                    color: "#f8f7ff",
                    confirmButtonColor: "#fa0081",
                }).then(() => {
                    window.location.href = response.data.redirect;
                });
            } else {
                Swal.close();
                Swal.fire({
                    icon: "error",
                    title: "Algo deu errado!",
                    text: "Tente novamente.",
                    background: "#203cc1",
                    color: "#f8f7ff",
                    confirmButtonColor: "#fa0081",
                });
            }
        } catch (error) {
            Swal.close();
            Swal.fire({
                icon: "error",
                title: "Algo deu errado!",
                text: "Tente novamente mais tarde.",
                background: "#203cc1",
                color: "#f8f7ff",
                confirmButtonColor: "#fa0081",
            });
            console.error(error);
        }
    };

    const submitCadastro = async () => {
        if (!formCadastro.termos) {
            Swal.fire({
                icon: "error",
                title: "Erro",
                text: "Você precisa aceitar os termos!",
            });
            return;
        }

        Swal.fire({
            title: "Carregando...",
            html: "Por favor, aguarde.",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading(),
        });

        try {
            const response = await axios.post(route("cadastro.action"), formCadastro);
            Swal.close();

            if (response.data.success) {
                Swal.fire({
                    icon: "success",
                    title: "Concluído",
                    text: "Cadastro bem sucedido!",
                    background: "#203cc1",
                    color: "#f8f7ff",
                    confirmButtonColor: "#fa0081",
                });
            } else if (response.data.success === false) {
                Swal.fire({
                    icon: "error",
                    title: "Erro",
                    text: response.data.message,
                    background: "#203cc1",
                    color: "#f8f7ff",
                    confirmButtonColor: "#fa0081",
                });
            } else {
                console.log(response);
                Swal.fire({
                    icon: "error",
                    title: "Cadastro maldoso ou inválido!",
                    text: response.data.message,
                    background: "#203cc1",
                    color: "#f8f7ff",
                    confirmButtonColor: "#fa0081",
                });
            }
        } catch (error) {
            Swal.close();
            Swal.fire({
                icon: "error",
                title: "Algo deu errado!",
                text: "Tente novamente mais tarde.",
            });
        }
    };

    const validarCadastro01 = (formCadastro) => {
        // Verificar se o campo está vazio
        if (!formCadastro.email) {
            Swal.fire({
                icon: "error",
                title: "Erro!",
                text: "Por favor preencha o campo Email",
            });
        }

        if (!formCadastro.password) {
            Swal.fire({
                icon: "error",
                title: "Erro!",
                text: "Por favor preencha o senha",
            });
        }

        if (!formCadastro.nomeusu) {
            Swal.fire({
                icon: "error",
                title: "Erro!",
                text: "Por favor preencha o campo Nome de usuário",
            });
        }

        if (!formCadastro.nomecomp) {
            Swal.fire({
                icon: "error",
                title: "Erro!",
                text: "Por favor preencha o campo Nome completo",
            });
        }

        if (!formCadastro.telefone) {
            Swal.fire({
                icon: "error",
                title: "Erro!",
                text: "Por favor preencha o campo Telefone",
            });
        }

        let escolaridade;

        switch (formCadastro.escolaridade) {
            case 'Fundamental':
                escolaridade = 'Fundamental';
                break;
            case 'Médio':
                escolaridade = 'Médio';
                break;
                case 'Superior':
                    escolaridade = 'Superior';
                break;
            default:
                Swal.fire({
                    icon: "error",
                    title: "Erro!",
                    text: "Por favor marque o campo Escolaridade",
                });
                break;
        }

        if (!formCadastro.termos == true) {
            Swal.fire({
                icon: "error",
                title: "Erro!",
                text: "Por favor aceite os termos de serviços.",
            });
        }

        function isNotEmpty(element) {
            return $.trim(element) !== "";
        }

        console.log(formCadastro);

        let email = formCadastro.email;
        let password = formCadastro.password;
        let nomeusu = formCadastro.nomeusu;
        let nomecomp = formCadastro.nomecomp;
        let telefone = formCadastro.telefone;

        let validacoes = [email, password, nomeusu, nomecomp, telefone, escolaridade];
            
        let valid = validacoes.every(isNotEmpty);

        return valid ? true : false;
    };

    return {
        formLogin,
        formCadastro,
        listaEstados,
        status,
        routes,
        submitLogin,
        submitCadastro,
        validarCadastro01
    };
}
