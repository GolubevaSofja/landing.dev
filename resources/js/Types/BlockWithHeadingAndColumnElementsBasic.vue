<script setup>
import { reactive } from 'vue';
import { useForm } from "@inertiajs/vue3";

const columnElements = reactive([]);

function addColumnElement() {
    columnElements.push({
        picture: '',
        heading: '',
        paragraph: '',
        index: columnElements.length + 1,
        width: '',
    });
}

function removeColumnElement(index) {
    columnElements.splice(index, 1);
}

const form = useForm({
    blockType: 'Block with heading and column elements / basic',
    heading: {
        subheading: '',
        heading: '',
    },
    columnElements: [],
    blockIndex: 0
});

const submit = () => {
    form.columnElements = columnElements;
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

        <br><br><p>Column elements</p><br>

        <div v-for="(element, index) in columnElements" :key="index" class="mb-4">
            <label :for="`picture_${index}`">Picture:</label><br>
            <input
                :id="`picture_${index}`"
                type="url"
                v-model="element.picture"
            ><br>

            <label :for="`heading_${index}`">Heading:</label><br>
            <input
                :id="`heading_${index}`"
                type="text"
                v-model="element.heading"
            ><br>

            <label :for="`paragraph_${index}`">Paragraph:</label><br>
            <input
                :id="`paragraph_${index}`"
                type="text"
                v-model="element.paragraph"
            ><br>

            <label :for="`index_${index}`">Index:</label><br>
            <input
                :id="`index_${index}`"
                type="number"
                v-model="element.index"
                readonly
            ><br>

            <label :for="`width_${index}`">Width:</label><br>
            <input
                :id="`width_${index}`"
                type="number"
                v-model="element.width"
            ><br>

            <button type="button" @click="removeColumnElement(index)">Remove Column Element</button>
            <hr>
        </div>

        <button type="button" @click="addColumnElement">Add Column Element</button>

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
