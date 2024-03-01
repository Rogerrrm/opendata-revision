<template>
    <div
        class="flex items-center justify-center h-12 w-full sm:w-auto rounded-xl border-2 border-slate-100 shadow-xl dark:bg-gray-800">
        <!-- Imagen redonda pequeña -->
        <div class="hidden sm:block flex-none">
            <img src="img/campana.png" alt=""
                class="w-10 h-10 text-gray-800 dark:text-white rounded-full pi pi-bell p-overlay-badge">
        </div>

        <!-- Contenido de notificación -->
        <div class="flex items-center ml-4">
            <div class="text-center">
                <p>Notificacion 1 :/</p>
            </div>

            <!-- Botones de acción -->
            <div class="ml-4 flex items-center space-x-2">
                <img src="img/compartir.png" alt="imagen informes" class="w-5 h-5">
                <img src="img/eliminar.png" alt="imagen informes" class="w-5 h-5">
            </div>
        </div>
    </div>
</template>
