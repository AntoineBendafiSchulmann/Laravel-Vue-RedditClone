<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    user: Object,
    posts: Array
})

const form = useForm({
    user_id: props.user.id,
    community_id: '',
    title: '',
    body: '',
    image: null,
    slug: '',
    status: '',
    
})

const submit=()=>{
    form.post(route('posts.store'))
}

</script>

<template>
    <Head title="Create"/> 

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create</h2>
            </div>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form method="POST" @submit.prevent="submit">
                            <input type="hidden" name="user_id" :value="props.user.id">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="community_id">
                                    Community
                                </label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="community_id" name="community_id" required v-model="form.community_id">
                                    <option value="">Choisir une communauté</option>
                                    <option v-for="post in posts" :key="post.id" :value="post.id">{{post.community.name}}</option> <!--les communautés posédant déjà un post -->
                                </select>
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Title" name="title" required v-model="form.title">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                                    Contenu 
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Body" name="body" required v-model="form.body"></textarea>
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                    Image
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="file" placeholder="Image" name="image" required v-on:change="form.image = $event.target.files[0]">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
                                    Slug
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="" type="text" placeholder="Slug" name="slug" required v-model="form.slug">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                                    Status
                                </label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" required v-model="form.status">
                                    <option value="">Choisir un status</option>
                                    <option value="video_game">Jeux Vidéo</option>
                                    <option value="movie">Film</option>
                                    <option value="book">Livre</option>
                                    <option value="music">Musique</option>
                                    <option value="series">Série</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <button class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Créer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>



                            