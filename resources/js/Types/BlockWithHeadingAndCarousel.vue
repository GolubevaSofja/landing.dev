<script setup>
import { reactive } from 'vue';
import { useForm } from "@inertiajs/vue3";

const carousels = reactive([]);

function addCarousel() {
    carousels.push({
        heading: '',
        paragraph: '',
        link: '',
        picture: '',
    });
}

function removeCarousel(index) {
    carousels.splice(index, 1);
}

const form = useForm({
    blockType: 'Block with heading and carousel',
    headingParagraph: {
        heading: '',
        paragraph: '',
    },
    carousels: [],
    blockIndex: 0
});

const submit = () => {
    form.carousels = carousels;
    form.post(route('blocks.create'));
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>heading_paragraph_blocks table</pre><br>-->

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" v-model="form.headingParagraph.heading"><br>

        <label for="paragraph">Paragraph:</label><br>
        <input id="paragraph" type="text" v-model="form.headingParagraph.paragraph"><br>

        <br><br><p>Carousels</p><br>

        <div v-for="(carousel, index) in carousels" :key="index" class="mb-4">
            <label :for="`heading_${index}`">Carousel heading:</label><br>
            <input
                :id="`heading_${index}`"
                type="text"
                v-model="carousel.heading"
                required
            ><br>

            <label :for="`paragraph_${index}`">Carousel paragraph:</label><br>
            <input
                :id="`paragraph_${index}`"
                type="text"
                v-model="carousel.paragraph"
            ><br>

            <label :for="`link_${index}`">Carousel link:</label><br>
            <input
                :id="`link_${index}`"
                type="url"
                v-model="carousel.link"
            ><br>

            <label :for="`picture_${index}`">Carousel picture:</label><br>
            <input
                :id="`picture_${index}`"
                type="url"
                v-model="carousel.picture"
            ><br>

            <button type="button" @click="removeCarousel(index)">Remove Carousel</button>
            <hr>
        </div>

        <button type="button" @click="addCarousel">Add Carousel</button>

        <br><br>
        <label for="block_index">Block index:</label><br>
        <input id="block_index" type="number" v-model="form.blockIndex"><br>

        <button class="btn-submit" type="submit">Save Block</button>
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
