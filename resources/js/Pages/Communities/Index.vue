<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    communities: Array,
})



</script>

<template>
    <Head title="Index"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <a class="py-2 px-6 mx-2 bg-black text-white rounded" :href="route('dashboard')">Retour au dashboard</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des communautés</h2>
            <a class="py-2 px-6 mx-2 bg-black text-white rounded" :href="route('communities.create')">+ Créer une communauté</a>
            </div>
        </template>

        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="community in props.communities" :key="community.id">
                                <td class="border px-4 py-2">{{ community.name }}</td>
                                <td class="border px-4 py-2">{{ community.description }}</td>
                                <td class="border px-4 py-2">
                                    <img :src="community.image" alt="image" class="w-20 h-20">
                                </td>
                                <td class="border px-4 py-2">{{ community.slug }}</td>
                                <td class="border px-4 py-2">{{ community.status }}</td>
                                <td class="border px-4 py-2">
                                    <a class="py-2 px-6 mx-2 bg-green-600 text-white rounded" :href="route('communities.show', community.id)">Voir</a>
                                </td>
                                <td class="border px-4 py-2">
                                    <a class="py-2 px-6 mx-2 bg-blue-600 text-white rounded" :href="route('communities.edit', community.id)">Editer</a>
                                </td>
                                <td class="border px-4 py-2">
                                    <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('communities.destroy', community.id)" method="delete">Supprimer</Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </AuthenticatedLayout>
</template>