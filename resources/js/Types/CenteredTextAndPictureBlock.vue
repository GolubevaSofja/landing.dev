<script setup>
import { useForm } from "@inertiajs/vue3";


const form = useForm({
    blockType: 'Centered text and picture block',
    centeredText: {
        subheading:'',
        heading:'',
        paragraph:'',
        picture:'',
        picture_size:'',
        alt_text:'',
    },
    blockIndex: 0
});

const submit = () => {
    form.post(route('blocks.create'));
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>centered_picture_blocks table</pre><br>-->

        <label for="subheading">Subheading:</label><br>
        <input id="subheading" type="text" v-model="form.centeredText.subheading" /><br>

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" v-model="form.centeredText.heading" required /><br>

        <label for="paragraph">Paragraph:</label><br>
        <input id="paragraph" type="text" v-model="form.centeredText.paragraph" required /><br>

        <label for="picture">Picture URL:</label><br>
        <input id="picture" type="url" v-model="form.centeredText.picture" required /><br>

        <label for="picture_size">Picture size:</label><br>
        <input id="picture_size" type="number" v-model="form.centeredText.picture_size" /><br>

        <label for="alt_text">Alt:</label><br>
        <input id="alt_text" type="text" v-model="form.centeredText.alt_text" /><br>


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
</style>
