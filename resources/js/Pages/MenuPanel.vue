<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { onMounted, ref } from 'vue'
import MenuPanelInforme from "../Components/MenuPanelInforme.vue"
import Notificaciones from "../Components/Notificaciones.vue"
import MostrarUsuario from '../Components/MostrarUsuarios.vue';
import Sidebar from 'primevue/sidebar';
import Tabla from "../Components/Tabla.vue";

import 'flowbite';
onMounted(() => {
   initFlowbite();
});

// initialize components based on data attribute selectors


defineProps({
   canLogin: {
      type: Boolean,
   },
   canRegister: {
      type: Boolean,
   },
   laravelVersion: {
      type: String,
      required: true,
   },
   phpVersion: {
      type: String,
      required: true,
   },
});
let tabla = ref(false)
let informes_ = ref(false)
let Notificacions_ = ref(false)

function users() {
   console.log("entra")
   tabla.value = true;
   informes_.value = false;
   Notificacions_.value = false;
}
function informes() {
   console.log("entra")
   informes_.value = true;
   tabla.value = false;
   Notificacions_.value = false;
}

function Notificacions() {
   console.log("entra")
   informes_.value = false;
   Notificacions_.value = true;
   tabla.value = false;
}


const usuario = ref(null);
axios.get('/ticketsesion')
   .then(response => {
      usuario.value = response.data;
   })
   .catch(error => {
      console.error('Error al obtener el usuario:', error);
   });

function getUsers(callback) {
   axios.get('/users')
      .then(response => {
         callback(null, response.data.users);
      })
      .catch(error => {
         console.error('Error al obtener los usuarios:', error);
         callback(error, null);
      });
}

let tickets = ref();

function exampleUsage() {
   getUsers((error, users) => {
      if (error) {
         console.error('Error:', error);
      } else {
         tickets.value = users;
         console.log('Tickets obtenidos:', users);
      }
   });
}; exampleUsage();

const idTicketSeleccionado = ref(null);

function mensajes(event) {
   event.preventDefault();

   const descripcion = event.target.elements.descripcion.value;

   axios({
      method: 'post',
      url: '/mensajeinsert',
      data: {
         descripcion: descripcion,
         ticket_id: ticketIdSeleccionado,
      }
   })
      .then(function (response) {
         console.log(response);
         console.log('ID del elemento seleccionado:', ticket_id);
      })
      .catch(function (error) {
         if (error.response) {
            console.error('Error de respuesta:', error.response.data);
            console.error('Código de estado:', error.response.status);
         } else if (error.request) {
            console.error('Error de solicitud:', error.request);
         } else {
            console.error('Error:', error.message);
         }
         console.error('Configuración de la solicitud:', error.config);
      });
}

const mensaje = ref([]);
function getmensajes(ticketId) {
   return axios({
      method: 'post',
      url: '/mensajes',
      data: {
         ticket_id: ticketId,
      }
   })
      .then(function (response) {
         console.log(response);
         console.log('Mensajes recibidos:', response.data);

         mensaje.value = response.data.mensaje;

         return response.data;
      })
      .catch(function (error) {
         console.error('Error al obtener mensajes:', error);
         throw error;
      });
}


function guardarId(id) {
   console.log('ID del elemento seleccionado:', id);
   idTicketSeleccionado.value = id;
   console.log('ticket', idTicketSeleccionado.value);

   getmensajes(id)
      .then(function (data) {
         console.log('Mensajes recibidos:', data);
      })
      .catch(function (error) {
         console.error('Error al obtener mensajes:', error);
      });

   ticketIdSeleccionado = idTicketSeleccionado.value;
}

let ticketIdSeleccionado;

const admin = ref([]);
axios.get('/admin')
   .then(response => {
      admin.value = response.data;
      console.log("holaaaaasdas", admin.value);
   })
   .catch(error => {
      console.error('Error al obtener el usuario:', error);
   });
</script>


<template>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar"
      type="button"
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
      <span class="sr-only">Open sidebar</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
         <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
         </path>
      </svg>
   </button>

   <aside id="separator-sidebar"
      class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
      aria-label="Sidebar">



      <div class="h-full px-3 py-4 overflow-y-auto bg-header dark:bg-gray-800">
         <ul class="space-y-2 font-medium">
            <li>
               <a href="/"><img src="img/descarga.png" alt="logo" class="w-20 h-20 rounded-full"></a>
               <a href="#"
                  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white dark:hover:bg-gray-700 group">
                  <svg
                     class="w-5 h-5 mt-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path
                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                     <path
                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                  </svg>
                  <span class="ms-3 text-gray-50 mt-5">Dashboard</span>
               </a>
            </li>
            <li>
               <a href="#"
                  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                     <path
                        d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap text-gray-50" v-on:click="informes">Informes</span>
                  <span
                     class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
               </a>
            </li>
            <li>
               <a href="#"
                  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path
                        d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap text-gray-50" v-on:click="Notificacions">Notificacions</span>
                  <span
                     class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
               </a>
            </li>
            <li v-on:click="users">
               <a href="#"
                  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                     <path
                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap text-gray-50">Users</span>
               </a>
            </li>
            <li>

               <a href="#"
                  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 group">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                     <path
                        d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap text-gray-50">Products</span>
               </a>
            </li>
         </ul>
         <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li>
               <a href="#"
                  class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                     <path
                        d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z" />
                  </svg>
                  <span class="ms-3 text-gray-50">Documentation</span>
               </a>
            </li>
            <li>
               <a href="/apis" id="dropdownRightEndButton" data-dropdown-toggle="dropdownRightEnd"
                  data-dropdown-placement="right-end"
                  class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg  dark:hover:bg-gray-700 dark:text-white group">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                     <path
                        d="M21.7 12c0-1.4-1.3-2.7-3.4-3.5V8c.3-2.1-.2-3.6-1.3-4.2-1.3-.7-3-.2-4.8 1.2-1.8-1.4-3.5-2-4.7-1.2C6.4 4.4 5.9 5.9 6 8v.5c-2 .8-3.4 2-3.4 3.5 0 1.4 1.4 2.7 3.5 3.5L6 16c-.2 2.1.3 3.6 1.4 4.2.3.2.8.3 1.2.3a6 6 0 0 0 3.5-1.5 6 6 0 0 0 3.5 1.5c.5 0 .9 0 1.3-.3 1-.6 1.6-2.1 1.3-4.2v-.5c2-.8 3.4-2 3.4-3.5Zm-6-7.5.8.1c.7.5 1 1.6.9 3.3l-.1.3c-.8-.3-1.7-.4-2.6-.5-.5-.7-1-1.4-1.7-2 .7-.7 1.7-1.1 2.7-1.2Zm-8 8.7.6 1 .6 1c-.5 0-1-.2-1.6-.4l.5-1.6Zm-.4-4L9 8.8l-.6 1-.5 1-.5-1.6Zm1 2.8a19.3 19.3 0 0 1 2-3.4 19.9 19.9 0 0 1 3.9 0 19.6 19.6 0 0 1 2 3.4 19.3 19.3 0 0 1-2 3.4 20 20 0 0 1-4 0A20.2 20.2 0 0 1 8.4 12Zm7.8 2.3.5-1 .5 1.5-1.6.4.6-1Zm.5-3.5-.5-1-.6-1c.6 0 1 .2 1.6.4l-.5 1.6Zm-4.4-4.5 1.1 1.2a20.9 20.9 0 0 0-2.2 0l1.1-1.2ZM8 4.6c.2 0 .5-.2.7-.1 1 0 2 .5 2.8 1.2-.7.6-1.3 1.3-1.8 2a8 8 0 0 0-2.6.5v-.3c-.2-1.7.1-2.8.9-3.3ZM3.7 12c0-.9 1-1.8 2.7-2.5l.8 2.5-.8 2.5C4.7 13.8 3.7 13 3.7 12ZM8 19.4c-.8-.5-1-1.6-1-3.3l.1-.3c.9.3 1.7.4 2.6.5.5.7 1.1 1.4 1.8 2-1.5 1.1-2.8 1.5-3.5 1Zm3-3a20.3 20.3 0 0 0 2.4 0l-1.2 1.3-1.1-1.2Zm5.5 3c-.8.4-2.1 0-3.5-1l1.7-2c.9-.2 1.8-.3 2.6-.6v.3c.2 1.7-.1 2.8-.8 3.3Zm1.6-4.9c-.2-.9-.5-1.7-.9-2.5.4-.8.7-1.6.9-2.5 1.6.7 2.6 1.6 2.6 2.5 0 .9-1 1.8-2.6 2.5Z" />
                     <path d="M12.2 13.8a1.8 1.8 0 1 0-1.8-1.8 1.8 1.8 0 0 0 1.8 1.8Z" />
                  </svg>
                  <span class="ms-3 text-gray-50">Apis</span>
               </a>
            </li>
         </ul>
         <!-- Dropdown menu -->

         <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
            <li><a href="#"
                  class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg dark:hover:bg-gray-700 dark:text-white group">
                  <svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                     <path d="M18 0H6a2 2 0 0 0-2 2h14v12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                     <path d="M14 4H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM2 16v-6h12v6H2Z" />
                  </svg><span class="ms-3 text-gray-50">Upgrade to Pro</span></a></li>
            <li><a href="#"
                  class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg dark:hover:bg-gray-700 dark:text-white group"><svg
                     class="flex-shrink-0 w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 21">
                     <path
                        d="m5.4 2.736 3.429 3.429A5.046 5.046 0 0 1 10.134 6c.356.01.71.06 1.056.147l3.41-3.412c.136-.133.287-.248.45-.344A9.889 9.889 0 0 0 10.269 1c-1.87-.041-3.713.44-5.322 1.392a2.3 2.3 0 0 1 .454.344Zm11.45 1.54-.126-.127a.5.5 0 0 0-.706 0l-2.932 2.932c.029.023.049.054.078.077.236.194.454.41.65.645.034.038.078.067.11.107l2.927-2.927a.5.5 0 0 0 0-.707Zm-2.931 9.81c-.024.03-.057.052-.081.082a4.963 4.963 0 0 1-.633.639c-.041.036-.072.083-.115.117l2.927 2.927a.5.5 0 0 0 .707 0l.127-.127a.5.5 0 0 0 0-.707l-2.932-2.931Zm-1.442-4.763a3.036 3.036 0 0 0-1.383-1.1l-.012-.007a2.955 2.955 0 0 0-1-.213H10a2.964 2.964 0 0 0-2.122.893c-.285.29-.509.634-.657 1.013l-.01.016a2.96 2.96 0 0 0-.21 1 2.99 2.99 0 0 0 .489 1.716c.009.014.022.026.032.04a3.04 3.04 0 0 0 1.384 1.1l.012.007c.318.129.657.2 1 .213.392.015.784-.05 1.15-.192.012-.005.02-.013.033-.018a3.011 3.011 0 0 0 1.676-1.7v-.007a2.89 2.89 0 0 0 0-2.207 2.868 2.868 0 0 0-.27-.515c-.007-.012-.02-.025-.03-.039Zm6.137-3.373a2.53 2.53 0 0 1-.35.447L14.84 9.823c.112.428.166.869.16 1.311-.01.356-.06.709-.147 1.054l3.413 3.412c.132.134.249.283.347.444A9.88 9.88 0 0 0 20 11.269a9.912 9.912 0 0 0-1.386-5.319ZM14.6 19.264l-3.421-3.421c-.385.1-.781.152-1.18.157h-.134c-.356-.01-.71-.06-1.056-.147l-3.41 3.412a2.503 2.503 0 0 1-.443.347A9.884 9.884 0 0 0 9.732 21H10a9.9 9.9 0 0 0 5.044-1.388 2.519 2.519 0 0 1-.444-.348ZM1.735 15.6l3.426-3.426a4.608 4.608 0 0 1-.013-2.367L1.735 6.4a2.507 2.507 0 0 1-.35-.447 9.889 9.889 0 0 0 0 10.1c.1-.164.217-.316.35-.453Zm5.101-.758a4.957 4.957 0 0 1-.651-.645c-.033-.038-.077-.067-.11-.107L3.15 17.017a.5.5 0 0 0 0 .707l.127.127a.5.5 0 0 0 .706 0l2.932-2.933c-.03-.018-.05-.053-.078-.076ZM6.08 7.914c.03-.037.07-.063.1-.1.183-.22.384-.423.6-.609.047-.04.082-.092.129-.13L3.983 4.149a.5.5 0 0 0-.707 0l-.127.127a.5.5 0 0 0 0 .707L6.08 7.914Z">
                     </path>
                  </svg><span class="ms-3 text-gray-50">Ajuda</span></a></li>
         </ul>
      </div>
   </aside>

   <div class="p-4 sm:ml-64">
      <AuthenticatedLayout>
      </AuthenticatedLayout>
      <div v-show="tabla">
         <Tabla />
      </div>

      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700" v-show="informes_">
         <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-4 mt-1">

         </div>
      </div>

      <!-- Tabla de notificaciones -->
      <div v-show="Notificacions_">

         <div class="container mx-auto max-w-4xl mt-20 shadow-2xl">
            <div class="flex">

               <!-- Lista de personas -->
               <div class="w-1/4 bg-white shadow p-4">
                  <div class="flex items-center border-b pb-4 mb-4">
                     <input type="text" class="border-2 border-gray-200 rounded-full px-2 py-1 w-full"
                        placeholder="Buscar">
                     <i class="fa fa-search"></i>
                  </div>
                  <ul>
                     <!-- Admin -->
                     <div v-if="usuario.rol === 'admin'">
                        <div class="text-center border-2 rounded-xl" v-for="(item, index) in admin.admin" :key="index">
                           <button @click="guardarId(item.id)">
                              <p>{{ item.nombre }}</p>
                           </button>
                        </div>
                     </div>
                     <div v-else>
                        <div class="text-center border-2 rounded-xl" v-for="(item, index) in tickets" :key="index">
                           <button @click="guardarId(item.id)">
                              <p>{{ item.nombre }}</p>
                           </button>
                        </div>
                     </div>

                  </ul>
               </div>

               <!--Área de chat-->
               <div class=" w-3/4 bg-white shadow p-4 ml-4">
                  <div class="flex items-center justify-between border-b pb-4 mb-4">
                     <div class="flex items-center">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg"
                           alt="avatar" class="w-10 h-10 rounded-full mr-4">
                        <div>
                           <div>
                              <p v-if="usuario">Chat con {{ usuario.name }}</p>
                           </div>
                           <div class="text-sm">Ya hay 1 mensajes</div>
                        </div>
                     </div>
                     <i class="fa fa-star"></i>
                  </div>
                  <div class="chat-history">
                     <ul>
                        <div v-for="mensajeRecibido in mensaje" :key="mensaje.id">
                           <div v-if="mensajeRecibido.user_id === usuario.id">
                              <div class="border-2 rounded-md" style="text-align: right; background-color: turquoise;">
                                 {{ mensajeRecibido.descripcion }}
                              </div>
                           </div>
                           <div v-else>
                              <div class="border-2 rounded-md" style="text-align: left; background-color: lightgreen;">
                                 {{ mensajeRecibido.descripcion }}
                              </div>
                           </div>
                        </div>
                     </ul>
                  </div>


                  <!-- Botones del chat -->
                  <div class="chat-message mt-20">
                     <form @submit.prevent="mensajes">
                        <input name="descripcion" id="descripcion" placeholder="Escribe tu mensaje aquí" rows="1"
                           class="border border-gray-300 rounded-md p-2 w-full">
                        <div class="flex items-center justify-between mt-2">
                           <div>
                              <i class="fa fa-file-o mr-4"></i>
                              <i class="fa fa-file-image-o"></i>
                           </div>
                           <button
                              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Enviar</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>

<style>
#app {
   background-color: white !important;
}

.bg-dots-darker {
   background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
   .dark\:bg-dots-lighter {
      background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
   }
}
</style>

