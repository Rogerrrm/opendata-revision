<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Botones from './Botones.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  email: '',
  rol: '',
  nom_empre: '',
  tel: '',
  pass: '',
});
const send = () => {
  form.post(route('doregist.store'));
};
</script>
<template>
  <div class="flex flex-col p-9">
    <div class="container mb:grid mb:grid-cols-2 lg:flex flex-row max-w-screen-lg mx-auto ">

      <div class="right-section lg:flex-1 rounded-r-15 p-8 order-first md:order-2">
        <div class="header flex justify-between">
          <h2 class="title text-gray-200 mb-2">Register</h2>
          <div>
            <Botones />
          </div>
        </div>

        <form @submit.prevent="send" class="registration-form max-w-full rounded-4 flex flex-col p-7 ">
          <div class="form-group flex flex-col mb-6">
            <label for="fullName" class="text-gray-300 mb-2">Nom i Cognom</label>
            <input type="text" id="fullName" required placeholder="Posa el nom sencer" class="input-field"
              v-model="form.name" name="">
          </div>

          <div class="form-group flex flex-col mb-6">
            <label for="password" class="text-gray-300 mb-2">Contrasenya</label>
            <div class="password-toggle">
              <input type="password" class="input-field password1" name="pass" v-model="form.pass"
                placeholder="X X X X X X X X X">
            </div>
          </div>


          <div class="form-group flex flex-col mb-6">
            <label for="email" class="text-gray-300 mb-2">Correu Electronic</label>
            <input type="email" id="email" required placeholder="Posa el teu correu electronic" v-model="form.email"
              name="email" class="input-field">
          </div>

          <div class="radio-group flex justify-between w-80 max-w-400 mx-auto text-gray-300 mb-4">
            <input type="radio" id="radioOpcion1" name="radioGroup" v-model="form.rol" value="ciutada">
            <label for="radioOpcion1">Ciutadà</label>

            <input type="radio" id="radioOpcion2" name="radioGroup" v-model="form.rol" value="empresa">
            <label for="radioOpcion2">Empresa</label>
          </div>

          <div v-if="form.rol === 'empresa'">
            <div class="form-group flex flex-col mb-4">
              <label for="companyName" class="text-gray-300 mb-2">Nom de l'empresa</label>
              <input type="text" id="companyName" required v-model="form.nom_empre"
                placeholder="Posa el nom de la teva empresa" class="input-field">
            </div>

            <div class="form-group flex flex-col mb-4">
              <label for="phone" class="text-gray-300 mb-2">Telefon</label>
              <input type="tel" id="phone" required placeholder="Posa el numero de telefon de l'empresa"
                v-model="form.tel" name="tel" class="input-field">
            </div>
          </div>


          <div class="form-actions flex justify-center mt-4">
            <button type="submit" class="button bg-red-500 text-white w-3/5 p-2">Registrarse</button>
          </div>
        </form>
      </div>

      <div class="left-section flex-1 flex flex-col  p-8 order-last md:order-1">
        <img src="../../../public/img/descarga.png" alt="Descripción de la imagen" class="w-20 mb-8">
        <div>
          <h2 class="title text-center text-lg text-gray-100 mb-8" style="color: #250000;">Bienvenido al mundo de la
            información abierta</h2>
        </div>
        <img src="../../../public/img/image-removebg-preview.png" alt="Descripción de la imagen" class="size-60 mb-8">
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
  align-items: center;
  box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.header-button1 {
  background-color: #354D60;
  font-size: 14px;
  padding: 5px 15px 5px 15px;
  border-radius: 15px 0px 0px 15px;
  box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.header-button2 {
  background-color: #E85454;
  font-size: 14px;
  padding: 5px 5px 5px 5px;
  border-radius: 0px 15px 15px 0px;
  box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;
}

.right-section {
  background-color: #274156;
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

.button {
  border-radius: 10px;
}</style>
