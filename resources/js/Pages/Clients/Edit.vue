<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head ,Link} from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3'


const props = defineProps({
    client: Object,
    

})

const form = useForm({
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

const submit = () => {
    form.put(route('clients.update', props.client.id), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('name','description', 'social_reason', 'juridical_status', 'capital', 'siret', 'naf_code', 'country', 'address', 'postal_code', 'city')
        }
    })
}




</script>




<template>
    <Head title="Edit"/>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ props.client.social_reason }}</h2>
                <Link class="py-2 px-6 mx-2 bg-red-600 text-white rounded" :href="route('clients.destroy', props.client.id)" method="delete">Supprimer</Link>
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
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Nom" name="name" required v-model="form.name">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Description
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Description" name="description" required v-model="form.description">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="social_reason">
                                    Raison sociale
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="social_reason" type="text" placeholder="Raison sociale" name="social_reason" required v-model="form.social_reason">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="juridical_status">
                                    Forme juridique
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="juridical_status" type="text" placeholder="Forme juridique" name="juridical_status" required v-model="form.juridical_status">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="capital">
                                    Capital
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="capital" type="number" placeholder="Capital" name="capital" required v-model="form.capital">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="siret">
                                    Siret
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="siret" type="number" placeholder="Siret" name="siret" required v-model="form.siret">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="naf_code">
                                    Code NAF
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="naf_code" type="number" placeholder="Code NAF" name="naf_code" required v-model="form.naf_code">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                                    Pays
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country" type="text" placeholder="Pays" name="country" required v-model="form.country">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                    Adresse
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" type="text" placeholder="Adresse" name="address" required v-model="form.address">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="zip_code">
                                    Code postal
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="zip_code" type="text" placeholder="Code postal" name="postal_code" required v-model="form.postal_code">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                                    Ville
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="city" type="text" placeholder="Ville" name="city" required v-model="form.city">
                            </div>
                            <div class="flex items center justify-between">
                                <button type="submit">
                                    <a class="py-2 px-6 mx-2 bg-gray-100 text-black rounded" :href="route('clients.index')">Retour</a>
                                </button>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Sauvegarder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        
    </AuthenticatedLayout>
</template>
