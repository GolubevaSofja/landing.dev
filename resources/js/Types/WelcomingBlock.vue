<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    blockType: 'Welcoming block',
    heading: {
        subheading: '',
        heading: '',
    },
    blockIndex: 0
});

const submit = () => {
    form.post(route('blocks.create'));
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>heading_blocks table</pre><br>-->

        <label for="subheading">Subheading:</label><br>
        <input id="subheading" type="text" v-model="form.heading.subheading" /><br>

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" v-model="form.heading.heading" /><br>


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
