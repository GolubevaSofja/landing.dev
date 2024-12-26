<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import {defineProps} from "vue";

defineProps({
    blocks: {
        type: Array,
        required: true,
    },
    message: {
        type: String,
        required: false,
    },
});

const deleteBlock = (id) => {
    if (confirm("Are you sure you want to delete this block?")) {
        router.delete(`/blocks/${id}`, {
                preserveScroll: true,
                preserveState: true,
        })
    }
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    <div v-if="message" class="bg-lime-100 p-4 rounded-sm mb-4">{{ message }}</div>
                        <div v-if="blocks.length">
                            <div class="p-6 text-gray-900">Blocks:</div>
                            <table class="w-full p-4 text-left">
                                <thead>
                                <tr>
                                    <th class="p-4">ID</th>
                                    <th class="p-4">Type</th>
                                    <th class="p-4">Index</th>
                                    <th class="p-4">Created</th>
                                    <th class="p-4">Updated</th>
                                    <th class="p-4">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="block in blocks" :key="block.id">
                                    <td class="p-4">{{ block.id }}</td>
                                    <td class="p-4">{{ block.type }}</td>
                                    <td class="p-4">{{ block.index }}</td>
                                    <td class="p-4">{{ block.created_at }}</td>
                                    <td class="p-4">{{ block.updated_at }}</td>
                                    <td>
                                        <a class="py-1 px-2 rounded-md bg-amber-50 mr-4 border-amber-400 border" :href="`/blocks/${block.id}/edit`">Edit</a>
                                        <button @click="deleteBlock(block.id)" class="py-1 px-2 rounded-md bg-red-50 border-red-400 border">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-else class="p-6 text-gray-900">No blocks yet</div>
                    </div>
                    </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
