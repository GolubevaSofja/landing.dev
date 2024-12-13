<script setup>
import { reactive } from 'vue';

const headBlockElements = reactive([
    // {
    //     element_name: '',
    // },
]);

function addElement() {
    headBlockElements.push({
        element_name: '',
    });
}

function removeElement(index) {
    // if (headBlockElements.length > 1) {
    //     headBlockElements.splice(index, 1);
    // }
    headBlockElements.splice(index, 1);
}
</script>

<template>
    <form>
<!--        <br><pre>head_blocks table</pre><br>-->

        <label for="logo">Logo URL:</label><br>
        <input type="url" id="logo" name="logo" /><br>

        <label for="bg_color">Background color:</label><br>
        <input type="color" id="bg_color" name="bg_color" /><br>

        <label for="font_color">Font color:</label><br>
        <input type="color" id="font_color" name="font_color" /><br>

        <label for="meta_name">Meta Name:</label><br>
        <input type="text" id="meta_name" name="meta_name" /><br>

        <label for="meta_description">Meta Description:</label><br>
        <input type="text" id="meta_description" name="meta_description" /><br>

        <label for="scripts">Scripts:</label><br>
        <input type="text" id="scripts" name="scripts" /><br>


        <br><p>Elements</p><br>

        <div v-for="(element, index) in headBlockElements" :key="index" class="mb-4">
            <label :for="`element_name_${index}`">Element name:</label><br>
            <input
                :id="`element_name_${index}`"
                type="text"
                v-model="element.element_name"
                required
            ><br>

            <button type="button" @click="removeElement(index)">Remove Element</button>
            <hr>
        </div>

        <button type="button" @click="addElement">Add Element</button>

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
