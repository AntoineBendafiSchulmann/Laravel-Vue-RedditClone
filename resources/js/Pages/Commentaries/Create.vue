<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    post: Object,
})

let form = useForm({
    post_id: props.post.id,
    body: '',
})

const submit=()=>{
    form.post(route('commentaries.store'),{
        onSuccess:()=>form.reset()
    })
}

</script>


<template>
                <div class="flex  items-center justify-center shadow-lg mt-10 mx-8 mb-4 max-w-lg">
                    <form method="POST" @submit.prevent="submit" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Ajouter un commentaire</h2>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea id="body" name="body" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder="écrivez votre commentaire" v-model="form.body"></textarea>
                            </div>
                            <div class="w-full  flex items-start md:w-full px-3">
                                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                                <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="text-xs md:text-sm pt-px">Votre commentaire sera visible par tous</p>
                                </div>

                                <div class="-mr-1">
                                    <button type="submit" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Envoyer</button>
                                </div>
                            </div>
                        </div>   
                    </form>
                </div>


</template>






