<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';


const props = defineProps({
    community: Object,
    

})

let form = useForm({
    name: props.community.name,
    description: props.community.description,
    image: props.community.image,
    slug: props.community.slug,
    status: props.community.status,

})

const submit = () => {
    Inertia.post(route('communities.update', props.community.id),{
        _method:"put",
        form:form
    })
}

console.log(form);


</script>



<template>
    <Head title="Edit"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Menu édition {{ props.community.name }}</h2>
                <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('communities.destroy', props.community.id)" method="delete">Supprimer</Link>
            </div>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form  @submit.prevent="submit">

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Nom
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Name" name="name" required v-model="form.name">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Description
                                </label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description"  placeholder="Description" name="description" required v-model="form.description"></textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                    Image
                                </label>
                                <img :src="props.community.image" alt="image" class="w-20 h-20 mb-3">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" type="file" placeholder="Image" name="image" required @input="form.image = $event.target.files[0]">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
                                    Slug
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slug" type="text" placeholder="Slug" name="slug" required v-model="form.slug">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                                    Status
                                </label>
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="status" placeholder="Status" name="status" required v-model="form.status">
                                    <option value="video_game">Jeux Vidéo</option>
                                    <option value="movie">Film</option>
                                    <option value="book">Livre</option>
                                    <option value="music">Musique</option>
                                    <option value="series">Série</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        
    </AuthenticatedLayout>
</template>
