<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    posts: Array,
})


//pour afficher les images
const image = (image) => {
    return '/storage/' + image
}


</script>

<template>
    <Head title="Index"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <a class="py-2 px-6 mx-2 bg-black text-white rounded" :href="route('dashboard')">Retour au dashboard</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des posts</h2>
            <a class="py-2 px-6 mx-2 bg-black text-white rounded" :href="route('posts.create')">+ Créer un post</a>
            </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Titre</th>
                                <th class="px-4 py-2">Body</th>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="post in props.posts" :key="post.id">
                                <td class="border px-4 py-2">{{ post.title }}</td>
                                <td class="border px-4 py-2">{{ post.body }}</td>
                                <td class="border px-4 py-2">
                                    <img :src="image(post.image)" class="w-20 h-20 object-cover">
                                </td>
                                <td class="border px-4 py-2">{{ post.slug }}</td>
                                <td class="border px-4 py-2">{{ post.status }}</td>
                                <td class="border px-4 py-2">
                                    <a class="py-2 px-6 mx-2 bg-green-600 text-white rounded" :href="route('posts.show', post.id)">Voir</a>
                                </td>
                                <td class="border px-4 py-2">
                                    <a class="py-2 px-6 mx-2 bg-blue-600 text-white rounded" :href="route('posts.edit', post.id)">Editer</a>
                                </td>
                                <td class="border px-4 py-2">
                                    <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('posts.destroy', post.id)" method="delete">Supprimer</Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </AuthenticatedLayout>
</template>
