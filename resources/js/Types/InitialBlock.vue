<script setup>
import {reactive} from 'vue';
import {useForm} from "@inertiajs/vue3";

const buttons = reactive([]);

const addButton = () => {
    buttons.push({
        text: '',
        link: '',
        color: '',
        icon: '',
    });
}

function removeButton(index) {
    buttons.splice(index, 1);
}

const form = useForm({
    blockType: 'Initial block',
    headingParagraph: {
        heading: '',
        paragraph: '',
    },
    buttons: [],
    blockIndex: 0
});

const submit = () => {
    form.buttons = buttons;
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

        <br><br>
        <p>Buttons</p><br>

        <div v-for="(button, index) in buttons" :key="index" class="mb-4">
            <label :for="`text_${index}`">Button text:</label><br>
            <input
                :id="`text_${index}`"
                type="text"
                v-model="button.text"
                required
            ><br>

            <label :for="`link_${index}`">Button link:</label><br>
            <input
                :id="`link_${index}`"
                type="url"
                v-model="button.link"
                required
            ><br>

            <label :for="`color_${index}`">Button color:</label><br>
            <input
                :id="`color_${index}`"
                type="color"
                v-model="button.color"
            ><br>

            <label :for="`icon_${index}`">Button icon:</label><br>
            <input
                :id="`icon_${index}`"
                type="url"
                v-model="button.icon"
            ><br>

            <button type="button" @click="removeButton(index)">Remove Button</button>
            <hr>
        </div>

        <button type="button" @click="addButton">Add Button</button>

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
