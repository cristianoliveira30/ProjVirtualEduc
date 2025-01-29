import { ref, onMounted } from "vue";
import axios from "axios";
import { route } from "ziggy-js";
import Swal from "sweetalert2";

// Configuração AJAX padrão
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        Accept: "application/json",
    },
});

export function useInfo() {
    const disciplinas = ref([]);
    const disciplinasSelecionadas = ref([]);
    const form1 = ref({
        segemail: "",
        documento: null,
        foto: null,
    });

    // Função para obter as disciplinas via AJAX
    const getDisciplinas = async () => {
        try {
            const response = await axios.get(route("getListaDisciplinas"));
            disciplinas.value = response.data.disciplinas;
            console.log(disciplinas.value);
        } catch (error) {
            console.error("Erro ao buscar disciplinas:", error);
        }
    };

    // Função para lidar com o upload de arquivos
    const handleFileUpload = (type, event) => {
        const file = event.target.files[0];
        if (
            file &&
            file.size < 2000000 &&
            ["image/jpeg", "application/pdf"].includes(file.type)
        ) {
            if (type === "documento") {
                form1.value.documento = file;
            } else if (type === "foto") {
                form1.value.foto = file;
            }
        } else {
            Swal.fire({
                icon: "error",
                title: "Erro",
                text: "Formato inválido ou arquivo muito grande, certifique-se que o arquivo tenha menos de 2MB",
            });
        }
    };

    // Funções para ocultar e mostrar disciplinas
    const ocultarDisciplina = (disciplina) => {
        disciplinasSelecionadas.value.push(disciplina);
    };

    const mostrarDisciplina = (disciplina) => {
        disciplinasSelecionadas.value = disciplinasSelecionadas.value.filter(
            (d) => d !== disciplina
        );
    };

    // Função para adicionar interesses
    const addInteresses = () => {
        Swal.fire({
            title: "Carregando...",
            html: "Por favor, aguarde.",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            },
        });
        try {
            const form = new FormData();
            const link = route("addDisciplinas");

            form.append("segemail", form1.value["segemail"]);
            form.append("documento", form1.value["documento"]);
            form.append("foto", form1.value["foto"]);
            form.append(
                "disciplinas",
                JSON.stringify(disciplinasSelecionadas.value)
            );

            axios
                .post(link, form, {
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                        Accept: "application/json",
                    },
                })
                .then((response) => {
                    Swal.fire({
                        icon: "success",
                        title: "Concluído",
                        text: "Informações Atualizadas!",
                    }).then(() => {
                        window.location.href = response.data.redirect;
                    });
                })
                .catch((error) => {
                    console.error(error.response ? error.response.data : error);
                    Swal.fire({
                        icon: "error",
                        title: "Erro",
                        text: "Houve um erro ao processar suas informações, tente novamente mais tarde ou entre em contato com o suporte",
                    });
                });
        } catch {
            console.log("Erro ao adicionar interesses");
        }
    };

    return {
        disciplinas,
        disciplinasSelecionadas,
        form1,
        getDisciplinas,
        handleFileUpload,
        ocultarDisciplina,
        mostrarDisciplina,
        addInteresses,
    };
}
