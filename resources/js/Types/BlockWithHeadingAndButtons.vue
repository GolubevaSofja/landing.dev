<script setup>
import { reactive } from 'vue';

const buttons = reactive([]);

function addButton() {
    buttons.push({
        button_text: '',
        button_link: '',
        button_color: '#000000',
        button_icon: '',
    });
}

function removeButton(index) {
    buttons.splice(index, 1);
}
</script>

<template>
    <form>
<!--        <br><pre>heading_paragraph_blocks table</pre><br>-->

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" name="heading"><br>

        <label for="paragraph">Paragraph:</label><br>
        <input id="paragraph" type="text" name="paragraph"><br>

        <br><br><p>Buttons</p><br>

        <div v-for="(button, index) in buttons" :key="index" class="mb-4">
            <label :for="`button_text_${index}`">Button text:</label><br>
            <input
                :id="`button_text_${index}`"
                type="text"
                v-model="button.button_text"
                required
            ><br>

            <label :for="`button_link_${index}`">Button link:</label><br>
            <input
                :id="`button_link_${index}`"
                type="url"
                v-model="button.button_link"
                required
            ><br>

            <label :for="`button_color_${index}`">Button color:</label><br>
            <input
                :id="`button_color_${index}`"
                type="color"
                v-model="button.button_color"
            ><br>

            <label :for="`button_icon_${index}`">Button icon:</label><br>
            <input
                :id="`button_icon_${index}`"
                type="url"
                v-model="button.button_icon"
            ><br>

            <button type="button" @click="removeButton(index)">Remove Button</button>
            <hr>
        </div>

        <button type="button" @click="addButton">Add Button</button>

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
