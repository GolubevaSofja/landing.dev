<script setup>
import { defineProps } from "vue";

const props = defineProps({
    block: {
        type: Object,
        default: () => ({
            id: null,
            blockIndex: '',
            heading: {
                subheading: '',
                heading: '',
            },
        }),
    },
});
</script>

<template>
    <div class="block-container">
        <div class="block-heading">
            <h2 v-if="props.block.heading.subheading" class="subheading">{{ props.block.heading.subheading }}</h2>
            <h1 v-if="props.block.heading.heading" class="heading">{{ props.block.heading.heading }}</h1>
        </div>
    </div>
</template>

<style scoped>
.block-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;
}

.subheading {
    font-size: 1.5rem;
    font-weight: 400;
    margin-bottom: 5px;
    color: #666;
}

.heading {
    font-size: 3rem;
    font-weight: 700;
    margin: 0;
    color: #333;
}
</style>
