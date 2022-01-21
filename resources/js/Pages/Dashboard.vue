<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your Events
            </h2>
        </template>

        <div class="mt-12 mx-6">
            <div class="flex justify-end pb-12">
                <jet-button type="button" @click="redirect()">
                    Create Event
                </jet-button>
            </div>

            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <li v-for="event in events.data" :key="event.id" class="col-span-1 flex flex-col bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="flex-1 flex flex-col p-8">
                        <Link :href="route('events.show', event.id)">
                            <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" :src="'storage/images/' + event.photo" alt="" />
                            <h3 class="mt-6 text-gray-900 text-xl font-semibold capitalize">{{ event.title }}</h3>

                            <dl class="mt-1 flex-grow flex flex-col justify-between">
                                <dd class="text-gray-500 text-sm">
                                    <p class="text-cyan-700">{{dateTime(event.start_date_time)}}</p>
                                </dd>
                                <dd v-if="event.building_number && event.street && event.postal_code && event.city && !event.is_online">
                                    {{event.building_number}} {{event.street}}, {{event.postal_code}}, {{event.city}} 
                                </dd>
                            </dl>
                        </Link>
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="w-0 flex-1 flex items-center justify-center">
                                <Link :href="route('events.destroy', event.id)" class="p-2 font-semibold text-red-700">Delete</Link> 
                            </div>

                            <div class="-ml-px w-0 flex-1 flex items-center justify-center">
                                <Link :href="route('events.edit', event.id)" class="p-2 font-semibold text-cyan-700">Edit</Link> 
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="flex justify-center py-12">
                <div v-if="events.data.length > 0">
                    <Pagination :links="events.links" />
                </div>
                <div v-else>
                    <h1>You have no events, select the create event button to create your events.</h1>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import JetButton from '@/Jetstream/Button.vue';
import {Link}  from '@inertiajs/inertia-vue3';
import Pagination from './Shared/Pagination';
import moment from 'moment';

export default defineComponent({
    components: {
        AppLayout,
        JetButton,
        Link,
        Pagination,
    },
    props: {
        events: {
            required: true,
            type: Array,
        },
    },
    methods: {
        redirect() {
            this.$inertia.get(route('events.create'), { method: 'get' });
        },
        dateTime(value) {
            return moment(value).format("ddd, MMM Do YYYY, h:mm a");
        }
    }
})
</script>
