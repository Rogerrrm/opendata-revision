<template>
  <div class="flex justify-center h-auto" style="background-color: beige;">
    <div class="max-w-md p-3 my-8">
      <form class="registration-form rounded-lg flex flex-col p-16 border-gray-600"
        style="background: #274156 ;box-shadow: rgba(0.6, 0.6, 0.6, 0.6) 0px 30px 90px;">
        <img src="../../../public/img/candado.png" alt="Imagen" class="mx-auto mb-6 -mt-12" width="80" />
        <div class="form-group flex flex-col mb-6">
          <label for="text" class="text-3xl text-gray-200 mb-2">Recuperar contraseña</label>
        </div>
        <div class="form-group flex flex-col mb-6">
          <label for="text" class="text-lg text-gray-200 mb-2">Puedes recuperar la contraseña aquí</label>
        </div>
        <div class="form-group flex flex-col mb-6">
          <label for="email" class="text-gray-200 mb-2">Correo Electrónico</label>
          <input type="email" id="email" required placeholder="Posa el teu correu electronic"
            style="border: none; border-bottom: 1px solid #b0afaf; font-size: 14px; background: transparent; padding: 2px">
        </div>
        <div class="form-actions flex justify-center mt-8">
          <button type="submit" class="button bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-full"
            style="padding: 0.5rem 2rem;">Recuperar</button>
        </div>
      </form>
    </div>
  </div>
<slot /></template>