import { ref, onMounted } from "vue";
import { route } from "ziggy-js";
import { Ziggy } from '../ziggy.js';

// Configure o Ziggy para ser acessado globalmente
window.route = route;
window.Ziggy = Ziggy;

// Configuração AJAX padrão
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        Accept: "application/json",
    },
});

export function usePageTools() {
    const ziggyReady = ref(false); 
    const currentStep = ref(1);

    // Função para aguardar a disponibilidade do Ziggy
    const waitForZiggyRoutes = (callback) => {
        if (window.Ziggy && Ziggy.routes) {
            ziggyReady.value = true; // Marca como pronto
            callback();
        } else {
            console.log("Aguardando Ziggy...");
            setTimeout(() => waitForZiggyRoutes(callback), 50); // Verifica novamente após 50ms
        }
    };

    // Funções para navegar entre os passos
    const nextStep = () => {
        if (currentStep.value < 2) {
            currentStep.value++;
        }
    };

    const prevStep = () => {
        if (currentStep.value > 1) {
            currentStep.value--;
        }
    };

    return {
        ziggyReady,
        currentStep,
        waitForZiggyRoutes,
        nextStep,
        prevStep,
    };
}
