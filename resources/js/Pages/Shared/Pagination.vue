<template>
  <Component
        :is="link.url ? 'Link' : 'span'"
        v-for="(link, index) in links"
        :key="index"
        :href="link.url"
        v-html="link.label"
        class="px-2"
        :class="{
            'text-gray-500': !link.url,
            'font-bold' : link.active,
        }"
    />
</template>

<script>
import {Link}  from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link
    },
    props: {
        links: {
            required: true,
            type: Array,
        }
    }
}
</script>