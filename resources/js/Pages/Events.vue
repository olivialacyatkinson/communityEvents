<template>
    <app-layout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your events
            </h2>
        </template>
        <div>
            this is the events page

            - event map
            - event add button -> redirects to new route to create event
            - filtering

            <jet-button type="button" @click="redirect()">
                Create Event
            </jet-button>

            <ul>
                <li v-for="event in events" :key="event.id" class="flex space-x-4 grid grid-cols-2">
                    <div>
                        Event Title: {{event.title}}
                    </div>
                    <div>
                        Event City: {{event.city}}
                    </div>
                    <!-- need to fix photo problem -->
                    <div>
                        Event image: <img :src="event.photo_url">
                    </div>
                </li>
            </ul>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        JetButton,
        AppLayout,
    },
    props: {
        events: {
            required: true,
            type: Object,
        },
    },
    methods: {
        redirect() {
            this.$inertia.visit(route('events.create'), { method: 'get' });
        },
    },
})
</script>

<style>

</style>