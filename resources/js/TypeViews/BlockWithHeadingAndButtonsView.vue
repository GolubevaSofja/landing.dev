<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: '',
            headingParagraph: {
                heading: '',
                paragraph: '',
            },
            buttons: [{
                text: '',
                link: '',
                color: '',
                icon: '',
            }],
        },
    },
});
</script>

<template>
    <div class="block-container">
        <div class="heading-paragraph">
            <h1 v-if="props.block.headingParagraph.heading">{{ props.block.headingParagraph.heading }}</h1>
            <p v-if="props.block.headingParagraph.paragraph">{{ props.block.headingParagraph.paragraph }}</p>
        </div>

        <div v-if="props.block.buttons && props.block.buttons.length" class="button-container">
            <a
                v-for="(button, index) in props.block.buttons"
                :key="index"
                :href="button.link"
                :style="{
                    backgroundColor: button.color,
                    backgroundImage: button.icon ? `url(${button.icon})` : 'none',
                }"
                class="button"
            >
                {{ button.text }}
            </a>
        </div>
    </div>
</template>

<style scoped>
.block-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 1.5rem;
    padding: 1rem;
}

.heading-paragraph {
    text-align: left;
}

.heading-paragraph h1 {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.heading-paragraph p {
    font-size: 1.5rem;
    line-height: 1.75;
}

.button-container {
    display: flex;
    justify-content: flex-start;
    gap: 15px;
    flex-wrap: wrap;
}

.button {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: 500;
    color: #fff;
    text-decoration: none;
    border-radius: 25px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    min-width: 150px;
    height: 50px;
}

.button:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}
</style>
