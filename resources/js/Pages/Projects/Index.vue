<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    projects: Array,
})


</script>

<template>
    <Head title="Index"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show</h2>
            <a class="py-2 px-6 mx-2 bg-blue-600 text-white rounded" :href="route('projects.create')">+  Créer un projet</a>
            </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Titre</th>
                                <th class="px-4 py-2">Client</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="project in projects" :key="project.id">
                                <td class="border px-4 py-2">{{project.title}}</td>
                                <td class="border px-4 py-2">{{project.client.name}}</td>
                                <td class="border px-4 py-2">{{project.description}}</td>
                                <td class="border px-4 py-2">
                                    <span class="py-1 px-2 rounded-lg whitespace-nowrap font-bold" 
                                    :class="{
                                    'bg-green-200 text-green-600': project.status == 'terminé',
                                    'bg-orange-200 text-orange-600': project.status == 'en_cours',
                                    'bg-red-200 text-red-600': project.status == 'annulé',
                                    }">
                                            {{project.status}}
                                    </span>
                                </td>
                                <td class="border px-4 py-2">
                                    <a class="py-2 px-6 mx-2 bg-blue-400 text-white rounded" :href="route('projects.edit', project.id)">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
</AuthenticatedLayout>
</template>
