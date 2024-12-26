<script setup>
import {defineProps} from 'vue';

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
            carousels: [{
                heading: '',
                paragraph: '',
                link: '',
                picture: '',
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

        <div class="carousel">
            <div
                v-for="(carousel, index) in props.block.carousels"
                :key="index"
                class="carousel-item"
            >
                <a
                    v-if="carousel.link"
                    :href="carousel.link"
                    class="carousel-link"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <div class="carousel-content">
                        <h2 v-if="carousel.heading" class="carousel-heading">{{ carousel.heading }}</h2>
                        <p v-if="carousel.paragraph" class="carousel-paragraph">{{ carousel.paragraph }}</p>
                        <img
                            v-if="carousel.picture"
                            :src="carousel.picture"
                            :alt="carousel.heading || 'Carousel Image'"
                            class="carousel-image"
                        />
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<style scoped>
.block-container {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.heading-paragraph {
    text-align: left;
    padding: 1rem;
}

.heading-paragraph h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
}

.heading-paragraph p {
    font-size: 1.25rem;
    line-height: 1.5;
}

.carousel {
    display: flex;
    overflow-x: auto;
    overflow-y: hidden;
    gap: 1rem;
    white-space: nowrap;
    scroll-snap-type: x mandatory;
}

.carousel-item {
    flex: 0 0 auto;
    width: 240px;
    scroll-snap-align: center;
    box-sizing: border-box;
}

.carousel-link {
    text-decoration: none;
    color: inherit;
    display: block;
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 1rem;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.carousel-link:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.carousel-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.carousel-heading {
    font-size: 1.5rem;
    font-weight: bold;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.carousel-paragraph {
    font-size: 1rem;
    color: #555;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: normal;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

.carousel-image {
    max-width: 100%;
    height: auto;
    margin-top: 0.5rem;
    border-radius: 4px;
}
</style>
