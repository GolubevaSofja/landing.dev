<script setup>
import {defineProps} from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: '',
            heading: {
                subheading: '',
                heading: '',
            },
            columnElements: [{
                picture: '',
                header: '',
                paragraph: '',
                index: '',
                width: '',
            }],
        },
    },
});
</script>

<template>
    <div class="block-container">
        <div class="block-heading">
            <h2 v-if="props.block.heading.subheading" class="subheading">{{ props.block.heading.subheading }}</h2>
            <h1 v-if="props.block.heading.heading" class="heading">{{ props.block.heading.heading }}</h1>
        </div>

        <div class="columns">
            <div
                v-for="(element, index) in props.block.columnElements"
                :key="element.index || index"
                class="column-element"
                :style="{ flex: element.width || 1 }"
            >
                <img
                    v-if="element.picture"
                    :src="element.picture"
                    class="element-image"
                    alt="element image"
                />
                <h3 v-if="element.header" class="element-header">{{ element.header }}</h3>
                <p v-if="element.paragraph" class="element-paragraph">{{ element.paragraph }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.block-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 20px;
}

.block-heading {
    text-align: left;
}

.subheading {
    font-size: 1.5rem;
    font-weight: 400;
    color: #555;
    margin-bottom: 10px;
}

.heading {
    font-size: 2.5rem;
    font-weight: bold;
    color: #222;
}

.columns {
    display: flex;
    gap: 16px;
    width: 100%;
}

.column-element {
    display: flex;
    flex-direction: column;
    align-items: baseline;
    text-align: center;
    flex: 1;
    padding: 10px;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}

.column-element:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.element-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
    border-radius: 8px;
    object-fit: cover;
}

.element-header {
    font-size: 1.75rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.element-paragraph {
    font-size: 1rem;
    color: #666;
    line-height: 1.5;
}
</style>
