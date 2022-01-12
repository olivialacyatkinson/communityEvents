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
        </div>
    </app-layout>
</template>


<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button.vue'

export default defineComponent({
    components: {
        AppLayout,
        JetButton,
    },
    methods: {
        redirect() {
            this.$inertia.visit(route('create'), { method: 'get' });
        },
    }
})
</script>
