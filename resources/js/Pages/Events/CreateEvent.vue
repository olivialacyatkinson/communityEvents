<template>
    <app-layout title="Create an Event">
        <template #header>
            <h2 class="font-semibold text-xl text-cyan-700 leading-tight">
                Create a new Event
            </h2>
        </template>
        <div>
            <form @submit.prevent="submit" class="max-w-md mx-auto mt-7 space-y-6">
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title
                    </label>

                    <input
                        v-model="form.title"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="title"
                        id="title"
                        
                    >

                    <div v-if="errors.title" class="text-red-500 text-xs mt-2">
                        {{errors.title}}
                    </div>
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Description
                    </label>

                    <input
                        v-model="form.description"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="description"
                        id="description"
                        
                    >

                    <div v-if="errors.description" class="text-red-500 text-xs mt-2">
                        {{errors.description}}
                    </div>
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Event Photo
                    </label>

                    <input
                        @change="onFileSelected"
                        class="border border-gray-400 p-2 w-full"
                        type="file"
                        name="photo"
                        id="photo"
                    >

                    <div v-if="errors.photo" class="text-red-500 text-xs mt-2">
                        {{errors.photo}}
                    </div>
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Start Date
                    </label>

                    <input
                        v-model="form.start_date_time"
                        class="border border-gray-400 p-2 w-full"
                        type="datetime-local"
                        name="start_date_time"
                        id="start_date_time"
                        
                    >

                    <div v-if="errors.start_date_time" class="text-red-500 text-xs mt-2">
                        {{errors.start_date_time}}
                    </div>
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Building Number
                    </label>

                    <input
                        v-model="form.building_number"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="building_number"
                        id="building_number"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Street Name
                    </label>

                    <input
                        v-model="form.street"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="street"
                        id="street"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Building Name
                    </label>

                    <input
                        v-model="form.building_name"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="building_name"
                        id="building_name"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        PostCode
                    </label>

                    <input
                        v-model="form.postal_code"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="postal_code"
                        id="postal_code"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        City
                    </label>

                    <input
                        v-model="form.city"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="city"
                        id="city"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        County
                    </label>

                    <input
                        v-model="form.county"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="county"
                        id="county"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Country
                    </label>

                    <input
                        v-model="form.country"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="country"
                        id="country"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Phone Number
                    </label>

                    <input
                        v-model="form.phone"
                        class="border border-gray-400 p-2 w-full"
                        type="tel"
                        name="phone"
                        id="phone"
                    >
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>

                    <input
                        v-model="form.email"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="email"
                        id="email"
                    >

                    <div v-if="errors.email" class="text-red-500 text-xs mt-2">
                        {{errors.email}}
                    </div>
                </div>
                <div>
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Online Event
                    </label>

                    <input
                        v-model="form.is_online"
                        class="border border-gray-400 p-2"
                        type="checkbox"
                        name="is_online"
                        id="is_online"
                        value="0"
                    >
                </div>

                <div>
                    <button type="submit" class="bg-gray-800 text-white rounded py-2 px-4 hover:bg-gray-500">
                       Submit
                    </button>
                </div>
            </form>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';

    export default defineComponent({
        components: {
            AppLayout,
        },
        props: {
            errors: {
                required: true,
                type: Object,
            }
        },
        data() {
            return {
                form: useForm({
                    title: '',
                    description: '',
                    photo: null,
                    start_date_time: '',
                    building_number: null,
                    street: '',
                    building_name: '',
                    postal_code: '',
                    city: '',
                    county: '',
                    country: '',
                    phone: null,
                    email: '',
                    is_online: false,
                }),
            }
        },
        // mounted() {
        //     var autocomplete = new google.maps.places.Autocomplete(
        //     document.getElementById("autocomplete"),
        //     );

        //     autocomplete.setComponentRestrictions({ // restrict the country
        //         country: ["uk"]
        //     });
        // },
        methods: {
            submit() {
                this.form.post('/events')
            },
            onFileSelected(e) {
                console.log(e.target.files[0]);
                this.form.photo = e.target.files[0]; 
            },
        }
    })
</script>

<style>

</style>