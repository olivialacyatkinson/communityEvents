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

            <!-- <input
                type="text"
                placeholder="Search Event City..."
                class="rounded-md border-2 border-gray-200"
                v-model="search"
            > -->

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
import { defineComponent, ref } from 'vue'
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
        // filters: {
        //     required: false,
        //     type: Object
        // }
    },
    // data() {
    //     return {
    //         search: ref('')
    //     }
    // },
    methods: {
        redirect() {
            this.$inertia.visit(route('create'), { method: 'get' });
        },
    },
    // watch: {
    //     search(value) {
    //         console.log('changed ' + value);
    //         this.$inertia.get('/events', { search: value }, {
    //             preserveState: true,
    //             // replace: true
    //         });
    //     }
    // }
})
</script>

<style>

</style>