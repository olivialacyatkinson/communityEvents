<template>
    <app-layout title="CreateEvents">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a new Event
            </h2>
        </template>
        <div>
            this is the events page

            form to create event to store in db
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'

    export default defineComponent({
        components: {
            AppLayout,
        },
    })
</script>

<style>

</style>