<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'


const props = defineProps({
    client: Object
})

let form = useForm({ 
    name: props.client.name,
    description: props.client.description,
    social_reason: props.client.social_reason,
    juridical_status: props.client.juridical_status,
    capital: props.client.capital,
    siret: props.client.siret,
    naf_code: props.client.naf_code,
    country: props.client.country,
    address: props.client.address,
    postal_code: props.client.postal_code,
    city: props.client.city,
})


</script>

<template>
    <Head title="Show"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Show</h2>
        </template>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <table class="table-auto w-full mb-5">
                            <thead>
                            <tr> 
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Social Reason</th>
                                <th class="px-4 py-2">Juridical Status</th>
                                <th class="px-4 py-2">Capital</th>
                                <th class="px-4 py-2">Siret</th>
                                <th class="px-4 py-2">Naf Code</th>
                                <th class="px-4 py-2">Country</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">Postal Code</th>
                                <th class="px-4 py-2">City</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ props.client.name }}</td>
                                <td class="border px-4 py-2">{{ props.client.description }}</td>
                                <td class="border px-4 py-2">{{ props.client.social_reason }}</td>
                                <td class="border px-4 py-2">{{ props.client.juridical_status }}</td>
                                <td class="border px-4 py-2">{{ props.client.capital }}</td>
                                <td class="border px-4 py-2">{{ props.client.siret }}</td>
                                <td class="border px-4 py-2">{{ props.client.naf_code }}</td>
                                <td class="border px-4 py-2">{{ props.client.country }}</td>
                                <td class="border px-4 py-2">{{ props.client.address }}</td>
                                <td class="border px-4 py-2">{{ props.client.postal_code }}</td>
                                <td class="border px-4 py-2">{{ props.client.city }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="route('clients.index')" class="bg-gray-200 hover:bg-gray-300 text-black  font-bold py-2 px-4 rounded">Retour à la liste</a>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>
