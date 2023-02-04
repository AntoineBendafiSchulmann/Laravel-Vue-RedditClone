<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'




const props = defineProps({
    project: Object
})

let form = useForm({ 
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
    day_selled: props.project.day_selled,

})



</script>

<template>
    <Head title="Show"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show</h2>
        </template>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full mb-5">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Client</th>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Prénom</th>
                                <th class="px-4 py-2">Téléphone</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Titre</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Date de début</th>
                                <th class="px-4 py-2">Date de fin</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Jours vendus</th>

                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{project.client.name}}</td>
                                <td class="border px-4 py-2">{{project.name}}</td>
                                <td class="border px-4 py-2">{{project.first_name}}</td>
                                <td class="border px-4 py-2">{{project.phone}}</td>
                                <td class="border px-4 py-2">{{project.email}}</td>
                                <td class="border px-4 py-2">{{project.title}}</td>
                                <td class="border px-4 py-2">{{project.description}}</td>
                                <td class="border px-4 py-2">{{project.start_date}}</td>
                                <td class="border px-4 py-2">{{project.end_date}}</td>
                                <td class="border px-4 py-2">{{project.status}}</td>
                                <td class="border px-4 py-2">{{project.day_selled}}</td>

                                
                            </tr>
                            </tbody>
                        </table>
                        <a href="route('projects.index')" class="bg-gray-200 hover:bg-gray-300 text-black  font-bold py-2 px-4 rounded">Retour à la liste</a>
                    </div>
                </div>
            </div>
        

        








    </AuthenticatedLayout>
</template>
