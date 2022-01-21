<template>
    <app-layout title="Event Information">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                Event
            </h2>
        </template>

        <div class="pt-12">
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
                <article>
                    <div>
                        <img class="h-32 w-full object-cover lg:h-48" :src="'storage/images/' + event.photo" alt="" />
                    </div>

                    <div class="mt-12">
                        <div class="flex justify-between items-center">
                            <h1 class="text-3xl font-semibold text-cyan-700 capitalize">
                                {{ event.title }}
                            </h1>

                            <div class="space-x-4">
                                <jet-button type="button" @click="editEvent(event)">
                                    Edit
                                </jet-button>
                                <jet-button type="button" @click="deleteEvent(event)" class="bg-red-500 hover:bg-red-900 focus:ring focus:ring-red-900">
                                    Delete
                                </jet-button>
                            </div>
                        </div>
                       
                        <div class="m-4">
                            <p class="text-sm text-gray-500 leading-4 ml-4 mt-2">{{ event.description }}</p>
                        </div>

                        <div class="mt-24 mx-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
                           <div class="bg-white border border-white rounded-md shadow-md p-6 text-center">
                               <!-- fix v-if -->
                                <div v-if="!event.is_online" class="text-sm ml-2 text-gray-500">
                                    <p>{{ event.building_number }} {{ event.street }}</p>
                                    <p>{{ event.building_name }}</p>
                                    <p>{{ event.postal_code }}</p>
                                    <p>{{ event.city }}</p>
                                    <p>{{ event.county }}</p>
                                    <p>{{ event.country }}</p>
                                </div>
                                <div v-else class="text-sm text-gray-400 text-semibold">
                                    Online Event, no need for an adress.
                                </div>
                           </div>

                            <div class="bg-white border border-white rounded-md shadow-md p-6 flex-wrap space-y-4 text-center">
                                <div>
                                    <p class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">
                                        {{ dateTime(event.start_date_time) }}
                                    </p>
                                </div>

                                <div>
                                    <span v-if="event.is_online" class="text-sm text-green-500 text-semibold">
                                        Online Event 
                                        <!-- add icon for a tick -->
                                    </span>
                                    <span v-else class="text-sm text-gray-400 text-semibold">
                                        Not An Online Event
                                    </span>
                                </div>
                            </div>
                        
                           <div class="bg-white border border-white rounded-md shadow-md p-6 text-center space-y-4 text-sm text-cyan-700">
                                <p>
                                    <!-- add icon -->
                                     {{ event.phone }}
                                </p>
                                <p>
                                    <!-- add icon -->
                                     {{ event.email }}
                                </p>
                           </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import {Link}  from '@inertiajs/inertia-vue3';
import moment from 'moment';

export default defineComponent({
    components: {
        AppLayout,
        JetButton,
        Link,
    },
    props: {
        event: {
            required: true,
            type: Object,
        },
    },
    methods: {
        dateTime(value) {
            return moment(value).format("ddd, MMM Do YYYY, h:mm a");
        },
        editEvent(event) {
            this.$inertia.visit(route('events.edit', event.id), { method: 'get' });
        },
        deleteEvent(event) {
            this.$inertia.visit(route('events.destroy', event.id), { method: 'get' });
        },
    }
})
</script>