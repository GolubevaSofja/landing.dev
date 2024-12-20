<script setup>
import { defineProps, reactive, ref } from 'vue';
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    block: {
        type: Object,
        default: () => ({
            id: null,
            blockIndex: 0,
            review: {
                picture: '',
                comment: '',
                name_surname_position: '',
                stars_number: 0,
            },
            company: null,
            company_id: null,
        }),
    },
    companies: {
        type: Array,
        required: true,
        default: () => [],
    },
});

const form = useForm({
    blockType: 'Reviews block',
    review: props.block.review,
    company: props.block.company,
    company_id: props.block.company_id,
    blockIndex: props.block.blockIndex,
});

const showNewCompanyForm = ref(false);
const newCompany = reactive({
    name: '',
    logo: '',
});

function toggleNewCompanyForm() {
    showNewCompanyForm.value = !showNewCompanyForm.value;
    newCompany.name = '';
    newCompany.logo = '';
}

const submit = () => {
    if (showNewCompanyForm.value) {
        form.company = {...newCompany};
        form.company_id = null;
    } else {
        form.company_id = form.company_id || null;
        form.company = null;
    }

    if (props.block.id) {
        form.post(route('blocks.update', props.block.id));
    } else {
        form.post(route('blocks.create'));
    }
};
</script>

<template>
    <form @submit.prevent="submit">
        <label for="picture">Picture:</label><br>
        <input id="picture" type="url" v-model="form.review.picture"><br>

        <label for="comment">Comment:</label><br>
        <input id="comment" type="text" v-model="form.review.comment" required><br>

        <label for="name_surname_position">Name surname position:</label><br>
        <input id="name_surname_position" type="text" v-model="form.review.name_surname_position" required><br>

        <label for="stars_number">Stars number:</label><br>
        <input id="stars_number" type="number" v-model="form.review.stars_number" required><br>

        <h2>Select Company</h2>
        <select v-model="form.company_id">
            <option
                v-for="company in companies"
                :key="company.id"
                :value="company.id">
                {{ company.name }}
            </option>
        </select>

        <br>
        <button type="button" @click="toggleNewCompanyForm">
            {{ showNewCompanyForm ? 'Cancel New Company' : 'Add New Company' }}
        </button>
        <br>

        <div v-if="showNewCompanyForm" class="mt-4">
            <h3>Add New Company</h3>
            <label for="new_name">Company Name:</label><br>
            <input id="new_name" type="text" v-model="newCompany.name" required><br>

            <label for="new_logo">Company Logo:</label><br>
            <input id="new_logo" type="url" v-model="newCompany.logo" required><br>
        </div>

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
