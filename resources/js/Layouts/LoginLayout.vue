<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="w-full flex sm:justify-center items-center min-h-screen pt-6 sm:pt-0 bg-gray-100">
        <div class="flex flex-row w-6/12 h-fit rounded-md shadow-[0px_0px_100px_50px_#00000024]">
            <div class="w-6/12 px-6 py-4 bg-red-500 overflow-hidden rounded-l-md">
                <slot />
            </div>
            <div class="w-6/12 px-6 py-4 bg-slate-700 overflow-hidden rounded-r-md">
                <div class="flex w-12/12 justify-end">
                    <button class="w-3/12 bg-slate-500 rounded-l-md p-1">Sign In</button>
                    <button class="w-3/12 bg-red-500 rounded-r-md p-1">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</template>
