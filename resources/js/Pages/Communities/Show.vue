<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';



const props = defineProps({
    community: Object,
    
})


</script>

<template>
    <Head title="Show"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Communauté {{ $page.props.community.name }}</h2>
                <a class="py-2 px-6 mx-2 bg-black text-white rounded" :href="route('forum')">Retour à la liste des communautés</a>
            </div>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full mb-5">
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
                            <tr>
                                <td class="border px-4 py-2">{{ props.community.name }}</td>
                                <td class="border px-4 py-2">{{ props.community.description }}</td>
                                <td class="border px-4 py-2">
                                    <img :src="props.community.image" alt="image" class="w-20 h-20">
                                </td>
                                <td class="border px-4 py-2">{{ props.community.slug }}</td>
                                <td class="border px-4 py-2">{{ props.community.status }}</td>
                            </tr>
                            </tbody>
                        </table>
                        
                    </div>

                    <div class="p-6">
                        <h2 class="font-semibold text-black transition-colors duration-300  sm:text-lg">Posts de la communauté {{ props.community.name }}</h2>

                        <template v-if="props.community.posts.length === 0">
                            <p class="text-center">Cette communauté n'a pas encore de posts</p>
                        </template>
                        
                        <table v-if="props.community.posts.length >= 1" class="table-auto w-full mb-5">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Titre</th>
                                <th class="px-4 py-2">Contenu</th>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="post in props.community.posts" :key="post.id">
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
