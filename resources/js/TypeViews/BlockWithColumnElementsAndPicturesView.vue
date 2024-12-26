<script setup>
import {defineProps} from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: '',
            paragraph: '',
            columnElements: [{
                picture: '',
                picture_position: '',
                header: '',
                paragraph: '',
                index: '',
                width: ''
            }],
        },
    },
});
</script>

<template>
    <div class="block-container">
        <p>{{ props.block.paragraph }}</p>

        <div class="columns">
            <div
                v-for="(column, index) in props.block.columnElements"
                :key="index"
                class="column"
                :style="{ width: column.width }"
            >
                <img
                    v-if="column.picture"
                    :src="column.picture"
                    alt="image"
                    class="column-image"
                />
                <h3>{{ column.header }}</h3>
                <p>{{ column.paragraph }}</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.block-container {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 30px;
    padding: 20px;
}

.block-container > p {
    font-size: 1.75rem;
    color: #444;
    line-height: 1.8;
    margin: 0;
    text-align: right;
}

.columns {
    display: flex;
    gap: 20px;
    width: 100%;
    justify-content: flex-end;
}

.column {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    text-align: right;
    padding: 20px;
    border-radius: 12px;
    background-color: #f9f9f9;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    transition: none;
}

.column:hover {
    transform: none;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
}

.column-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px;
    border-radius: 8px;
    object-fit: cover;
}

.column h3 {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.column p {
    font-size: 1.25rem;
    color: #555;
    line-height: 1.6;
}
</style>
