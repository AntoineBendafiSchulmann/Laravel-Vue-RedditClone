<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';


const props = defineProps({
    post: Object,
    communities: Array,
    users: Array

})

let form = useForm({ 
    user_id: props.post.user_id,
    community_id: props.post.community_id,
    title: props.post.title,
    body: props.post.body,
    image: props.post.image,
    slug: props.post.slug,
    status: props.post.status,
})

const submit = () => {
    Inertia.post(route('posts.update', props.post.id),{
        _method:"put",
        form:form
    })
}



</script>

<template>
    <Head title="Edit"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{props.post.title}}</h2>
                <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('posts.destroy', props.post.id)" method="delete">Supprimer</Link>
            </div>
        </template> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form  @submit.prevent="submit">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                                    Auteur
                                </label> 
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_id" name="user_id" required v-model="form.user_id">
                                    <option v-for="user in props.users" :value="user.id">{{user.name}}</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="community_id">
                                    Communauté
                                </label> 
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="community_id" name="community_id" required v-model="form.community_id">
                                    <option v-for="community in props.communities" :value="community.id">{{community.name}}</option>
                                </select>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Titre
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Titre" name="title" required v-model="form.title">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                                    Contenu
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body"  placeholder="Contenu" name="body" required v-model="form.body"></textarea>
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                    Image
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" placeholder="Image" name="image" required @input:change="form.image = $event.target.files[0]">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
                                    Slug
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slug" type="text" placeholder="Slug" name="slug" required v-model="form.slug">
                                
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                                    Statut
                                </label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" required v-model="form.status">
                                    <option value="video_game">Jeux Vidéo</option>
                                    <option value="movie">Film</option>
                                    <option value="book">Livre</option>
                                    <option value="music">Musique</option>
                                    <option value="series">Série</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
