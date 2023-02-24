<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'


const props = defineProps({

    commentary: Object,
    user: Array,
    post: Array,

    
    

})

let form = useForm({
    user_id: props.commentary.user_id,
    post_id: props.commentary.post_id,
    body: props.commentary.body,
    

})

const submit = () => {
    form.patch(route('commentaries.update', props.commentary.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('user_id','post_id', 'body')
        },
    })
}


</script>

<template>
    <Head title="Edit"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{props.commentary.body}}</h2>
                <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('commentaries.destroy', props.commentary.id)" method="delete">Supprimer</Link>
            </div>
        </template> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form  @submit.prevent="submit" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                                    Auteur
                                </label> 
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_id" name="user_id" required v-model="form.user_id">
                                    <option v-for="user in props.user" :value="user.id">{{user.name}}</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="post_id">
                                    Post
                                </label> 
                                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="post_id" name="post_id" required v-model="form.post_id">
                                    <option v-for="post in props.post" :value="post.id">{{post.title}}</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="body" class="sr-only">Body</label>
                                <textarea id="body" name="body" rows="3" class="bg-gray-100 border-2 w-full p-4 rounded-lg" placeholder="Body" v-model="form.body"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </AuthenticatedLayout>
</template>
