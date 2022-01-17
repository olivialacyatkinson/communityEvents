<template>
    <app-layout title="Create an Event">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Event
            </h2>
        </template>
        <div>
            this is the events page

            form to edit event to store in db

            <form @submit.prevent="update(event)" class="max-w-md mx-auto mt-7">
                <div class="mt-6">
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
                <div class="mt-6">
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
                <div class="mt-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Event Photo
                    </label>

                    <input
                        @change="onFileSelected"
                        class="border border-gray-400 p-2 w-full"
                        type="file"
                        name="photo_url"
                        id="photo_url"
                    >
                </div>
                <div class="mt-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Start Date
                    </label>

                    <input
                        v-model="form.start_date"
                        class="border border-gray-400 p-2 w-full"
                        type="datetime-local"
                        name="start_date"
                        id="start_date"
                        
                    >

                    <div v-if="errors.start_date" class="text-red-500 text-xs mt-2">
                        {{errors.start_date}}
                    </div>
                </div>
                <div class="mt-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Start Time
                    </label>

                    <input
                        v-model="form.start_time"
                        class="border border-gray-400 p-2 w-full"
                        type="datetime-local"
                        name="start_time"
                        id="start_time"
                        
                    >

                    <div v-if="errors.start_time" class="text-red-500 text-xs mt-2">
                        {{errors.start_time}}
                    </div>
                </div>
                <div class="mt-6">
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
                <div class="mt-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Street Name
                    </label>

                    <input
                        v-model="form.building_street_name"
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="building_street_name"
                        id="building_street_name"
                    >
                </div>
                <div class="mt-6">
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
                <div class="mt-6">
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
                <div class="mt-6">
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
                <div class="mt-6">
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
                <div class="mt-6">
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
                <div class="mt-6">
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
                <div class="mt-6">
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

                <div class="mt-6">
                    <button type="submit" class="bg-gray-800 text-white rounded py-2 px-4 hover:bg-gray-500">
                       Update
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
            required: false,
            type: Object,
        },
        event: {
            required: true,
            type: Object,
        },
    },
    data() {
        return {
            form: useForm({
                title: this.event.title,
                description: this.event.description,
                photo_url: '',
                start_date: this.event.start_date,
                start_time: this.event.start_time,
                building_number: this.event.building_number,
                building_street_name: this.event.building_street_name,
                building_name: this.event.building_name,
                postal_code: this.event.postal_code,
                city: this.event.city,
                county: this.event.county,
                country: this.event.country,
                phone: this.event.phone,
                is_online: this.event.is_online,
            }),
        }
    },
    methods: {
        update(event) {
            this.form.put('events.update', event.id)
        },
        onFileSelected(e) {
            console.log(e.target.files[0]);
            this.form.photo_url = e.target.files[0]; 
        },
    }
})
</script>