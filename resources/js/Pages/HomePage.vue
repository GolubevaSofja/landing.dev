<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';


defineProps({
    blockTypes: {
        type: Array,
        required: true,
    },
    tables: {
        type: Object,
        required: true,
    },
});

</script>

<template>
    <Head title="Homepage" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Landing content</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="p-6 text-gray-900">
                        <h2>Database Tables</h2>
                        <ul>
                            <li v-for="(table, key) in tables" :key="key">
                                {{ key }}: {{ table }}
                            </li>
                        </ul>
                </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
