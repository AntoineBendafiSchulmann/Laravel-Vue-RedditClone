<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'


const props = defineProps({
    project: Object,
    clients:Array

})

const form = useForm({ 
    client_id: props.project.client_id,
    name: props.project.name,
    first_name: props.project.first_name,
    phone: props.project.phone,
    email: props.project.email,
    title: props.project.title,
    description: props.project.description,
    start_date: props.project.start_date,
    end_date: props.project.end_date,
    status: props.project.status,
    day_selled: props.project.day_selled

})

const submit = () => {
    form.put(route('projects.update', props.project.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('client_id', 'name', 'first_name', 'phone', 'email', 'title', 'description', 'start_date', 'end_date', 'status', 'day_selled')
        }
    })
}




</script>

<template>
    <Head title="Edit"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{props.project.name}}</h2>
                <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('projects.destroy', props.project.id)" method="delete">Supprimer</Link> 
            </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form  @submit.prevent="submit">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="client_id">
                                    Client
                                </label> 
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Client" name="client_id" required v-model="form.client_id">
                                    <option v-for="client in props.clients" :value="client.id">{{client.name}}</option>
                                </select>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Nom
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Nom" name="name" required v-model="form.name">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                                    Prénom
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Prénom" name="first_name" required v-model="form.first_name">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                    Téléphone
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Téléphone" name="phone" required v-model="form.phone">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Email" name="email" required v-model="form.email">
                            </div>

                            <p class="text-xl font-bold">Informations  projet</p>
                            <p class="text-sm">Veuillez renseigner les informations du projet</p>
                            <hr class="my-4">

                            <div class="mb-4">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Titre
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Titre" name="title" required v-model="form.title">
                                
                                <div class="mb-4">

                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Description
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Description" name="description" required v-model="form.description">

                                </textarea>
                                </div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="start_date">
                                    Date de début
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start_date" type="date" placeholder="Date de début" name="start_date" required v-model="form.start_date">

                                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_date">
                                    Date de fin estimée
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end_date" type="date" placeholder="Date de fin" name="end_date" required v-model="form.end_date">

                                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                                    Status du projet
                                </label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" required v-model="form.status">
                                    <option value="">Choisir un status</option>
                                    <option value="En attente">En attente</option>
                                    <option value="En cours">En cours</option>
                                    <option value="Terminé">Terminé</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="day_selled">
                                    Nombre de jours vendus
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="day_selled" type="number" placeholder="Jours vendus" name="day_selled" required v-model="form.day_selled">
                            </div>
                            <div class="flex items center justify-between">
                                <button type="submit">
                                    <a class="py-2 px-6 mx-2 bg-gray-100 text-black rounded" :href="route('projects.index')">Annuler</a>
                                </button>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Sauvegarder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        
    </AuthenticatedLayout>
</template>
