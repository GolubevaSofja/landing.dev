<script setup>
import { useForm } from "@inertiajs/vue3";
import {defineProps} from "vue";

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: 0,
            footer: {
                picture:'',
                heading:'',
                paragraph:'',
                form_text:'',
                button_text:'',
                button_color:'',
                company_name:'',
                info:'',
                copyrights:'',
            },
        },
    },
});

const form = useForm({
    blockType: 'Footer block',
    footer: props.block.footer,
    blockIndex: props.block.blockIndex,
});

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
<!--        <br><pre>footer_blocks table</pre><br>-->

        <label for="picture>">Picture:</label><br>
        <input type="url" id="picture" v-model="form.footer.picture"><br>

        <label for="heading">Heading:</label><br>
        <input id="heading" type="text" v-model="form.footer.heading"><br>

        <label for="paragraph">Paragraph:</label><br>
        <input id="paragraph" type="text" v-model="form.footer.paragraph"><br>

        <label for="form_text">Form text:</label><br>
        <input type="text" id="form_text" v-model="form.footer.form_text"><br>

        <label for="button_text">Button text:</label><br>
        <input type="text" id="button_text" v-model="form.footer.button_text"><br>

        <label for="button_color">Button color:</label><br>
        <input type="color" id="button_color" v-model="form.footer.button_color"><br>

        <label for="company_name">Company:</label><br>
        <input type="text" id="company_name" v-model="form.footer.company_name"><br>

        <label for="info">Info:</label><br>
        <input type="text" id="info" v-model="form.footer.info"><br>

        <label for="copyrights">Copyrights:</label><br>
        <input type="text" id="copyrights" v-model="form.footer.copyrights"><br>



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
</style>
