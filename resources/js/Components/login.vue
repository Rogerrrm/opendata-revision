<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});
const send = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>
<template>
    <Head title="Log in" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>
    <div class="flex flex-col p-10">
        <div class="container flex flex-row max-w-screen-lg mx-auto">

            <div class="left-section flex-1 flex justify-center items-center flex-col shadow-box p-6">
                <h2 class="text-6xl text-gray-300 mt-6">Log In</h2>
                <div class="w-full">
                    <form @submit.prevent="send" class="registration-form max-w-full rounded-4 p-10 flex flex-col w-full">

                        <div class="form-group flex flex-col mb-8">
                            <label for="email" class="text-gray-300 text-lg mb-2">Correu Electronic</label>
                            <input type="email" id="email" required placeholder="Posa el teu correu electronic"
                                class="input-field" v-model="form.email">
                        </div>

                        <div class="form-group flex flex-col mb-8">
                            <label for="password" class="text-gray-300 text-lg mb-2">Contrasenya</label>
                            <input type="password" class="input-field password1" v-model="form.password" name="pass"
                                placeholder="X X X X X X X X X">
                        </div>

                        <a href="http://localhost:8000/recuperarcontraseña"
                            class="text-slate-700 flex justify-center mb-4">Has olvidado tu contraseña?</a>

                        <div class="form-actions flex justify-center mt-4">
                            <button type="submit" class="button bg-slate-700 text-white p-2 w-3/5"
                                :disabled="form.processing">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="right-section flex-1 rounded-r-15 p-3">

                <div class="flex justify-end">
                    <div class="flex">
                        <button id="loginButton" class="header-button1 text-gray-300 mb-2">Login</button>
                        <button id="registerButton" class="header-button2 text-gray-300 mb-2">Register</button>
                    </div>
                </div>

                <div class="flex items-center justify-center flex-col">
                    <img src="../../../public/img/descarga.png" alt="Descripción de la imagen" class="w-20 mb-8">
                    <div>
                        <h2 class="title text-center text-3xl text-gray-300 mb-8">Bienvenido de nuevo</h2>
                    </div>
                    <img src="../../../public/img/image-removebg-preview.png" alt="Descripción de la imagen"
                        class="size-56 mb-8">
                </div>
            </div>
        </div>
    </div>

    <slot />
</template>
  


<style>
#app {
    background-color: beige;
}

.input-field {
    border: none;
    border-bottom: 1px solid #b0afaf;
    font-size: 12px;
    outline: none;
    background: transparent;
    padding: 2px 0;
    width: 100%;
}

.left-section {
    background-color: #E85454;
    border-radius: 15px 0px 0px 15px;
    box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.right-section {
    background-color: #274156;
    border-radius: 0px 15px 15px 0px;
    box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.header-button1 {
    background-color: #E85454;
    font-size: 14px;
    padding: 5px 15px 5px 15px;
    border-radius: 15px 0px 0px 15px;
    box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.header-button2 {
    background-color: #354D60;
    font-size: 14px;
    padding: 5px 5px 5px 5px;
    border-radius: 0px 15px 15px 0px;
    box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}


.radio-group input[type="radio"] {
    display: none;
}

.radio-group input[type="radio"]+label:before {
    content: '';
    display: inline-block;
    width: 15px;
    height: 15px;
    border: 2px solid #fff;
    border-radius: 50%;
    background-color: transparent;
}

.radio-group input[type="radio"]:checked+label:before {
    background-color: #E85454;
}
</style>