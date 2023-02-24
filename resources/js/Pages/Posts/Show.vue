<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
//commentary create
import CommentaryCreate from '@/Pages/Commentaries/Create.vue';


const props = defineProps({
    post: Object,

})

//pour afficher l'image  provenant de la base de données
function image(image) {
    if (image) {
        return '/storage/' + image
    }
    //on affiche une image par défaut 
    return '/storage/posts/default.png' 
    
}





</script>

<template>
    <Head title="Show"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{post.title}} écrit par {{post.user.name}}</h2>
        </template>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
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
                            <tr>
                                <td class="border px-4 py-2">{{post.community.name}}</td>
                                <td class="border px-4 py-2">{{post.title}}</td>
                                <td class="border px-4 py-2">{{post.body}}</td>
                                <td class="border px-4 py-2">
                                    <img :src="image(post.image)" alt="image" class="w-20 h-20">
                                </td>
                                <td class="border px-4 py-2">{{post.slug}}</td>
                                <td class="border px-4 py-2">{{post.status}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="/posts" class="mt-5 bg-gray-200 hover:bg-gray-300 text-black  font-bold py-2 px-4 rounded">Retour à la liste</a>
                    </div>


                    
                    <div class="p-6">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Commentaires du post {{post.title}}</h2>
                        <CommentaryCreate :post="props.post"/>
                        <div v-for="comment in props.post.comments" :key="comment.id" class=" border  py-2 space-x-5  mb-3">
                            <div class="ml-5">{{comment.user.name}}</div>
                            <div class="ml-3">{{comment.body}}</div>


                        </div>
                    </div>

                    
                    

                </div>
            </div>
    </AuthenticatedLayout>
</template>
