<script setup>
import {defineProps} from "vue";

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: '',
            centeredText: {
                subheading:'',
                heading:'',
                paragraph:'',
                picture:'',
                picture_size:'',
                alt_text:'',
            },
        },
    },
});
</script>

<template>
    <div class="centered-text-block">
        <div v-if="props.block.centeredText.subheading" class="subheading">
            {{ props.block.centeredText.subheading }}
        </div>

        <h1 v-if="props.block.centeredText.heading" class="heading">
            {{ props.block.centeredText.heading }}
        </h1>

        <p v-if="props.block.centeredText.paragraph" class="paragraph">
            {{ props.block.centeredText.paragraph }}
        </p>

        <div v-if="props.block.centeredText.picture" class="picture-wrapper">
            <img
                :src="props.block.centeredText.picture"
                :alt="props.block.centeredText.alt_text || 'Image'"
                :style="{ width: props.block.centeredText.picture_size + '%' || 'auto' }"
                class="centered-picture"
            />
        </div>
    </div>
</template>

<style scoped>
.centered-text-block {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 1.5rem;
    padding: 2rem;
}

.subheading {
    font-size: 1.25rem;
    font-weight: 400;
    color: #555;
}

.heading {
    font-size: 2.5rem;
    font-weight: bold;
    color: #000;
}

.paragraph {
    font-size: 1.5rem;
    font-weight: 400;
    color: #333;
    line-height: 1.75;
}

.picture-wrapper {
    display: flex;
    justify-content: center;
    width: 100%;
}

.centered-picture {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
}
</style>
