<script setup>
import { Head, Link } from '@inertiajs/vue3';


import { nextTick, onMounted, ref } from 'vue'
import { initFlowbite } from 'flowbite'
import { FilterMatchMode } from 'primevue/api';
import PanelMenu from 'primevue/panelmenu';
import { useForm } from '@inertiajs/vue3';

import axios from "axios"
// initialize components based on data attribute selectors

let visible = ref(false);
const value = ref(null);

import Carousel from 'primevue/carousel';
let prueba_vs = ref(true);


let usuarios = []
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
console.log(usuarios + "aqii")

customers.value = [

    {
        name: 'James Butt',
        country: {
            name: 'Algeria',
            code: 'dz'
        },
        status: 'unqualified',
        verified: true,
        activity: 17,
        representative: "2@d.com",
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
        representative: "2@d.com",
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
let visible_2 = ref(false)
function users() {
    axios({
        method: 'post',
        url: '/prueba',
        data: {
            firstName: 'Fred',
            lastName: 'Flintstone'
        }
    }).then(function (response) {
        usuarios = []
        response.data.message.forEach((i, index) => {
            let usuario = {
                id_main: i.id,
                name: i.name,
                country: {
                    name: 'Algeria',
                    code: 'dz'
                },
                status: 'unqualified',
                tel: i.telefono,
                rol: i.rol,
                representative: i.email,
                empresa: i.nom_empresa
            }
            usuarios.push(usuario)
        })
        customers.value = usuarios
        /*
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
        
        */

    });
}

console.log(usuarios)
let nombre = ref();
let correo = ref();
let rol_ = ref();
let nom_empresa_ = ref();
let pass_ = ref();

let tel_ = ref();
let id_main = ref();
let valores = [correo, nombre, id_main, rol_, nom_empresa_, tel_, pass_]

function prueba(id) {
    console.log(id)
    nombre.value = id.name
    correo.value = id.representative
    visible.value = true
    id_main.value = id.id_main
    rol_.value = id.rol;
    nom_empresa_.value = id.empresa;
    tel_.value = id.tel;
}
function modalinner(id) {
    console.log(id)

    visible_2.value = true
    nombre.value = "";
    correo.value = "";
    rol_.value = "";
    nom_empresa_.value = "";
    pass_.value = "";

    tel_.value = "";
    id_main.value = "";
}
const items = ref([
    {
        label: '',
        icon: 'pi pi-file',
        items: [
            {
                label: '<div>Documents</div>',
                icon: 'pi pi-file',
                attribute: "class",
            },
            {
                label: 'Images',
                icon: 'pi pi-image',

            }
        ]
    },

]);

function send_main() {
    axios({
        method: 'post',
        url: '/prueba2',
        data: {
            valor: valores

        }
    }).then(function (response) {

        console.log(response)
        visible.value = false
        nombre.value = "";
        correo.value = "";
        rol_.value = "";
        nom_empresa_.value = "";
        pass_.value = "";

        tel_.value = "";
        id_main.value = "";
        users();
    });
}
onMounted(() => {
    initFlowbite();
    users();

})
function send_inner() {
    console.log(valores)
    axios({
        method: 'post',
        url: '/prueba3',
        data: {
            valor: valores

        }
    }).then(function (response) {
        console.log(response)
        visible.value = false
        nombre.value = "";
        correo.value = "";
        rol_.value = "";
        nom_empresa_.value = "";
        pass_.value = "";

        tel_.value = "";
        id_main.value = "";
        users();
    });
}
function disable_main() {
    axios({
        method: 'post',
        url: '/prueba4',
        data: {
            valor: valores,
        }
    }).then(function (response) {
        console.log(response)
        nombre.value = "";
        correo.value = "";
        rol_.value = "";
        nom_empresa_.value = "";
        pass_.value = "";

        tel_.value = "";
        id_main.value = "";
        users();
    });
}
</script>

<template>
    <Nav />
    <div>
        <Message severity="success">Success Message</Message>
        awadwd
        <DataTable v-model:filters="filters" v-model:selection="selectedCustomer" :value="customers" stateStorage="session"
            stateKey="dt-state-demo-session" paginator :rows="10" filterDisplay="menu" selectionMode="single" dataKey="id"
            :globalFilterFields="['name', 'country.name', 'representative.name', 'status']" tableStyle="min-width: 50rem"
            v-if="prueba_vs">

            <template #header>
                <span class="p-input-icon-left" style="    display: flex;
    flex-direction: row;
    justify-content: space-between;">
                    <i class="pi pi-search" />
                    <InputText v-model="filters['global'].value" placeholder="Global Search" />

                </span>
            </template>
            <Column header="name" sortable style="width: 25%">

                <template #body>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                        acquisitions 2021</h5>

                    <a href="#"
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            src="/docs/images/blog/image-4.jpg" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                                technology acquisitions 2021</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </a>
                </template>

            </Column>








            <template #empty> No customers found. </template>
        </DataTable>
    </div>
    <Dialog v-model:visible="visible" modal header="Edit Profile" :style="{ width: 'auto' }">


        <span class="p-text-secondary block mb-5">Actualiza la informacion</span>

        <div class="flex p-5" style="    display: flex;
    flex-direction: row;
    justify-content: space-between;">
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="nombre" />
                <label for="username">Nombre y apellido</label>
            </span>
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="correo" />
                <label for="username">Email</label>
            </span>
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="nom_empresa_" />
                <label for="username">Empresa</label>
            </span>
        </div>

        <div class="flex p-5" style="    display: flex;
    flex-direction: row;
    justify-content: space-between;">
            <span class="p-float-label  mr-5">
                <InputText id="username" v-model="rol_" />
                <label for="username">Rol</label>
            </span>
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="tel_" />
                <label for="username">tel</label>
            </span>

        </div>
        <div style="display: flex;
    flex-direction: row;
    justify-content: space-between;">
            <Button label="Save" type="sumbit" outlined @click="send_main" autofocus />
            <Button label="Danger" severity="danger" @click="disable_main" />

        </div>







    </Dialog>
    <Dialog v-model:visible="visible_2" modal header="Editar perfil" :style="{ width: 'auto' }">
        <template #header>


        </template>

        <span class="p-text-secondary block mb-5">Actualiza la informacion</span>

        <div class="flex p-5" style="    display: flex;
    flex-direction: row;
    justify-content: space-between;">
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="nombre" />
                <label for="username">Nombre y apellido</label>
            </span>
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="correo" />
                <label for="username">Email</label>
            </span>
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="nom_empresa_" />
                <label for="username">Empresa</label>
            </span>
        </div>
        <span class="p-float-label mr-5" style="    display: flex;
    flex-direction: row;
    justify-content: space-between;margin-left:20px;">
            <InputText id="username" v-model="pass_" style="width: 90%;" />
            <label for="username">Contraseña</label>
        </span>
        <div class="flex p-5" style="    display: flex;
    flex-direction: row;
    justify-content: space-between;">
            <span class="p-float-label  mr-5">
                <InputText id="username" v-model="rol_" />
                <label for="username">Rol</label>
            </span>
            <span class="p-float-label mr-5">
                <InputText id="username" v-model="tel_" />
                <label for="username">tel</label>
            </span>

        </div> <Button label="Save" type="sumbit" outlined @click="send_inner" autofocus />







    </Dialog>
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

.getstart {
    --tw-bg-opacity: 1;
    background-color: rgb(82 82 91 / var(--tw-bg-opacity));
}

.card {
    position: relative;
    width: 300px;
    height: auto;
}


.download {
    position: absolute;
    bottom: 8%;
    right: 7%;
    padding: 10px;
    background-color: rgb(255, 255, 255);
    border-radius: 10%;
    display: none;
}

.peer:focus~.peer-focus\:-translate-y-\[0\.9rem\] {
    --tw-translate-y: -1.4rem;
}

.likes {
    position: absolute;
    bottom: 8%;
    left: 7%;
    padding: 10px;
    background-color: rgb(255, 255, 255);
    border-radius: 10%;
    display: none;
}


.card button {
    display: block;
}
</style>