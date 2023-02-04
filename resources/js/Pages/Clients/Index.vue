<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    clients: Array,
})


</script>

<template>
    <Head title="Index"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show</h2>
            <a class="py-2 px-6 mx-2 bg-blue-600 text-white rounded" :href="route('clients.create')">+  Créer un client</a>
            </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Raison sociale</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Projets</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="client in clients" :key="client.id">
                                <td class="border px-4 py-2">{{client.social_reason}}</td>
                                <td class="border px-4 py-2">{{client.description}}</td>
                                <td class="border px-4 py-2">{{client.project.length}}</td>
                                <td class="border px-4 py-2">
                                    <a class="py-2 px-6 mx-2 bg-blue-400 text-white rounded" :href="route('clients.edit', client.id)">Edit</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </AuthenticatedLayout>
</template>