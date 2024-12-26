<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: () => ({
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
        }),
    },
});
</script>

<template>
    <div class="content-block">
        <h1 v-if="props.block.headingParagraph.heading" class="content-heading">
            {{ props.block.headingParagraph.heading }}
        </h1>

        <p v-if="props.block.headingParagraph.paragraph" class="content-paragraph">
            {{ props.block.headingParagraph.paragraph }}
        </p>

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
.content-block {
    text-align: center;
    padding: 20px;
}

.content-heading {
    font-size: 4rem;
    font-weight: bold;
    margin-bottom: 10px;
    line-height: 1.2;
}

.content-paragraph {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #555;
}

.button-container {
    display: flex;
    justify-content: center;
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
