<script setup>
import { ref } from "vue";

let show = ref(true);

function hideCookies(agreement) {
    if (agreement) {
        document.cookie = "cookiesAccepted=true; path=/";
        show.value = false;
    } else {
        show.value = false;
    }
}

function checkCookiesAccepted() {
    const cookiesAccepted = document.cookie.split(';').some(cookie => cookie.trim().startsWith('cookiesAccepted='));
    if (cookiesAccepted) {
        show.value = false;
    }
}

checkCookiesAccepted();
</script>

<template>
    <div v-if="show">
        <div class="mt-5 fixed inset-x-0 bottom-0 z-50 flex flex-col items-center justify-center bg-gray-800 text-white p-4 sm:p-6 lg:p-8">
            <p class="text-lg md:text-xl text-center mb-4">
                Utilizamos cookies y otras tecnologías de seguimiento para mejorar su experiencia de navegación en nuestro sitio web, mostrarle contenido personalizado y anuncios dirigidos, analizar el tráfico de nuestro sitio web y comprender de dónde provienen nuestros visitantes.
            </p>
            <div class="flex flex-col md:flex-row gap-2">
                <button class="bg-teal-600 w-full min-w-[200px] hover:bg-teal-700 px-4 py-2 text-sm md:text-base font-semibold rounded-lg mb-2 md:mb-0" @click="hideCookies(true)">
                    Estoy de acuerdo
                </button>
                <button class="bg-gray-600 w-full min-w-[200px] hover:bg-gray-700 px-4 py-2 text-sm md:text-base font-semibold rounded-lg" @click="hideCookies(false)">
                    No estoy de acuerdo
                </button>
            </div>
        </div>
    </div>
</template>
