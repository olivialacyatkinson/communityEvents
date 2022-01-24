<template>
    <app-layout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your Events
            </h2>
        </template>

        <div class="mt-12 mx-6">
            <div class="flex justify-end">
                <jet-button type="button" @click="redirect()">
                    Create Event
                </jet-button>
            </div>

            <div class="my-12 flex-wrap">
                <input class="rounded-md mr-4 mb-4" type="text" placeholder="Search by Title" v-model="searchTitle">
                <input class="rounded-md" type="text" placeholder="Search by City" v-model="searchCity">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
                <div class="sm:col-span-3">
                    <div id="map" style="height: 400px; width: 550px"></div>
                </div>

                <div class="mt-8 sm:mx-0 sm:col-span-2">
                     <ul role="list" class="space-y-6 overflow-y-auto max-h-full">
                        <li v-for="event in events" :key="event.id" class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
                            <Link :href="route('events.show', event.id)">
                                <div class="w-full flex items-center justify-between p-6 space-x-6">
                                    <div class="flex-1 space-y-2">
                                        <h3 class="text-gray-900 text-xl font-medium capitalize">
                                            {{ event.title }}
                                        </h3>
                                        <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">
                                            {{dateTime(event.start_date_time)}}
                                        </span>
                                        <div class="text-sm spacey-1">
                                            <div class="text-gray-500 text-wrap">
                                                {{event.description}}
                                            </div>
                                            <div v-if="event.is_online" class="capitalize text-cyan-700 font-semibold">
                                                <span>Online Event</span>
                                            </div>
                                            <div v-if="event.building_number && event.street && event.postal_code && event.city && !event.is_online" class="capitalize text-cyan-700 font-semibold">
                                                {{event.building_number}} {{event.street}}, {{event.postal_code}}, {{event.city}}
                                            </div>
                                        </div>
                                    </div>
                                    <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" :src="'storage/images/' + event.photo" alt="" />
                                </div>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent, ref } from 'vue';
import JetButton from '@/Jetstream/Button.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link}  from '@inertiajs/inertia-vue3';
import moment from 'moment';

export default defineComponent({
    components: {
        JetButton,
        AppLayout,
        Link,
    },
    props: {
        events: {
            required: true,
            type: Object,
        },
        filters: {
            required: true,
            type: Object,
        }
    },
    data() {
        return {
            searchTitle: ref(this.filters.searchTitle),
            searchCity: ref(this.filters.searchCity),
            map: null,
        }
    },
    mounted() {
        // console.log('vue is created');
        this.initMap();
    },
    methods: {
        redirect() {
            this.$inertia.visit(route('events.create'), { method: 'get' });
        },
        dateTime(value) {
            return moment(value).format("ddd, MMM Do YYYY, h:mm a");
        },
        initMap() {
            this.map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 51.5072, lng: 0.1276 },
                zoom: 8,
            });
            // console.log('map method called')
        }
    },
    watch: {
        searchTitle: function(value) {
            console.log('changed ' + value);
            this.$inertia.get('events', { searchTitle: value }, {
                preserveState: true,
                replace: true
            });
        },

        searchCity: function(value) {
            console.log('changed ' + value);
            this.$inertia.get('events', { searchCity: value }, {
                preserveState: true,
                replace: true
            });
        },
    }
})
</script>

<style>

</style>