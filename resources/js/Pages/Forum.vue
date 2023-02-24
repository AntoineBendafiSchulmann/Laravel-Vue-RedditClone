<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    posts: Array,
    communities: Array,
})




</script>

<template>
    <Head title="Forum" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Communautés</h2>
            </div>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-2xl mb-3">Rechercher une communauté</p>
                        <form action="/search" method="GET">
                            <input type="text"  name="query" id="query" placeholder="Rechercher une communauté" class="w-64 h-10 pl-3 pr-4 mr-4 rounded-full text-sm focus:outline-none">
                            <button type="submit" class="bg-black hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-full inline-flex items-center">
                            <svg class="fill-current w-4 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.427 14.427a8 8 0 1 1 1.414-1.414l5.243 5.243-1.414 1.414-5.243-5.243zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
                                <span class="text-sm text-white">Rechercher</span>
                            </button>
                        </form>
                    </div>

                    <select class="w-64 h-10 pl-3 pr-4 mr-4 rounded-full text-sm focus:outline-none mt-10" id="sort" name="sort">
                        <option value="0">Trier par --</option>
                        <option value="1">Tous</option>
                        <option value="2">Favoris</option>
                        <option value="3">Ordre alphabétique</option>
                        <option value="4">Ordre alphabétique inversé</option>
                        <option value="5">Date de création</option>
                        <option value="6">Date de mise à jour</option>
                    </select>

                </div>
            </div>
        </div>



        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-2xl mb-10">Communautés</p>
                        <div class="mb-5" v-for="community in communities.slice().sort((a, b) => a.name.localeCompare(b.name))" :key="community.id"> 
                            <div class="bg-white shadow-md rounded-lg px-4 py-4 mb-4" 
                                :class="{'border-l-4 border-orange-500': community.status === 'video_game'},
                                {'border-l-4 border-blue-500': community.status === 'movie'}, 
                                {'border-l-4 border-green-500': community.status === 'book'}, 
                                {'border-l-4 border-red-500': community.status === 'music'}, 
                                {'border-l-4 border-yellow-500': community.status === 'series'}">

                            <div class="flex justify-between">
                                <div>
                                    <p class="text-gray-700 font-bold">{{ community.name }}</p>
                                    <p class="text-gray-700 text-sm">{{ community.description }}</p>
                                    <img :src="community.image" alt="image" class="w-20 h-20">
                                    <hr class="mt-1 w-20">

                                    <div class="flex items-center mt-2 space-x-3">
                                        <div class="w-3 h-3 rounded-full" 
                                            :class="{'bg-orange-500': community.status === 'video_game'},
                                            {'bg-blue-500': community.status === 'movie'}, 
                                            {'bg-green-500': community.status === 'book'}, 
                                            {'bg-red-500': community.status === 'music'}, 
                                            {'bg-yellow-500': community.status === 'series'}">
                                        </div>

                                        <div class="flex justify-between">
                                            <p class="text-gray-700 text-sm">{{ community.status }}</p>
                                            

                                        </div>
                                        
                                    </div>
                                    
                                    <p class="text-gray-700 text-sm">créé à la date du {{ community.created_at }}</p>
                                </div>
                                <Link class="py-2 px-6 " :href="route('communities.show', community.id)">Voir</Link>
                                
                            </div>
                            </div>
                        </div>

                        
                            
                        
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>