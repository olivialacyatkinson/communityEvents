<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your events
            </h2>
        </template>

        <div class="pt-12">
        <!-- dashboard page content-->
            <div class="flex justify-end pb-12">
                <jet-button type="button" @click="redirect()">
                    Create Event
                </jet-button>
            </div>
          

            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <li v-for="event in events.data" :key="event.id" class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="flex-1 flex flex-col p-8">
                        <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" :src="'storage/images/' + event.photo_url" alt="" />
                        <h3 class="mt-6 text-gray-900 text-base font-medium capitalize">{{ event.title }}</h3>
                        <dl class="mt-1 flex-grow flex flex-col justify-between">
                            <dd class="text-gray-500 text-sm">
                              <p class="">
                                  {{ event.description }}
                              </p>
                            </dd>
                            <dd>{{event.start_date}}</dd>
                        </dl>
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="w-0 flex-1 flex bg-red-100 items-center justify-center">
                                <!-- can use moemnt to format -->
                                <!-- {{event.start_time}} -->
                                <Link :href="route('events.destroy', event.id)" class="p-2 font-semibold">Delete</Link> 
                            </div>
                            <div class="-ml-px w-0 flex-1 flex bg-green-100 items-center justify-center">
                                <Link :href="route('events.edit', event.id)" class="p-2 font-semibold">Edit</Link> 
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

          <div class="flex justify-center py-12">
          <!-- pagination -->
            <div v-if="events">
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
            this.$inertia.visit(route('events.create'), { method: 'get' });
        },
    }
})
</script>
