<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'




const props = defineProps({
    commentary: Object
})

let form = useForm({ 
    user_id: props.commentary.user_id,
    post_id: props.commentary.post_id,
    body: props.commentary.body,
})


</script>

<template>
    <Head title="Show"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">commentaire écrit par {{commentary.user.name}}</h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full mb-5">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Auteur</th>
                                <th class="px-4 py-2">Post</th>
                                <th class="px-4 py-2">Contenu</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{commentary.user.name}}</td>
                                <td class="border px-4 py-2">{{commentary.post.title}}</td>
                                <td class="border px-4 py-2">{{commentary.body}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>

