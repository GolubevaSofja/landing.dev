<script setup>
import { reactive } from 'vue';

const carousels = reactive([]);

function addCarousel() {
    carousels.push({
        carousel_heading: '',
        carousel_paragraph: '',
        carousel_link: '',
        carousel_picture: '',
    });
}

function removeCarousel(index) {
    carousels.splice(index, 1);
}
</script>

<template>
    <form>
<!--        <br><pre>heading_paragraph_blocks table</pre><br>-->

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" name="heading"><br>

        <label for="paragraph">Paragraph:</label><br>
        <input id="paragraph" type="text" name="paragraph"><br>

        <br><br><p>Carousels</p><br>

        <div v-for="(carousel, index) in carousels" :key="index" class="mb-4">
            <label :for="`carousel_heading_${index}`">Carousel heading:</label><br>
            <input
                :id="`carousel_heading_${index}`"
                type="text"
                v-model="carousel.carousel_heading"
                required
            ><br>

            <label :for="`carousel_paragraph_${index}`">Carousel paragraph:</label><br>
            <input
                :id="`carousel_paragraph_${index}`"
                type="text"
                v-model="carousel.carousel_paragraph"
            ><br>

            <label :for="`carousel_link_${index}`">Carousel link:</label><br>
            <input
                :id="`carousel_link_${index}`"
                type="url"
                v-model="carousel.carousel_link"
            ><br>

            <label :for="`carousel_picture_${index}`">Carousel picture:</label><br>
            <input
                :id="`carousel_picture_${index}`"
                type="url"
                v-model="carousel.carousel_picture"
            ><br>

            <button type="button" @click="removeCarousel(index)">Remove Carousel</button>
            <hr>
        </div>

        <button type="button" @click="addCarousel">Add Carousel</button>

        <br><br>
        <label for="block_index">Block index:</label><br>
        <input id="block_index" type="number" name="block_index"><br>
    </form>
</template>

<style scoped>
button {
    margin-top: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
}
button:hover {
    background-color: #45a049;
}
hr {
    border: 1px solid #ccc;
    margin: 20px 0;
}
</style>
