<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: () => ({
            id: null,
            blockIndex: '',
            paragraph: '',
            imageLinkElements: [{
                picture: '',
                link: '',
                index: '',
            }],
        }),
    },
});
</script>

<template>
    <div class="block-container">
        <p v-if="props.block.paragraph" class="paragraph">{{ props.block.paragraph }}</p>

        <div v-if="props.block.imageLinkElements && props.block.imageLinkElements.length" class="image-link-elements">
            <a
                v-for="(element, index) in props.block.imageLinkElements"
                :key="index"
                :href="element.link"
                :style="{
                    backgroundImage: element.picture ? `url(${element.picture})` : 'none',
                }"
                class="image-link"
            >
            </a>
        </div>
    </div>
</template>

<style scoped>
.block-container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 20px;
    gap: 20px;
}

.paragraph {
    font-size: 2rem;
    font-weight: 400;
    margin: 0;
    color: #333;
    line-height: 1.5;
}

.image-link-elements {
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
    gap: 15px;
}

.image-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 150px;
    height: 150px;
    background-color: #fff;
    color: #333;
    text-decoration: none;
    font-size: 1.5rem;
    font-weight: 500;
    border-radius: 25px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.image-link:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}
</style>
