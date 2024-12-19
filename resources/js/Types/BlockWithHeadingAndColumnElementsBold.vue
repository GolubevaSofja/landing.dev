<script setup>
import {defineProps} from 'vue';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: 0,
            heading: {
                subheading: '',
                heading: '',
            },
            columnElements: [],
        },
    },
});

const form = useForm({
    blockType: 'Block with heading and column elements / bold',
    heading: props.block.heading,
    columnElements: props.block.columnElements,
    blockIndex: props.block.blockIndex,
});

function addColumnElement() {
    form.columnElements.push({
        picture: '',
        header: '',
        paragraph: '',
        index: form.columnElements.length + 1,
        width: '',
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
        <!--        <br><pre>heading_blocks table</pre><br>-->

        <label for="subheading">Subheading:</label><br>
        <input id="subheading" type="text" v-model="form.heading.subheading" /><br>

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" v-model="form.heading.heading" /><br>

        <br><br><p>Column elements</p><br>

        <div v-for="(element, index) in form.columnElements" :key="index" class="mb-4">
            <label :for="`picture_${index}`">Picture:</label><br>
            <input
                :id="`picture_${index}`"
                type="url"
                v-model="element.picture"
            ><br>

            <label :for="`header_${index}`">Header:</label><br>
            <input
                :id="`header_${index}`"
                type="text"
                v-model="element.header"
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
