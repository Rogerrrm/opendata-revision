<script setup>
import { Head, Link } from '@inertiajs/vue3';
import 'flowbite';
</script>

<template>
  <div class="flex flex-wrap justify-center items-center h-screen">
    <!-- Primera columna de imágenes -->
    <div v-for="i in 4" :key="i" class="text-center mx-8 mb-8">
      <div class="w-20 h-20 rounded-full overflow-hidden">
        <img src="img/descarga.png" alt="logo" class="w-full h-full object-cover">
      </div>
      <p class="mt-2">Nombre {{ i }}</p>
      <p>Rol {{ i }}</p>
    </div>
  
    <!-- Segunda columna de imágenes -->
    <div v-for="i in 4" :key="i + 4" class="text-center mx-8 mb-8">
      <div class="w-20 h-20 rounded-full overflow-hidden">
        <img src="img/descarga.png" alt="logo" class="w-full h-full object-cover">
      </div>
      <p class="mt-2">Nombre {{ i + 4 }}</p>
      <p>Rol {{ i + 4 }}</p>
    </div>
  </div>
  
</template>
<script>
</script>