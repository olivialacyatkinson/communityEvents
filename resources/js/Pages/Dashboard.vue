<template>
<!-- page shown when u log in -->
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your events
            </h2>
        </template>

        <div>
        <!-- dashboard page content-->
            welcome to your dashboard page 

            <jet-button type="button" @click="redirect()">
                Create Event
            </jet-button>

            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <li v-for="event in events.data" :key="event.id" class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="flex-1 flex flex-col p-8">
                        <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" :src="event.photo_url" alt="" />
                        <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ event.title }}</h3>
                        <dl class="mt-1 flex-grow flex flex-col justify-between">
                            <!-- <dt class="sr-only">Title</dt> -->
                            <dd class="text-gray-500 text-sm">{{ event.description }}</dd>
                            <!-- <dt class="sr-only">Role</dt> -->
                            <!-- <dd class="mt-3">
                                <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{ event.role }}</span>
                            </dd> -->
                        </dl>
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="w-0 flex-1 flex">
                            <!-- <a :href="`mailto:${person.email}`" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                            <MailIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                            <span class="ml-3">Email</span>
                            </a> -->
                            {{event.start_date}}
                            {{event.start_time}}
                        </div>
                        <div class="-ml-px w-0 flex-1 flex">
                            <!-- <a :href="`tel:${person.telephone}`" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                            <PhoneIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                            <span class="ml-3">Call</span>
                            </a> -->
                            <Link :href="'/events/' + event.id + 'edit'" class="" >Edit</Link> 
                            <!-- link  to edit the event future ref -->
                        </div>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- pagination -->
            <div>
                <Pagination :links="events.links"/>
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
            required: false,
            type: Array,
        }
    },
    methods: {
        redirect() {
            this.$inertia.visit(route('create'), { method: 'get' });
        },
    }
})
</script>
