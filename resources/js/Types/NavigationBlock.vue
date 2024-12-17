<script setup>
import { reactive } from 'vue';
import { useForm } from "@inertiajs/vue3";

const headBlockElements = reactive([]);

function addElement() {
    headBlockElements.push({
        name: '',
    });
}

function removeElement(index) {
    headBlockElements.splice(index, 1);
}

const form = useForm({
    blockType: 'Navigation block',
    headBlock: {
        logo:'',
        bg_color:'',
        font_color:'',
        meta_name:'',
        meta_description:'',
        scripts:'',
    },
    headBlockElements: [],
    blockIndex: 0
});

const submit = () => {
    form.headBlockElements = headBlockElements;
    form.post(route('blocks.create'));
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>head_blocks table</pre><br>-->

        <label for="logo">Logo URL:</label><br>
        <input type="url" id="logo" v-model="form.headBlock.logo" /><br>

        <label for="bg_color">Background color:</label><br>
        <input type="color" id="bg_color" v-model="form.headBlock.bg_color" /><br>

        <label for="font_color">Font color:</label><br>
        <input type="color" id="font_color" v-model="form.headBlock.font_color" /><br>

        <label for="meta_name">Meta Name:</label><br>
        <input type="text" id="meta_name" v-model="form.headBlock.meta_name" /><br>

        <label for="meta_description">Meta Description:</label><br>
        <input type="text" id="meta_description" v-model="form.headBlock.meta_description" /><br>

        <label for="scripts">Scripts:</label><br>
        <input type="text" id="scripts" v-model="form.headBlock.scripts" /><br>


        <br><p>Elements</p><br>

        <div v-for="(element, index) in headBlockElements" :key="index" class="mb-4">
            <label :for="`name_${index}`">Element name:</label><br>
            <input
                :id="`name_${index}`"
                type="text"
                v-model="element.name"
                required
            ><br>

            <button type="button" @click="removeElement(index)">Remove Element</button>
            <hr>
        </div>

        <button type="button" @click="addElement">Add Element</button>

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
