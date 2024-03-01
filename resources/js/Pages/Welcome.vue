<script setup>
import { Head, Link } from '@inertiajs/vue3';
import 'flowbite';
import Nav from  '../Components/Nav.vue';
import Footer from "../Components/Footer.vue"
import Cookies from "../Components/modal_cookie.vue" 
import { onMounted,ref } from 'vue'
import { initFlowbite } from 'flowbite'
import { FilterMatchMode } from 'primevue/api';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
import Carousel from 'primevue/carousel';

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

const products = ref();

products.value = [
];
let customers = ref();
customers.value=[
  
{
    name: 'James Butt',
    country: {
        name: 'Algeria',
        code: 'dz'
    },
    status: 'unqualified',
    verified: true,
    activity: 17,
    representative:"2@d.com",
    balance: 70663
},
{
  name: 'James Butt',
    country: {
        name: 'Algeria',
        code: 'dz'
    },
    status: 'unqualified',
    verified: true,
    activity: 17,
    representative:"2@d.com",
    balance: 70663
}
]
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
    name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    'country.name': { value: null, matchMode: FilterMatchMode.STARTS_WITH },
    representative: { value: null, matchMode: FilterMatchMode.IN },
    status: { value: null, matchMode: FilterMatchMode.EQUALS },
    verified: { value: null, matchMode: FilterMatchMode.EQUALS }
});
const representatives = ref([
    { name: 'Amy Elsner', image: 'amyelsner.png' },
    { name: 'Anna Fali', image: 'annafali.png' },
    { name: 'Asiya Javayant', image: 'asiyajavayant.png' },
    { name: 'Bernardo Dominic', image: 'bernardodominic.png' },
    { name: 'Elwin Sharvill', image: 'elwinsharvill.png' },
    { name: 'Ioni Bowcher', image: 'ionibowcher.png' },
    { name: 'Ivan Magalhaes', image: 'ivanmagalhaes.png' },
    { name: 'Onyama Limba', image: 'onyamalimba.png' },
    { name: 'Stephen Shaw', image: 'stephenshaw.png' },
    { name: 'XuXue Feng', image: 'xuxuefeng.png' }
]);
const statuses = ref(['unqualified', 'qualified', 'new', 'negotiation', 'renewal', 'proposal']);
const loading = ref(true);



const getCustomers = (data) => {
    return [...(data || [])].map((d) => {
        d.date = new Date(d.date);

        return d;
    });
};
const formatDate = (value) => {
    return value.toLocaleDateString('en-US', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
};
const formatCurrency = (value) => {
    return value.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
};
const getSeverity = (status) => {
    switch (status) {
        case 'unqualified':
            return 'danger';

        case 'qualified':
            return 'success';

        case 'new':
            return 'info';

        case 'negotiation':
            return 'warning';

        case 'renewal':
            return null;
    }
}

</script>

<template>
    
    <div class="bg-bg_green">
    
    <Nav />
   


<!-- drawer init and show -->


<!-- drawer component -->
<div id="drawer-navigation"
      class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
      tabindex="-1" aria-labelledby="drawer-navigation-label">
      <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
      </h5>
      <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Cerrar menu</span>
      </button>
      <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
          <li>
            <a href=""
              class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m4 12 8-8 8 8M6 10.5V19c0 .6.4 1 1 1h3v-3c0-.6.4-1 1-1h2c.6 0 1 .4 1 1v3h3c.6 0 1-.4 1-1v-8.5" />
              </svg>
              <span class="ms-3">Inici</span>
            </a>
          </li>
          <li>
            <a href="/login"
              class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <svg
                class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
              </svg>
              <span class="flex-1 ms-3 whitespace-nowrap">Login</span>
            </a>
          </li>
          <li>         
          <a href="/registro"
              class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <svg
                class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                <path
                  d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                <path
                  d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
              </svg>
              <span class="flex-1 ms-3 whitespace-nowrap">Register</span>
            </a>
          </li>
          <li>
            <a href="/dashboard"
              class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 12c.3 0 .5 0 .8-.2.2 0 .4-.3.6-.5l.4-.7.2-.9c0 .6.2 1.2.6 1.6.4.4.9.7 1.4.7.5 0 1-.3 1.4-.7.4-.4.6-1 .6-1.6 0 .6.2 1.2.6 1.6.4.4.9.7 1.4.7.5 0 1-.3 1.4-.7.4-.4.6-1 .6-1.6a2.5 2.5 0 0 0 .6 1.6l.6.5a1.8 1.8 0 0 0 1.6 0l.6-.5.4-.7.2-.9c0-1-1.1-3.8-1.6-5a1 1 0 0 0-1-.7h-11a1 1 0 0 0-.9.6A29 29 0 0 0 4 9.7c0 .6.2 1.2.6 1.6.4.4.9.7 1.4.7Zm0 0c.3 0 .7 0 1-.3l.7-.7h.6c.2.3.5.6.8.7a1.8 1.8 0 0 0 1.8 0c.3-.1.6-.4.8-.7h.6c.2.3.5.6.8.7a1.8 1.8 0 0 0 1.8 0c.3-.1.6-.4.8-.7h.6c.2.3.5.6.8.7.2.2.6.3.9.3.4 0 .7-.1 1-.4M6 12a2 2 0 0 1-1.2-.5m.2.5v7c0 .6.4 1 1 1h2v-5h3v5h7c.6 0 1-.4 1-1v-7m-5 3v2h2v-2h-2Z" />
              </svg>
              <span class="flex-1 ms-3 whitespace-nowrap">Plans</span>
            </a>
          </li>
        </ul>
        <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
      </div>
</div>


    <div id="indicators-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96" style="height: 39rem;">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active" style="height: 700px;">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAABXFBMVEX///+4y9dEvZn62XJlma7X4upIZHljdYRFwZvK2OEAK0tCt5a/0Nv7/P362G8/vJeLm6cyiH0HQlcAMk/612oAGUMAKkrp7fDQ3eTm9vEAI0ak3ctvy6/z9fZNwJ6ttbwAHUKXpbAgSGIeXmXs7/G/yM5bd4oANlMlQ18AETxelatofo/c4eUwUGc8p42Qp7d3iJY8WW/623pAsZPK0dazvcX98Mr867ikucf+9+P//PMvgXk5nYj989X734vI6t8fto3Iz8AALlU2k4NTg5n73of867n75Jz856pFYXVgxqcQTF1BbYQALFUAADee2sfjyXDEs2s/VVwrdXMhWGVnb187Z34AACssSVmGhWMAGEuDrL1zd2DQ7eSypWkAIlCWnZLPxJiqq5dUZV/S0bLIzsFTZWm1qnSIinGE0rkAOE94mZ68rmmRnJ91e2kAACedlGHRxoPXv211g4D5ABt7AAAgAElEQVR4nO19i1fbSJqvgLFsC8sRlG0ZJUKWbLlkLNESSGkCJLAmL4c8SExnknQeu5udnoXpe2+29/8/59ZLT8tgjOl0n5nvnASMX6Wfvvp9z6riuH/Jv+SfRFT7e4/gjyfaX5vfewh/ONFb/vcewh9O/oXJuPwLk3H5FyZYRD1patKYBMHvPZo/hsjQSICSwiRoDMXff0B/BAkEGIKye//fv/zX/V32yGwZ/7TeigkUfO27j7dqtW9fXtdqj+7iPwctQ/5eQxKvKPMfgQmQptxdqlWXqr++O1laqta27nFa43tBIhYqV5b5K7QpGP+BEMGyRX5Uq/8JnO80ccTywgwyf/c7gKu/UUyoVD+D78YlzVkgWVgozHscP34evMeYVGs1oi/Vr/D1/Xl/yXQizgbJQmXOpHKvVj0hiDx4fPfpI4IKmkO7l7/xBqQzIyYL6nzH8YDMm9oDisK9RzUiT+f7JVPKHwSTezXCIU+iYf3X3/4Nyd/K04o8R70VK7NBUp7fELD8iDGpboUPZyC5yhxvUmE2TObsODwhtHr3OmOqzHE4Mw1g3maHsOpWSKmzjGi+t0ktNJOSN5nKqVc0C3PTU52n8vXNSbX6KBzQbJjM3T1IiJpFpXxzoankeETevHv9h8Yky7uTfdaOLl1Nxj9CJbL7aCsxd2b0mW42NpJT3zV5otjW+eoV5Lw38ZOIe1IN/dbZeH/OIGQkdaMusLq2tbJ8BdmrT/ykp8QWPwi/f5YYrDNfDMZkekxKi1NLaWUyJtRnqz0OH8t/M4mkovFcKNhzhZtOx11BT+aECfeI+vbMmd99Qn37J+kXyWPsP+cI4wKxU198EZ/MDZP7NHlS3Xp6/97dJ0v0wVgMmGH/OTvTF0nGFk42xXPEhHvy25vPVZxKCnMF77+ePB571bTsP2cR09+Lp+wk+ponJvaq8Gsqp/T+xS853ztHNZHLlbKdelRIPrqMyfIzkOWd+WFiw8HfaxQMiky19t8tflwRkqO6VrKP2bYQ12ZK82bKPVKZHyY2VEwUHOPJ89tXkqOu3eX0ljM2beemJ83UhxRSj2bMPc4XE99AkCBz83SpVvv24XWttvUjple9NcxMn7nxSWxaCezR7Ohws+ce54qJbwCT/rZ7/8d///IfP4ZFL73Fp0CZn92Jc2lyCgWbu0ae7RqYZCdExxG0+JHeSlyqpBQTiHTG/ZNZXbX4utOa8b0w6UvpzgG1m4AkU0OncaPaxPnFPPqv5OQhm1PMqczciUhV5b7L3JFhqwfdYJKBz+m1uHJMOEWIHH4mtb8hT6UZ97qY3JooWUzMlm9KRq9uSH7eDR3HZIZ8yhSaQo1LaM8pDKF7eg3Dk8Dk1tntCXJ2K4OJ66ARi7ZetFpWN7CzjDCOyQwjnMZ1kXG6PwYeTU879dxsspDA5NOkrz7IYgJd9kzHdz0BDF0/NY3GMZmhtDDvktz0IicwOZj0oiwmci/BqKqtda2W0dfi+oz+8k+NiT2LngS9DAMidTGUuicxF6UTZK9nhrnzO0bMGUnGgM/uTJBnGY51jZx7aGtFodfitdxOgpvh2BuSVFx8mdkJMbHc/A8TfWmoNAzXHDekY5H6ZfLduptmw8TumRM/T5Q111Egr9uZ+6wWrkL98ys/zSBJTNYnShoTvUesTKEzgQU7SF1gw3MnI/fHFopJidqdtQlyO82xfYO8FZmG5sReADvoN/q/21XMVzAmpdLR6V5palvcMUgAIy8UsDWpFCZ4+J3Wn7VX2LaOSkerCoDbU2Pit8ikaOIKlUjy8GU5Z/prynekyWuJbLSPlWFgC6PStHNHgiTyrFAHolyRCxWsLtlpxGbYn09EDQpegK7RFZan5Vh+iN+pMmuJ4xJRlXEWAFmLGJeOM8Fg/8FFNIcKHxC9t5W9KXIGGBMZ6uQN1KnqhI6E2MFxacy6bIb92cQc9pxo4H2wfGmqgGBiKiSYKS+UsQtSWIhUA2mOjBM7TfIXHf4J6SRwel7iVtq9vel8e9chhqZDWaQShyUF0hagskCFzrA/lQRGnU8rd/F8uhjQidKrIlGLyOdk8NC0l2zkdKr8kUUMvBZvZuyE3dAnvT6BiWKDZOZVRC47YxGRgUF5hs2wP7TIWgSBGCBmzSKCpGhMyq8mMGkEjWzgy4xOmbaPNCnBSM5NN5NcVzoSrLPbixCpezmIIEsh/OPy3KPQH+b4ZyJlF6wuLGdIZ9jukwfjL/695MIwUpWAMjr2yGs0o2dQHrk3tjygeD7J9MQcC2naUR4PXBm7UNtsAzIRn9Rq3w0UvXfRmhCz1d4u7Ssa8tBAfcgQeVLD/Xip7hBbuMxHQZjQcl8536PH7EJUMGjhAT2p4XaU77MKQRcgRJTmTgBG9NqlxdKppxstZmt2n1SrS7XHu49rKWVx4fLlmNCSUqHTJLZ4LF9AH/exVj6lHfiPvgcomtDdMaApKdYEUDRhv7Q8AglmpWsotmrVVGvVpc5saQXw+CNkzKfI5ixMCgCByxrwCSj35nu9U0gg8AuVHQ8C14H5/rQ6PD06Bklbc5/ewqWltKIUL1EUxLHE7WDeq7wg56uL3Qu4x7WoN2fr9wbFVHgcaPQbLoq7QD4oLhCSNW4ubMhLNG8S8VsXKwryT8gXhE0eZNGAmnbdsGg9+W6iY6m69PuC4isOhsRVsD1QPSEnkRMYCr/TSIapd7dCSGpPUrOdPx9XlBIVikkdK4SYiImpkHaBOF/Q9+7WlhJSrf2eoPgCgURSimQ4Kt8a80b7LT4oFFwhJpsfa5GWZMbqK9mSemlztCoA2D7CCUqWt0c8ggNANZFcrzSpLSZ/EeF/J/valpKLWG5efAtDsiA1uuwOqf1WepJwfUUqICnDWFF2IzX5MfuB/HFKUUrbbWC090aj48HqfinEhLlolbgGw+BhPON/+DWLye8Him0YO2hwP0A++pPYr6c0RaOQIEWBSUVB6kxGmrWTvpBSlG0D7m3jmbO8fzxYKSX6lFS5Wa5UkNEhKBQqakf2zR9+sLEV0r9sZSFBXzXeFnoTgiGpYEi8ZHDhKglQZMhTSAoVK6kotUc/kq7niYpSWlxeXlw+tjYZRKXFtnCUwEQ0dbffdX9A5IpUZKfPW0pDAEBpeG5QfDOmJrnfdQOiOhBDspOGBIHSiq9eAgsMk4ILYkW5exf7KLUa6cPjfC2u3DFFKe2fgherp4PNhNYcG8tR75aOIDAMCASjj6au02p40k6AZvGO3oUt4ZcTus64+nuD0jEAgQRE8Wz4U2qFpRXV6cohJmWYLrjcqz7dpa/uIRkyVEzHwjCMvhzvrbQHowQkpU1h74hiYlsN7+FfkGw89AC0AK8XErLgwi8fT6rVB7uPamlQbnphrToUECQLOzDaEkCNmnS0Vp/+5is78VjdTJhPEEGWyvU5WzcATnj4Q2EV6UnpaDBCNnhxO22C2sZpi+DWMAgiRDbeQvhDIS1NF6z+inz63QcZUDIrEuYNSRFIGBIjsSWAHINSLxKbIBmVeKRJ0xOJizyajm1zsmPYfrGxurKNVeP0OM9jOzo1GsiqNaGx8ZeEPHSAt5NBZWEI/g9HVmf8fqCEkDgwmc+SozW6WoOAwg+TA3UVmTPTPVE2kJBP1xJczoYeOF5ZJu7ZtjFaZKuYqM8W2aG2YKuelYIEo2KA7kIGFEuR8kB5cHMRYb+RgaRD+KAT9W1oDdyra/ST4ywLRb6X1hUdynKL93V0Ad1zhMjm0creqN2Gq8fH5+fHSNrt0WjlaJ9gg0BZBpIEoomz8fAhhWfjOQq3Upi4sNsisVEWlBsLk/stF3vTXiOKb8o0HapWQucyEBy1A6XkOHcMxdDS0Zo75PQe+pNrIXhOV7+06vWBxfMuEl3D//O8A+utVgscj1b2kRYdu/2G85BpR0NRwgcbbwWYYNoK7Mp9mtvLgHJTuQO3hbVkwUlGN00afYiVcEWqDw0TJua57rScsWiIYKKSSqYOupJm5qYbZFPT+85AaayOzvtoroG3SD2eNzzNtnUHPA9pRXCir+MtRGQ8tf4/ZkC5kTBZavQxJHwjdYkFxrDlGBQIghgRxdPG07A6tGWFNyXk53Uv2R9LVH3d9QBwJLNrGM8fCq7IIXJW+9FcQrTCU1rZaWAFrRi/kMt/fPOgSEIXBzldJYxs1DLxTEKz0wzjVdtoULPT3PEUXstL2hKOdRrIItnCNBUZ1daKjuI4FoQeZ/MAFDuqZ0T88vwcumX0hY5TJjei8Xdy+XczoCzNe6sYnUES12NCEgnNTqgxXKAQTHaGipObqueCIgABulAZ2+Js9WHSblQd33WwCnJDQ9OEIpp0sR3a8IDxQ0FvUWppeu+2ckGpzldT/BbJDvRbidsqMlBCsyOz7lINotu1k8cjRMxhz9C6vb4pN3UoEAtmI+ZgTVcugBAOvfy3+n0g+zjBpDc6diP24AjzekYYZOnKa5o6uVvN+Pnz1RSpwS9UuhEk9EZmzA4DJ4DlHSNVFk5I4PQMfMEasiuKUMRaov8VefnAoHPS13VdcvsUk35jqAdJ/tWUjo9rfUGrYytJTCitMFexbHyt0izB/Swo+bkDfcaGL13g+0qkJeVKkkTEMlm/ghtSO/hyDWU4CRHEuex3X+rTeWjr5ljzPBVTKhqtBogdRLtuioZjmpDnNCHrwz2HsF+mbsqLKgPl3tblEWHgCN0rghGKBjDnM0mQCP4hJjTGN4S8IigpBrY82nhCWuYhKOa8KvMeVQ4kqilYpVSD53yv1RraIm/8JSsoCDKkJqayL6+rLHVyKSh2seEYs7YjBI1+4kpltlI2JJEm7QARK30lvwiKC8YhIohbW0ZXm6Ad+dKxikEHTRoJkTN6oys4WT2Jg6By61s1XLE/BkoqTJYlCJ//5a13hYEkxIzvKgFjgtlxFTf3Sk2vlcBK1c2rVrtFyVKg67utoimqJt/o4ovJQcVABrJgkC3bKCi7F4CiW8QRfDu+znQqiU2OHPmuBBSVmZ0C1hipTl9l68hNj3kg8MLmpHyXlZP9QEPcGoquBf64FvkSeOlqECdeDJOTi61E8iBJK8D1fkpcfiZ3EBeTTUOhMcJbZ7YOalGqh+zMSCRrdpDG+NQFE92W4nmgztY+Bw4rGKs6fJnNHNim3jWUVr2nQGNIN78ZOlDpoXAH8lKQWdIV+DhBx5Yc+EMlQuXhW8N4+zCkFfhLSieSwU+UOLD56N3PZ94zU2/1QzpYyJodBg5PP7zfcNErVQ0g/MXAYQVjGWl/0U/cfbwIxwAtY+jqgS+raryBqKqqzUB3kfPasHjJHxtx2OKHTIaHaWXDEJxi0QDeBptAv6QRiEEJy22yC61o7j2cVN+9XDQlXLWbIZEQlA5VEw05u7aOpo7fkswhsssEh44jFBNfLZuup8Chq9mdiYordpDV4a2WUdRSjbA2CCv3HcyRGxuGgdkbqaFDL9L5mlGLrQgSmufTLfg25uiHcPbl+gEYhmNhoNgpjWnSIqZT5HwBQkHnJCBEzCpqMb+oQR8qRj+Y6vbIvuQIQlGPWVl0IZDYQ7sLDAe5ML6LcNJYuGz834hXSeokqqzTHozAC5MNDBNwjZ4vM9oBOkEitNaCNSao47/ZQsA5ntzpC3IzN8TzXViHkn8Vrrd1p9Xqx46g7CowdP50BBAntYDQMrk+JBcJ9McxKA92H6cgsbuNDDk/nFDxnnJssMVAyZodpDFcgJMinNmy1R5yzuWWqZJW306QmB2IA3rAneG+yLrRg3pELXb3/4UXojVsG/dZ8I4YCPhqHyJ9vR/VNKLqRhUX22S3NWbEN66FCWIFhb1fHDc7tFEIRWkiTkzrik/6FTUAoiuRdas1HFu4N62YfaUR9wBFv2gN1cffHICOTyLD5y00se4vZWpgOC5GlAOes8xlAhOo5X/hlNIZgjBobVJQYnB2cIKdEw0Xb6LQRQG9pshyvx5Ra0eyGv0rzZms2C4KarIshL6F5GGKhmoSTBzil95Lg4IhCTzgsWmz8fPPGzEm1+yrVXkhzKFkzI5aIXULkYc+pw+HkirCYmBEra2qbjSK125gRRYduAnjjCC2WzrXF4q8onMuJPTwLS8AvF/ghZhINmQ11pPr9xrH8XEhk2TrOh1OM6DlkEuXhw3T8MK7GnhKdy4tvbIkQD1Uts5fux2uC1VRH/IB58O32C2FJzQpkHTrq3ddIUkkGzvcTqQoxvVXh7m98DMSZgf/8AXXeFnUDaXO63pfaflc6KHLfM+bW5OzXIzXMWgK9DstWpY0rQG67IfgY5XFv7uPIqL9BoW3IRwUi44YYeLMmixIiN4LY2Q1nWTzWkXbB46teRB6Umxu9Po1aSwj/rDeZRPI9hTdNuqe6xrKu9cfv1iGgYvpxK2/F/lq7194EQIyUZCkongzBsYpQS4tu+C0o2L7uNVNxmnV1BUo/dmirIki6hAyrlfduivqRcdx++B99bevX75VmQcbtwF9S9aa1Q79pdOJMHHmMabYpUWOCvmtQ5fQmAJDK97NUwfOtex/vqAYzmW+rC7h7BP6WunF++rSSeTWRz2Ff096JBsLXFZR3oK5DMmMWgvEcmILVhN4rIE3JOJOV+nfzEojXRijKOnL+2p1aYvt5xdC8j+Z9JMq0z+IBfaHt3A+I/Jh1G5DzY7qo6gD0A57rhu2/flGttdtfuIbSra50P3w7dub81+SrW21/4nMb3kjpSgLHPNRnoM5LeiQjWjHkYUfCjbfailAoNkZle+xya4pN3meh9p/mbWi/RewvXf84Vs11JJapCUbTe5npiiUSTY4OcRk5kHargO9OD7tDGnp2PcEwQKre5srwKFtmXydQeK25k2uGdF7PLscn11XFxyVSm3rp/e/0l6u3+I58zPXDBWFKMhGhSnKQ2FWPyGA5+1RWzB8vEYEX6paxM68bR0f7bdPt0uLpyw3I+oUErHbuPHFaBGvyaxRSOXhfmnz+HT1hfV+q1o9SbJrU2SKIhaogjCQZsbEb7S3S6XFzWPHdHnLwwkNETOpdL6JO2pKi+3M0rMO37gxKkkMyzDo19oskWE7q9ul5eXtzfbgl5NH/9jAWFAINn7mKvQXpiAbO9TybDRmW9IvdleXSXPi5rmCpuzoWIAmzrxKwzZtAd/LEJ7sKTdggsfFdthdts9pL6YPTumIjuCbf6TmyEaBYyoTziIWI8+ISafFGntL7T3SbLV9ijdMkARwukwGMEinnzvOZIXsmEEQ0FZQUWbCimFyLCp5RE27mHhNVuQhI3tfoI6AWaetk6V98DYNwc/cAv2lHNItxQTMptC+sh+vD1jeXxm1VyHoSh5sr2BMtiFPxxNub2RMTHLKfENoNNA/TI92TxEEBUsDJwGMFvo7eajUNY6vNxR2mS8VQXk5YeTikK0/N7vMX6wfUVBGtE0lT1EWYqflOVRm0xO7tc/0ZHm/fQ7Au58+vv/p6+pgcEy6Fhm/morLILEmaQlCC3jFYtED0OhwHakIIXpU5CE+YEl3DTjED4tDdO8017DoIj8bgc9PTM+Jw0ymjIe073g7DIW5QlpREvLQSCXPryIqJApZWl45FjxXGnwjfuLJb9++QuOoNKJm2Taoz6YOJ6d9JQA1XLdQAwtgs2QKjQ5uO/ENnEAkG1viDhSTdP8YlsWMmXvBUuS1jmekvk+2yIReXD51Mq6JLGYQ8QRv5sQfJyl4kcTmqeDtlGX3/ITt61td+jxY2aTqIfKU+sXiZHoVYdQxi9ARCSZM44GDS8msX84mC6IMaLG1DhMxEV8dHiCiTfuGAVt6ObIyrklaUTbeQku/hgelDoW97RXBIt1A8GPkPVffw81Vg3ywy6CQ6hPvKSc3Iu71hYbM9IReB0xgwpENowwoWZQAJ2Ei3jl8hV9tpIu+LiBTvW2ErglTlA25kiQSwb2emy26APEibQXC3QxYSbAL/a49qlMyeUldNA3Xlm/fzv8UW4gWOtFfJ2FCxBB8HQh43JMwuXNIttrpFBs0MYTTwRxu+l/Fc+fYY5j8zJWZ3Y0geWi0utc/Iq4vsB5d/g1Rkc9fgXD+1RoBOhtU2uNoArxG/uzWWu5n5GGSmjtQwicZqCEmJueRloYJmJxRSDQAXVbll6gR8ZW9UmmT1DaYomSIxGlM6KW6krgC6wau4AaP6tLXF0NJci246iXVFjnZON2zditfUfIwkUVVVE3CsQgTgIxx+BqMid/A1JKPye1D8i2ugkyHS5uZRd4ieuc2thfbUUd6qCgbz9/iWjvu39GvU0FgEihhJ7f0BTPs1wGZ6HI/Xe3jDX+I1fjOs2kxgUOe5z1ADjtEmPCu2w+nOcYEcQMi0FxMPh2e4R8oxBCxRWbOPW2VUZG3DRLJpDImkucWPF4FznMDXpNIqMggbCxsOl+Rmnz+oHFmceiqCIVE+kFHMbGLczSvbuXehxxMLCIOKWeN8QnCRLWQBuVhsra+jn+4jNJtSClFp3v+ofn0NkLkuQMt5/lz2N5cXj4yAD+fsyb7gtWnbdzBF3wcw1cD+RBGHzmadmJXNBsvbdLwop2Dw9z9XpopTJoYE8FWO52wZSEHEy4AwMzD5OwQc5beC/VUY+B4tEHNiZa3PLSE49HoVBBOyUrUzQF7x+79a7WH+q2+C1tQWigUuhDx68m5znk8/rsmei6Ch3omDnY5bOxrrx3m7r2mKlEhMQCKmuBYIjEmkhZhwhWBURTGMDkgVthMrLpzaTlbpB/oR135wvEmCdHa+8znN8RdfObINbfA6MNmobnTFcBQsnC72Am6NLICErEJ3+UcukWJRDwUFSvO2vqr3A8assgIFwxxDWESJmSbQoaJjHw3MIbJs2ciDhUSDI8eJF9QhNRRM2hIHy+UWvnygNXWt7IfegWxISXYiutBiJ2Tk3cu1zV8VW+ZqqFr1FvzqVVWcTVHvHMn95PMBuwGtm0HXRx6ibIGBD9quen4DtBtLPijVNkAtGNfA+OYHBBFdFNRhJncjRgNmhDKc2E/vai7tAejYvI1Gs41IVxTVfaIc1L9KCCPGhhIc82GCWhelDVvEUy4CZggPwSQuBjgcMdWBAgb0Vo6HkJIw2QFYdLHnebEtRe7YGzurGM1ya5iKKa2I+sTRfFWM+vcl+FPUQb7Gsuyi160wGxAikrV119crqNJAVJsT6LzWGMx98WYcD4KfiE0SI+N3O1jCS/E7ceicxL+QdnC7nYz8fwnoiZ8ZhWDnNojwcYF0Q0Db8WyHK51L5WW21+iM4+rsy8rlY1olVmfhX/V9x/IpQQocqXraMWQKS7BZD5yZx2rSS+rPRJNMMn09iBF2fiH0y5tjl6Q5FvpyBq1By8+x9Ha7IRig3CNWdP6GFUcoWA4sD60OY3cZz1MyKrY8RSfnc38dVPIGvFg+zAb1eL+c/xjSLbDtOvvq7WfjtsDONpmWaY3b96fJGpitZlH4DdCOtFfvI707rd3lutG7dGdSG079QvszpzkNvZNOsp4YSCgdB/Q3Fv33cnnd/B4j82cZeMnGrrWaksPHhBMZvZQzIhi+TfRXgnV16kcrKSETEk2j5vgn8xLDvDM1Ovj/qg6JBVxkTpupvJu8Mu700XGsiN0R2u16tYDfC7NbtyBPovoVrg45sv7eC7+lNi2Avn+EUC6oGIOnLhv4bxE5POaJJiiaD0yk613r5d+fXG6TdLIo8H7pa2nd+/h/sf7j+lJvzOvyA7CbRlo+EchOYHJ1Saxmog8vlO3JyQLZpa122dnNNb+9OrsFVbCDtucSCxXCihqKNPWBpG1TtDcny6cVKufXwzaKysjqEjk2KJ7+Oz0WniM3qzj8cO5Y3yNitPVbzTOCegqr7gByia1rrP11CfYZijxORc+eSzGv4Yih69POBtnh4e3bh0ufiK/LR6S35iZq6hcoVKWuQ7tZA5oDBiQ0cngfa1aO3nvKD3LLeATnR5gOAil0FMoZ1167DfoAtmdLwkz9o74Bn6dqmoj8icl7DetZcyO3gMQCFiA1aeoiJ4CAKRZjyF5jr4EkDV/5PUxX50dniEQDhZvHdw5PFvjxNuZcyUSXUCikdTf7psHTx4jb5VEOFtLIR5bT368d/9aXptt0XRSfxCryW9fyIhd4ruKXrRtjurhIa1ltt+WtS40JMmVXB4C1rfjS5Zh0N1AeOhKkmRAHr2iiGGSNQ86MDK1tw+pFfu0foslq9ZuPZuUFNJbCZ4jhL97/+mDrWoIx4Ond7Fy7N4lmMzqtYlelzCslcxNE+9IpNTqx2Ujn1Qax+lEAmwHbR2GdTcfFHUgiAQT/Ngg1Y2AaJ7oWAEMA0LxWTgTDw5DV/D2RMOm1hMmumP875NHVaYeS1tIZyilPHmwRLcymjk0dq0yWc/8Ou52geQSgzqZM914n1KdWKPxNFuECcez8IhzG5IKSO5gSI4ISWLig6HIh7aMemhEPoVYry1OdAq7yVVK7jvskSBMHj29jyM+RClPtihGdGfBmQmFbPTCx5sWIS4nN6NPagidxDYnPJ5Fa7fGPLYYExcwG4rzS0UCEF2xQjERSZjcb0g4HKZQ5zk74vpETExWLKVb7bZeI/a4SwJgTCmUYsn5tcQaz7yPm+p5UfhHHMGln6gnT+sXWmIGk6xKTpYtxqTPMDEbiFgCEHdOUUzoF+LeMFVh1jahJ5FcoCccNYI28VTQ5MEP7t2nBpjgUaWUsrt1Pa9N2WHVv+rSb5+/vX4NBfJ3aok9PuI7WsB7tT7mnYxjQvKJaiPeAjGBSSDgHfF4tjQz5pNYJvMJM33hfvd9495jbHHIbKlVHxEzxBEzdD2vDcVWTeMnerKnMLBenCd3j+okCn8mUZln40HxGCYqJNWsYrwkNYFJn+RfA8BqnrfHFGVt8dnkqqZPLTw9yEhTTqh6IJ/+KXHaIjNEtH72zVECpTv4tbpU/RUYmi37LkisVNYScUdALnScTsYxMQUjQOJCK3TNYrphndUAAAwdSURBVExEAHT0nG6FJupOBpS19clnbWA7SXAOiNMk1z8jnxVTCrE4j588YgwbLhOcPdfGgzcnyKEHQ5WzfbyqKzZ4/UQjso49uTxOHMPEhRD3mghxWjHGxBRIvk2A0XaBzw6TMK89uzjEdEkFu0OSc6L3Ez2KdPfu0wfVyIlFZmj3XvVaoTFnD1D4V/0IZZXv9RSNk+rh7RWTCUDJmxAAZu1Ox4BFspzYiK47xsSFQ/IcHy234+4kQFlbzyHdpPjUeSKRF6437aKQrxZZHGaGdu/9WL1Krg3vT5L8iSYIDv+qL3D5SfOLwFZ7OkfbqfzkwVIS9g0ODscDwKR/gotTptAQ2RPhYtYIE9Vi3pof+Xe4gyA0NHTiyBeU8tj+/xqpgmkffqtWY5+eqAU2QyytNKXXZruOZRV9zu97ljWkizT7ODd98kFTMZvbUOegJNJtKvR6wst2PYLJOP9FmASQTJY+YOphw3DyRJgEgsA+cgijeSmeMVA+US7pMm5W8Y7DIvZwyH9084AifRv5FPvDZ4wH9umpekRmqDa912Zb56Oj0arVB6ujlb02IF1Axkf89g+a6PVxMlLjgCRT36iYXNfgOrmYqH4fGhoWRCPI6bW1sGYr+g508Nryjo+CH7zyXDZ51vYq2l0I9bDLAAeCIrY4lF77tLIjlwtlVS3LZVktF5oFsUDa/6Vk1Wjw8fXrpxGlMCeWpJaekskzDclaq7hutnwqjEiL4+Yq3pKtjh226sDlJEUKeCh3elpAeu47qbVjUj4m+ssGALSZDw5tTn6poPiX+MD6SwEILUUUvZ4AGi+RyjjoF+GvJOju4XfFR0RiUNYWGb3qxE6rCAIRQcFxBXzabqFJZ5SfPGuTB4MX1g+xT49TbdQM7damDI0DhRaJtsP2z+VVNCE+EEzeD2zOJbsouHVVIhdlp469cfP5xNZCCciKBfpr4hlONMlPvAKU/EJiBvpcTByvDp+tY/4++ITjjQvan1UlUf2Szvf3218+hhbnQWSG6IaZ03ht7ipL6Ya1otI+CnsJJksn50irRRknOHQa2qCoJJkVDbCr/unGkrGvDknAfWcd89AFba1khkdjUpC+7335FTmxjFLu/0itMnVQpsi1uendKDEyx31u8J429a9CybZNXulzKvWdXSv55qAl58cnc5IDooGvbmFLG6/jEyOe5VQ6bV3C6CJZ+OQP9tFlGP+L1QP79I8y+8yObX08LrqQ3LB0f2Vzu9QedpRfWBr2I0TTHVucDt0gq5jae4dq9K0bLe4wB0iKUk4dwrPNQllGFNskJKuz42zxEGW8aW9p5GH1iHz6hEzhtdnCKJo2uEw0MNrHXgAGtKJYPRmMVmhCmmy7r3qprnJ69tYNFwE5FQcP0fldKqJYlRxo3sQUi3dm5kx6ngf1tsEIY/JmqzaOB8Fkit2IdaW9v73ZZpvxb+6Pji0gWKzyXP022D5KUEh2WpM4/fbinLP2WTlbxHHpBee8sRNKaWLHwSVjYL0/GUeEsO40nqxmCcKLQbjHeqm0L2j91ZUXhGW33pyW9hLH/9gZ+id7ON54dYckaFzlglfQUjJPNuHvnmISGA1gasN3FvbcvcQ9UU2p7yJ76EPraB9NIYrJ9upQdE9LbZxTqr5+cVRq87H/4We2V9Zw7nFt8UYroxxlLP+C02o5ugsBcauR1SCb0W6esvnP4KCZlEvEdAarp8eC5Xq422lvgJcxlRb3V5Ejy7dLy+3Bx63qR2O51C7G3rwG05jQHPWEtsf5yStkk9NVi4xQY6xDslngKi2hbxtvluLc/VR5E61xvL+9uLw5AudkYcMetNq4Nw56qughmloeDd58ezfCu9zil9PwUMosg1QdQijXLQOKYnzQpppTtSDmXlImr/jsknMabNwmipwmaklLR19ebz1imZSpxBdYsbm0Qum1tDkyLOt05UjQOIwJct6OB2BzsbRKMKH8JWW38urjP0zqGZ5K1g5un91Zv3XI5Nb6s7NXt7MY43a28f6TWNxEo5sJQu8C/O+/2YWCHcklIxH51cgARx4slVNeHdK1KqX9I/Q/jV8p7XeJe4I8BKQiTVyyNUmoMevkWTs4W0Q4rN95dRDJq7NnGJqzg6S+kH42z5uYgJSMBOcNNtn1nAqthCiXrba2haOck3AIJiuWzYd78ZdCTDr0FNAudvALZU6u2BVRrcgoJsRY3c5JoVwqnzAez14d5Lx17eAVAuYsYc7W70TlpU653OTEcrmcAE2DuZh4PySEv+wg2wBsjiGyvH+0soJL8pKTOJ+gJGQxISduEf9axXk0MbfCc5kcPDtcPMvDI5S1V4uHdyJUMGWpFqkOISzkclnl1EqS+/MwOe9WFiqRdC/DRDvfHsNkfwANLNCw2jEm26T8wDAZjnG/TxoOzm5Nh0Qon+4cPosAEWXb1F3XLRZdV9J8OaTStdvruIROf8f2nlQtaI9F9nJyMCltKmSncSaXY2IK43qyuLm5jeQImP1EYJjCxBvbZYYW1K8YG7+6tR6+XiU7xwqW4Thd3nEM2GgYRd2mlyjevrXIXojbOWxhUnBMMVFJ4qoJKC0st62FhatgYoPsgUnRXNmzOjrMYqLS4Yxjwmkk1rgzXqeaLHdICg1/qlZstBq8btrhIWaq7Qeuo9QhwgU/XgtT+MSXnXgYLcWkSWIifNw4uY5Bt3IlTPChjvmYLK4WOa21nMGEnSSZgwntETqYXlHW1tlr/X695+h5m3N1TMmr9yDZYvcVbS5Q8eTRhAn2lGJik+70iE/ajZ2rYYL8k2XmnyQPfEGejmIiktiP/5Jsau7y459EG7nWJ3aIZGRtnTbYyF3FkC5wGdTABWQd8u1D8tF48rAzsMclF5PlgXslPsHp8tWjbbzUXwAJs1wiC6rVejyzSiCRgc3DhLYzH0yZWRLvUEiCKVZxynTR5AHpyLl9yOF92fJfSTHxSSkwwmRRuSomnO81zo9XG5ZejH2V0uYxKV5aoxglYQwTSv1i+B89yevZdIpyRvPwusJfULGJRC7Wkb9+cPhsjWKiKfmapUO61SL+TIZJCWn8D1fFBO+m7kqmzKlFZUT6JxeXVyxAYgY3Pp6tdJ5IXOCktNhsIu+gUC7L2E8okHUcHDY90ygKq49LSsaok4IaWeykprGS8JKdT7fWbz/DvrI8YSce6tubL0mCiZjU5aMR8K5md9Ii1ZXTvb29NhwIwmDgqlygRO4LiwHp4iyMCfJeVYIF9ie5QhNXuPDdm7R6NClrtwhh6q00V6tlu1wQy4VCWSw0C+XUnCJ7PCPzQ6Ycq5ePSZ8eU0qWQtJ4Z39Aj3OYGRNsFB0HCsdH29soUIa23IgIpXRKhkEHk80VUJEN2q50eV6W4ha0MjkzfG6mjA/l6OB0olpOPekSr5DhJOUHLcMExiRXUBpZO5VrYSIjN1LTWWYWc4rotCM9aZN70Cenopj5xlAnTUK3L8230fllK/xl7JoUlYdxkkDr5SYMkpU4Cc370ibkFxaug4lmgeNjAEIYSptA16J4qDQiuUd6AHk29xgOm7Qz5zUYpeXOIkcWJYfXpUY8LV6Akg1iLbDzs23JEz+7p8vL+6vWzrUwCRrt7eXlzdMwdCqVRtCH4QmyKE7GzEVnjQ3ydw8xyZFJl9Esfb4f7dVbIGTdJGTdLEx+n16P7oTYyyNZuZcYlnd+eiw4WUiuhonqkeimxCzN/sre6BQadEucRVIXpNvnknKxM2EnqSIxhmcX5wxIpGiG91REWIiErEn3fGHy5tmiFTMryBuA30uoL3T4rpRF5IqY2INkKmXzw4uBcQpcKVpsuE+8Q5s2ifATttWUydlm4uR+Z46l41jrzNVEb0UGOnf/V43sBC2SzVpV4FYq45BcDRO/kQqRNxFD7beaonfKMNk+xzdWpbsgpGujqWHj5z8dXpBIIWlbf5a9e+R4PROft/8rtUY+6UloNn7IQeSqeoI0IiN7AmaZ8M/HCcupwUmJYp5kBl+VJseCpF4ojR3XNI30o9x4LiZUewPSLmQqO5VcuQSTTjEp8LidkVW87REI/3xuxK8dQr6YLx4gmyO12xOeZ08Z1sTnL5Ah2ZYJi2XkPA0dMgJI/8fbROSIAcfel7w9cv67/unkBven/JPL/wfTmHIEbkRgUwAAAABJRU5ErkJggg==" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://wp.globaluniversitysystems.com/bsbi/wp-content/uploads/sites/2/2023/06/web-banner-barcelona.jpg?w=1854&h=1043&crop=1" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://a.travel-assets.com/findyours-php/viewfinder/images/res70/206000/206828-Girona.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>




        <section class="">
 
  <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

  <section class=" w-50" >
  <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6" style="">
      <div class="max-w-screen-md mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Diseñado y preparado para vostros </h2>
          <p class="text-gray-500 sm:text-xl dark:text-gray-400">Usamos tecnologia avanzada y informacion de OpenData para poder crear una aplicacion con unos servicios para nuestros clientes.</p>
      </div>
      <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
          <div class="bg-white p-5 text-center rounded-2" style="display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;">
              <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                  <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Marketing</h3>
              <p class="text-gray-500 dark:text-gray-400">Plan it, create it, launch it. Collaborate seamlessly with all  the organization and hit your marketing goals every month with our marketing plan.</p>
          </div>
          <div class="text-center bg-white" style="display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;">
              <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                  <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path></svg>
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Legal</h3>
              <p class="text-gray-500 dark:text-gray-400">Protect your organization, devices and stay compliant with our structured workflows and custom permissions made for you.</p>
          </div>
          <div class="text-center bg-white" style="display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;">
              <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                  <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>                    
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Business Automation</h3>
              <p class="text-gray-500 dark:text-gray-400">Auto-assign tasks, send Slack messages, and much more. Now power up with hundreds of new templates to help you get started.</p>
          </div>
    
      </div>
  </div>
</section>
<!-- segundo -->
<section class=" w-50" >
  <div class="py-8 px-4  mx-auto max-w-screen-xl sm:py-16 lg:px-6" style="">
      
      <div class="space-y-8 md:grid md:grid-cols-3 lg:grid-cols-3 md:gap-12 md:space-y-0" >
         
        
          <div class="text-center " style="display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;">

          </div>
          <div class="text-center bg-white p-2 px-4" style="display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
    align-items: center;
    padding: 40px;">
              <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                  <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>                    
              </div>
              <h3 class="mb-2 text-xl font-bold dark:text-white">Business Automation</h3>
              <p class="text-gray-500 dark:text-gray-400">Auto-assign tasks, send Slack messages, and much more. Now power up with hundreds of new templates to help you get started.</p>
          </div>
          <div class="text-center" >
              
          </div>
      </div>
  </div>
</section>
<!-- como trabajsmo -->
</section>
<hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700" style="margin-top:100px;">
<!-- planes -->
<section>
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Nuestros planes para las empresas</h2>
          <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Nuestros servicios son los mas demandados y con una calidad notable en nustra calidad para nuestos clients ya seas una empresa o 
            un ciudadano.</p>
      </div>
      <div class="space-y-8 lg:grid lg:grid-cols-2 sm:gap-6 xl:gap-10 lg:space-y-0">
          <!-- Pricing Card -->
          <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
              <h3 class="mb-4 text-2xl font-semibold">Ciudadano</h3>
              <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Te interesa poder ver la informacion sobre zonas para tu proxima vivinda o ayudas que podrias disponer? este es tu plan.</p>
              <div class="flex justify-center items-baseline my-8">
                  <span class="mr-2 text-5xl font-extrabold">0€</span>
                  <span class="text-gray-500 dark:text-gray-400">/mes</span>
              </div>
              <!-- List -->
              <ul role="list" class="mb-8 space-y-4 text-left">
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Configuracion individual </span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Consultas nuestras bases de datos</span>
                  </li>
                 
                 
                  
              </ul>
              <a href="#" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900 getstart">Ver plan</a>
          </div>
          <!-- Pricing Card -->
          <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
              <h3 class="mb-4 text-2xl font-semibold">Empresas</h3>
              <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Todos nuestros servicios enfocados para una empresa podras compartir tus informes con otras empresas.</p>
              <div class="flex justify-center items-baseline my-8">
                  <span class="mr-2 text-5xl font-extrabold">60€</span>
                  <span class="text-gray-500 dark:text-gray-400">/mes</span>
              </div>
              <!-- List -->
              <ul role="list" class="mb-8 space-y-4 text-left">
              
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Consulta a nuestra bases de datos</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Cuentas: <span class="font-semibold">40 usuarios</span></span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Duracion del plan: <span class="font-semibold">6 meses</span></span>
                  </li>
                  
              </ul>
              <a href="#" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900 getstart">Ver plan</a>
          </div>
        
      </div>
  </div>
</section>
<section id="works" class="relative bg-gray-900 py-10 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl text-white font-extrabold mx-auto md:text-6xl lg:text-5xl">Como trabajamos?</h2>
            <p class="max-w-2xl mx-auto mt-4 text-base text-gray-400 leading-relaxed md:text-2xl">
                Usamos datos abiertos APIs publicas para dar nuestro servicio
            </p>
        </div>
        <div class="relative mt-12 lg:mt-20">
            
            <div class="relative grid grid-cols-1 text-center gap-y-12 md:grid-cols-3 gap-x-12">
                <div>
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-gray-200 rounded-full shadow">
                        <span class="text-xl font-semibold text-gray-700">1</span>
                    </div>
                    <h3 class="mt-6 text-xl  text-white font-semibold leading-tight md:mt-10">Seleccionamos las mejores APIs </h3>
                    <p class="mt-4 text-base text-gray-400 md:text-lg">
                        Las mejores APIs para poder brindar un servicio de alta calidad
                    </p>
                </div>
                <div>
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-gray-200 rounded-full shadow">
                        <span class="text-xl font-semibold text-gray-700">2</span>
                    </div>
                    <h3 class="mt-6 text-xl text-white font-semibold leading-tight md:mt-10">Solo con un registro</h3>
                    <p class="mt-4 text-base text-gray-400 md:text-lg">
                        Ya podras tener una varidad de consultas elevadas para tu empresa o como ciudadano
                    </p>
                </div>
                <div>
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-gray-200 rounded-full shadow">
                        <span class="text-xl font-semibold text-gray-700">3</span>
                    </div>
                    <h3 class="mt-6 text-xl text-white font-semibold leading-tight md:mt-10">Comparte y crea informes</h3>
                    <p class="mt-4 text-base text-gray-400 md:text-lg">
                        Da informacion a diferntes entidades o personas y crea todas las que quieras para poder tener una
                        informacion mas de detallad
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute inset-0 m-auto max-w-xs h-[357px] blur-[118px] sm:max-w-md md:max-w-lg"
        style="background:radial-gradient(1.89deg, rgba(34, 78, 95, 0.4) -1000%, rgba(191, 227, 205, 0.26) 1500.74%, rgba(34, 140, 165, 0.41) 56.49%, rgba(28, 47, 99, 0.11) 1150.91%)">
    </div>
</section>


<hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700" style="margin-top:100px;">

<!-- seccion de contacto -->
<section class="mb-32 mt-24">
  <div id="map" class="relative h-[300px] overflow-hidden bg-cover bg-[50%] bg-no-repeat">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11672.945750644447!2d-122.42107853750231!3d37.7730507907087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858070cc2fbd55%3A0xa71491d736f62d5c!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1619524992238!5m2!1sen!2sus"
      width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
  <div class="container px-6 md:px-12">
    <div
      class="block rounded-lg bg-[hsla(0,0%,100%,0.8)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]  md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px] border border-gray-300">
      <div class="flex flex-wrap">
        <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:mb-0 lg:w-5/12 lg:px-6">
          <form>
            <div class="relative mb-6" data-te-input-wrapper-init>
              <input type="text"
                  class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                  id="exampleInput90" />
              <label
                  class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none "
                  for="exampleInput90">Nombre
                </label>
            </div>
            <div class="relative mb-6" data-te-input-wrapper-init>
              <input type="email"
                  class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                  id="exampleInput91" />
              <label
                  class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none "
                  for="exampleInput91">Correo electronico
                </label>
            </div>
            <div class="relative mb-6" data-te-input-wrapper-init>
              <textarea
                  class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none "
                  id="exampleFormControlTextarea1" rows="3"></textarea>
              <label for="exampleFormControlTextarea1"
                  class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none ">Mensaje</label>
            </div>
          
            <button type="button"
                class="mb-6 w-full rounded bg-sky-500 text-white px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal   lg:mb-0">
                Enviar
              </button>
          </form>
        </div>
        <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
          <div class="flex flex-wrap">
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:w-6/12">
              <div class="flex items-start">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="h-6 w-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.25 9.75v-4.5m0 4.5h4.5m-4.5 0l6-6m-3 18c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 014.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 00-.38 1.21 12.035 12.035 0 007.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 011.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 01-2.25 2.25h-2.25z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold ">
                    Soporte tecnico
                </p>
                  <p class="text-sm text-neutral-500">
                    info_opendatam@gmail.com
                  </p>
                  <p class="text-sm text-neutral-500">
                        620123686
                  </p>
                </div>
              </div>
            </div>
            <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:w-6/12">
              <div class="flex items-start">
                <div class="srink-0">
                  <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                      stroke="currentColor" class="w-7 h-7">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold ">
                    Direccion
                  </p>
                  <p class="text-sm text-neutral-500">
                    abcd, <br>
                        xyz <br>
                  </p>
                </div>
              </div>
            </div>
            <div
              class="mb-12 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12 md:px-3 lg:mb-12 lg:w-full lg:px-6 xl:w-6/12">
              <div class="align-start flex">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="w-7 h-7"
                      viewBox="0 0 111.756 122.879" enable-background="new 0 0 111.756 122.879" xml:space="preserve">
                      <g>
                        <path
                          d="M27.953,5.569v96.769h19.792V5.569H37.456H27.953L27.953,5.569z M21.898,105.123V2.785C21.898,1.247,23.254,0,24.926,0 h12.53h13.316C52.443,0,53.8,1.247,53.8,2.785v102.338c0,1.537-1.356,2.783-3.028,2.783H24.926 C23.254,107.906,21.898,106.66,21.898,105.123L21.898,105.123z M13.32,17.704c1.671,0,3.027,1.247,3.027,2.785 s-1.355,2.784-3.027,2.784H7.352c-0.161,0-0.292,0.022-0.39,0.064c-0.129,0.056-0.276,0.166-0.429,0.325 c-0.161,0.167-0.281,0.346-0.353,0.528c-0.083,0.208-0.125,0.465-0.125,0.759v90.803c0,0.287,0.043,0.537,0.125,0.74l0.034,0.092 c0.068,0.135,0.165,0.264,0.284,0.383c0.126,0.125,0.258,0.217,0.39,0.27c0.123,0.051,0.279,0.074,0.466,0.074h97.052 c0.188,0,0.346-0.025,0.467-0.074c0.133-0.053,0.264-0.145,0.389-0.27c3.035-3.035,0.441,1.799,0.441-1.215V24.949 c0-3.667,3.039,2.357-0.477-1.288c-0.143-0.146-0.287-0.254-0.43-0.314c-0.113-0.048-0.246-0.075-0.391-0.075H62.563 c-1.672,0-3.027-1.247-3.027-2.784s1.355-2.785,3.027-2.785h41.842c1.041,0,2.029,0.204,2.943,0.597 c0.895,0.385,1.699,0.945,2.393,1.663c0.664,0.686,1.17,1.468,1.514,2.334c0.332,0.839,0.502,1.726,0.502,2.652v90.803 c0,0.938-0.168,1.826-0.502,2.654c-0.344,0.859-0.865,1.639-1.549,2.324c-0.701,0.703-1.506,1.234-2.398,1.598 c-0.906,0.367-1.879,0.551-2.902,0.551H7.352c-1.022,0-1.995-0.184-2.901-0.551c-0.894-0.363-1.698-0.896-2.399-1.598 c-0.621-0.623-1.107-1.33-1.45-2.107c-0.036-0.07-0.069-0.143-0.099-0.217C0.168,117.574,0,116.684,0,115.752V24.949 c0-0.921,0.17-1.811,0.504-2.652c0.342-0.863,0.849-1.648,1.512-2.334c0.683-0.707,1.488-1.263,2.393-1.652 c0.929-0.401,1.917-0.607,2.943-0.607H13.32L13.32,17.704z M65.902,29.03h27.049c0.803,0,1.566,0.145,2.291,0.431 c0.076,0.03,0.15,0.063,0.223,0.099c0.607,0.269,1.166,0.635,1.666,1.096c0.584,0.533,1.027,1.128,1.326,1.782 c0.047,0.104,0.088,0.21,0.119,0.317c0.225,0.584,0.34,1.189,0.34,1.812v12.611c0,0.744-0.156,1.45-0.459,2.118l-0.004,0.009 l0.004,0.002c-0.291,0.64-0.725,1.224-1.291,1.75c-0.58,0.546-1.227,0.956-1.932,1.231c-0.736,0.287-1.5,0.426-2.283,0.426H65.902 c-0.777,0-1.535-0.14-2.27-0.426c-0.693-0.269-1.33-0.668-1.912-1.198c-0.588-0.539-1.031-1.144-1.326-1.81 c-0.033-0.078-0.063-0.157-0.09-0.235c-0.234-0.605-0.35-1.228-0.35-1.867V34.567c0-0.723,0.146-1.424,0.445-2.099l-0.006-0.002 c0.295-0.666,0.738-1.271,1.326-1.81l0.037-0.032l-0.002-0.001c0.877-0.78,2.039-1.219,2.119-1.244 C64.537,29.147,65.215,29.03,65.902,29.03L65.902,29.03z M93.475,34.599h-28.08v12.547h28.08V34.599L93.475,34.599z M78.877,63.42 c1.072,0,2.01,0.41,2.807,1.207s1.188,1.734,1.188,2.785c0,1.148-0.389,2.104-1.188,2.865c-0.799,0.758-1.734,1.129-2.807,1.129 c-1.129,0-2.084-0.371-2.844-1.129c-0.76-0.762-1.148-1.717-1.148-2.865c0-1.051,0.391-1.988,1.148-2.785 S77.748,63.42,78.877,63.42L78.877,63.42z M90.977,63.42c1.072,0,2.008,0.41,2.805,1.207s1.189,1.734,1.189,2.785 c0,1.148-0.391,2.104-1.189,2.865c-0.799,0.758-1.732,1.129-2.805,1.129c-1.131,0-2.086-0.371-2.846-1.129 c-0.76-0.762-1.148-1.717-1.148-2.865c0-1.051,0.391-1.988,1.148-2.785S89.846,63.42,90.977,63.42L90.977,63.42z M66.662,75.518 c1.15,0,2.105,0.389,2.865,1.148s1.129,1.715,1.129,2.865c0,1.051-0.371,1.988-1.129,2.785s-1.715,1.209-2.865,1.209 c-1.053,0-1.988-0.412-2.785-1.209s-1.209-1.734-1.209-2.785c0-1.15,0.41-2.105,1.209-2.865S65.609,75.518,66.662,75.518 L66.662,75.518z M78.877,75.518c1.072,0,2.008,0.389,2.807,1.148s1.188,1.715,1.188,2.865c0,1.051-0.391,1.988-1.188,2.785 s-1.734,1.209-2.807,1.209c-1.129,0-2.086-0.412-2.844-1.209s-1.148-1.734-1.148-2.785c0-1.15,0.389-2.105,1.148-2.865 S77.748,75.518,78.877,75.518L78.877,75.518z M90.977,75.518c1.072,0,2.006,0.389,2.805,1.148s1.189,1.715,1.189,2.865 c0,1.051-0.393,1.988-1.189,2.785s-1.732,1.209-2.805,1.209c-1.131,0-2.088-0.412-2.846-1.209s-1.148-1.734-1.148-2.785 c0-1.15,0.389-2.105,1.148-2.865S89.846,75.518,90.977,75.518L90.977,75.518z M66.662,87.518c1.15,0,2.107,0.393,2.865,1.189 s1.129,1.773,1.129,2.922c0,1.053-0.369,1.988-1.129,2.787s-1.715,1.207-2.865,1.207c-1.053,0-1.986-0.408-2.785-1.207 s-1.209-1.734-1.209-2.787c0-1.148,0.412-2.125,1.209-2.922S65.609,87.518,66.662,87.518L66.662,87.518z M78.877,87.518 c1.072,0,2.01,0.393,2.807,1.189s1.188,1.773,1.188,2.922c0,1.053-0.389,1.988-1.188,2.787s-1.734,1.207-2.807,1.207 c-1.129,0-2.084-0.408-2.844-1.207s-1.148-1.734-1.148-2.787c0-1.148,0.391-2.125,1.148-2.922S77.748,87.518,78.877,87.518 L78.877,87.518z M90.977,87.518c1.072,0,2.008,0.393,2.805,1.189s1.189,1.773,1.189,2.922c0,1.053-0.391,1.988-1.189,2.787 s-1.732,1.207-2.805,1.207c-1.131,0-2.086-0.408-2.846-1.207s-1.148-1.734-1.148-2.787c0-1.148,0.391-2.125,1.148-2.922 S89.846,87.518,90.977,87.518L90.977,87.518z M78.877,99.617c1.072,0,2.008,0.389,2.807,1.188s1.188,1.734,1.188,2.807 c0,1.129-0.389,2.084-1.188,2.844s-1.734,1.148-2.807,1.148c-1.129,0-2.084-0.389-2.844-1.148s-1.148-1.715-1.148-2.844 c0-1.072,0.389-2.008,1.148-2.807S77.748,99.617,78.877,99.617L78.877,99.617z M66.662,63.42c1.15,0,2.107,0.41,2.865,1.207 s1.129,1.734,1.129,2.785c0,1.148-0.369,2.104-1.129,2.865c-0.76,0.758-1.715,1.129-2.865,1.129c-1.053,0-1.986-0.371-2.785-1.129 c-0.799-0.762-1.209-1.717-1.209-2.865c0-1.051,0.412-1.988,1.209-2.785S65.609,63.42,66.662,63.42L66.662,63.42z" />
                      </g>
                    </svg>

                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold ">Teléfono fijo</p>
                  <p class="text-neutral-500"> 620123638
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:w-full lg:px-6 xl:mb-12 xl:w-6/12">
              <div class="align-start flex">
                <div class="shrink-0">
                  <div class="inline-block rounded-md bg-sky-200 p-4 text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                  </div>
                </div>
                <div class="ml-6 grow">
                  <p class="mb-2 font-bold ">Movil</p>
                  <p class="text-neutral-500"> 620123638
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>   



<Footer />

</div>
 
<Cookies />



</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
.getstart{
    --tw-bg-opacity: 1;
    background-color: rgb(82 82 91 / var(--tw-bg-opacity));
}
.card {
  position: relative;
  width: 300px;
  height: auto;
}


.download{
    position:absolute;
    bottom:8%;
    right:7%;
    padding:10px;
    background-color: rgb(255, 255, 255);
    border-radius: 10%;
    display: none;
}
.peer:focus ~ .peer-focus\:-translate-y-\[0\.9rem\] {
        --tw-translate-y: -1.4rem;
}
.likes{
    position:absolute;
    bottom:8%;
    left:7%;
    padding:10px;
    background-color: rgb(255, 255, 255);
    border-radius: 10%;
    display: none;
}


.card button {
  display: block;
}

</style>