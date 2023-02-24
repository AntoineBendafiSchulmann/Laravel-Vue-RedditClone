<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    users: Array,
})

</script>

<template>
    <Head title="Index" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
            <a class="py-2 px-6 mx-2 bg-black text-white rounded" :href="route('dashboard')">Retour au dashboard</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Liste des utilisateurs</h2>
            <a class="py-2 px-6 mx-2 bg-black text-white rounded" :href="route('posts.create')">+ Créer un post</a>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full mb-5">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in props.users" :key="user.id">
                                <td class="border px-4 py-2">{{ user.name }}</td>
                                <td class="border px-4 py-2">{{ user.email }}</td>
                                <td class="border px-4 py-2">{{ user.role }}</td>
                                <td class="border px-4 py-2">
                                    <Link :href="route('users.show', user.id)" class="text-indigo-600 hover:text-indigo-900">Show</Link>
                                </td>
                                <td class="border px-4 py-2">
                                    <Link :href="route('users.edit', user.id)" class="text-indigo-600 hover:text-indigo-900">Editer</Link>
                                </td>
                                <td class="border px-4 py-2">
                                    <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('users.destroy', user.id)" method="delete">Bannir</Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
                                
                                


