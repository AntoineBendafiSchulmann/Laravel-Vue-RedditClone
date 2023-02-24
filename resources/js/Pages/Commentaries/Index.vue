<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'


const props = defineProps({
    commentaries: Array
})



</script>

<template>
    <Head title="Index"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Gestion des commentaires</h2>
            </div>
        </template>

        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Auteur</th>
                                <th class="px-4 py-2">Contenu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="commentary in commentaries" :key="commentary.id">
                                <td class="border px-4 py-2">{{commentary.user.name}}</td>
                                <td class="border px-4 py-2">{{commentary.body}}</td>
                                <td class="border px-4 py-2">
                                    <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('commentaries.destroy', commentary.id)" method="delete">Supprimer</Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
