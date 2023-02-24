

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    posts: Array
})

let form = useForm({ 
    search: ''
})

</script>

<template>
    <Head title="Search"/>

    <AuthenticatedLayout> 
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Search</h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex flex-col w-1/2">
                                <label for="search" class="text-sm text-gray-600">Recherche</label>
                                <input type="text" id="search" v-model="form.search" class="border rounded-md px-3 py-2 mt-1 mb-5 w-full">
                            </div>
                        </div>
                    </div>
                    <table class="table-auto w-full mb-5">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Communauté</th>
                            <th class="px-4 py-2">Titre</th>
                            <th class="px-4 py-2">Contenu</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Slug</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="post in posts" :key="post.id">
                            <td class="border px-4 py-2">{{post.community.name}}</td>
                            <td class="border px-4 py-2">{{post.title}}</td>
                            <td class="border px-4 py-2">{{post.body}}</td>
                            <td class="border px-4 py-2">
                                <img :src="post.image" alt="image" class="w-20 h-20">
                            </td>
                            <td class="border px-4 py-2">{{post.slug}}</td>
                            <td class="border px-4 py-2">{{post.status}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>




