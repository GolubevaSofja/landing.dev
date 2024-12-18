<script setup>
import {defineProps, reactive} from 'vue';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: 0,
            paragraph: '',
            columnElements: []
        },
    },
});

const form = useForm({
    blockType: 'Block with column elements and pictures',
    columnElements: props.block.columnElements,
    paragraph: props.block.paragraph,
    blockIndex: props.block.blockIndex
});

function addColumnElement() {
    form.columnElements.push({
        picture: '',
        picture_position: '',
        header: '',
        paragraph: '',
        index: props.block.columnElements.length + 1,
        width: ''
    });
}

function removeColumnElement(index) {
    form.columnElements.splice(index, 1);
}
const submit = () => {
    if (props.block.id) {
        form.post(route('blocks.update', props.block.id));
    } else {
        form.post(route('blocks.create'));
    }
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>paragraph_blocks table</pre><br>-->

        <label for="paragraph">Paragraph:</label><br>
        <input type="text" id="paragraph" required v-model="form.paragraph" /><br>

<!--        <br><br><pre>column_elements table</pre><br>-->

        <div v-for="(element, index) in form.columnElements" :key="index" class="mb-4">
            <label :for="`picture-${index}`">Picture:</label><br>
            <input :id="`picture-${index}`" v-model="element.picture" type="url" name="picture" /><br>

            <label :for="`heading-${index}`">Heading:</label><br>
            <input :id="`heading-${index}`" v-model="element.heading" type="text" name="heading" /><br>

            <label :for="`paragraph-${index}`">Paragraph:</label><br>
            <input :id="`paragraph-${index}`" v-model="element.paragraph" type="text" name="paragraph" /><br>

            <label :for="`index-${index}`">Index:</label><br>
            <input :id="`index-${index}`" v-model="element.index" type="number" name="index" readonly /><br>

            <label :for="`width-${index}`">Width:</label><br>
            <input :id="`width-${index}`" v-model="element.width" type="number" name="width" /><br>

            <button type="button" @click="removeColumnElement(index)">Remove</button>
            <hr>
        </div>

        <button type="button" @click="addColumnElement">Add Column Element</button>

<!--        <br><br><pre>end of column_elements table</pre><br>-->

        <br><br>
        <label for="block_index">Block index:</label><br>
        <input id="block_index" type="number" name="block_index" v-model="form.blockIndex" /><br>

        <button type="submit">Submit</button>
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
