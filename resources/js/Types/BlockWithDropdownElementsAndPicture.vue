<script setup>
import { reactive } from 'vue';
import { useForm } from "@inertiajs/vue3";

const dropdownElements = reactive([]);

const addDropdownElement = () => {
    dropdownElements.push({
        heading: '',
        paragraph1: '',
        paragraph2: '',
        link: '',
        link_text: '',
        index: dropdownElements.length + 1,
        active_element: false,
    });
}

const removeDropdownElement = (index) => {
    dropdownElements.splice(index, 1);
}

const buttons = reactive([]);

const addButton = () => {
    buttons.push({
        text: '',
        link: '',
        color: '',
        icon: '',
    });
}

const removeButton = (index) => {
    buttons.splice(index, 1);
}

const form = useForm({
    blockType: 'Block with dropdown elements and picture',
    dropdown: {
        picture: '',
        picture_size: '',
        alt_text: '',
        subheading: '',
        heading_logo: '',
        heading: '',
        element_type: 'dropdown',
        orientation: '',
        main_color: '',
    },
    dropdownElements: [],
    buttons: [],
    blockIndex: 0
});

const submit = () => {
    form.dropdownElements = dropdownElements;
    form.buttons = buttons;
    form.post(route('blocks.create'));
};
</script>

<template>
    <form @submit.prevent="submit">
        <label for="picture">Picture URL:</label><br>
        <input id="picture" v-model="form.dropdown.picture" type="url" /><br>

        <label for="picture_size">Picture size:</label><br>
        <input id="picture_size" v-model="form.dropdown.picture_size" type="number" /><br>

        <label for="alt_text">Alt:</label><br>
        <input id="alt_text" v-model="form.dropdown.alt_text" type="text" /><br>

        <label for="subheading">Subheading:</label><br>
        <input id="subheading" v-model="form.dropdown.subheading" type="text" /><br>

        <label for="heading_logo">Heading logo:</label><br>
        <input id="logo" v-model="form.dropdown.heading_logo" type="url" /><br>

        <label for="heading">Heading:</label><br>
        <input id="heading" v-model="form.dropdown.heading" type="text" required /><br>

        <label for="element_type">Element Type:</label><br>
        <input id="element_type" v-model="form.dropdown.element_type" type="text" readonly /><br>

        <label for="orientation">Orientation:</label><br>
        <input id="orientation_left" v-model="form.dropdown.orientation" type="radio" value="left" />
        <label for="orientation_left">left</label><br>
        <input id="orientation_right" v-model="form.dropdown.orientation" type="radio" value="right" />
        <label for="orientation_right">right</label><br>

        <label for="main_color">Main color:</label><br>
        <input id="main_color" v-model="form.dropdown.main_color" type="color" /><br>

        <h3>Dropdown Elements</h3>
        <div v-for="(element, index) in dropdownElements" :key="index" class="mb-4">
            <label for="heading">Heading:</label><br>
            <input type="text" v-model="element.heading" required /><br>

            <label for="paragraph1">Paragraph 1:</label><br>
            <input type="text" v-model="element.paragraph1" /><br>

            <label for="paragraph2">Paragraph 2:</label><br>
            <input type="text" v-model="element.paragraph2" /><br>

            <label for="link">Element link:</label><br>
            <input type="url" v-model="element.link" /><br>

            <label for="link_text">Link text:</label><br>
            <input type="text" v-model="element.link_text" /><br>

            <label for="index">Index:</label><br>
            <input type="number" v-model="element.index" readonly /><br>

            <label for="active_element">Active element:</label><br>
            <input type="checkbox" v-model="element.active_element" /><br>

            <button type="button" @click="removeDropdownElement(index)">Remove</button>
            <hr>
        </div>

        <button type="button" @click="addDropdownElement">Add Dropdown Element</button>

        <h3>Buttons</h3>
        <div v-for="(button, index) in buttons" :key="index" class="mb-4">
            <label for="text">Button text:</label><br>
            <input type="text" v-model="button.text" required /><br>

            <label for="link">Button link:</label><br>
            <input type="url" v-model="button.link" required /><br>

            <label for="color">Button color:</label><br>
            <input type="color" v-model="button.color" /><br>

            <label for="icon">Button icon:</label><br>
            <input type="url" v-model="button.icon" /><br>

            <button type="button" @click="removeButton(index)">Remove</button>
            <hr>
        </div>

        <button type="button" @click="addButton">Add Button</button>
        <br><br>

        <label for="block_index">Block index:</label><br>
        <input id="block_index" type="number" name="block_index" v-model="form.blockIndex"><br>

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
