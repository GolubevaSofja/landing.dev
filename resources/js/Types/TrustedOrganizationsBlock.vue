<script setup>
import { reactive } from 'vue';
import { useForm } from "@inertiajs/vue3";

const imageLinkElements = reactive([]);

function addElement() {
    imageLinkElements.push({
        picture: '',
        link: '',
        index: imageLinkElements.length + 1,
    });
}

function removeElement(index) {
    imageLinkElements.splice(index, 1);
}

const form = useForm({
    blockType: 'Trusted organisations block',
    paragraph:'',
    imageLinkElements: [],
    blockIndex: 0
});

const submit = () => {
    form.imageLinkElements = imageLinkElements;
    form.post(route('blocks.create'));
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>paragraph_blocks table</pre><br>-->

        <label for="paragraph">Paragraph:</label><br>
        <input type="text" id="paragraph" v-model="form.paragraph" /><br>


        <br><p>Image link elements</p><br>

        <div v-for="(element, index) in imageLinkElements" :key="index" class="mb-4">
            <label :for="`picture_${index}`">Picture URL:</label><br>
            <input
                :id="`picture_${index}`"
                type="url"
                v-model="element.picture"
                required
            ><br>

            <label :for="`link_${index}`">Link:</label><br>
            <input
                :id="`link_${index}`"
                type="url"
                v-model="element.link"
                required
            ><br>

            <label :for="`index_${index}`">Index:</label><br>
            <input
                :id="`index_${index}`"
                type="number"
                v-model.number="element.index"
                readonly
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
