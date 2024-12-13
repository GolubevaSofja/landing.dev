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
        width: ''
    });
}

function removeColumnElement(index) {
    columnElements.splice(index, 1);
}

const form = useForm({
    //
});

const submit = () => {
    //
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>paragraph_blocks table</pre><br>-->

        <label for="paragraph">Paragraph:</label><br>
        <input type="text" id="paragraph" required /><br>

<!--        <br><br><pre>column_elements table</pre><br>-->

        <div v-for="(element, index) in columnElements" :key="index" class="mb-4">
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
        <input id="block_index" type="number" name="block_index" /><br>

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
