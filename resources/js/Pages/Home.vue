<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Home" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Accueil</h2>
        </template>

        <!-- Page d'accueil -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        <h1 class="text-3xl">Bienvenue sur le projet reddit clone de la formation Laravel</h1>
                        <p class="text-sm">Vous pouvez créer des posts</p>
                        <p class="text-sm">Vous pouvez commenter les posts</p>
                        <p class="text-sm">Vous pouvez retrouver les posts par catégories</p>

                    </div>
                    <div class="flex justify-between">
                        <Link class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" :href="route('login')">Login</Link>
                        <Link class="bg-black hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" :href="route('register')">Register</Link>
                    </div>

                </div>
            </div>
        </div>
    </GuestLayout>
</template>
