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
                <li v-for="event in events" :key="event.id" v-text="event.name"></li>
            </ul>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import JetButton from '@/Jetstream/Button.vue'

export default defineComponent({
    components: {
        JetButton,
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

<style>

</style>