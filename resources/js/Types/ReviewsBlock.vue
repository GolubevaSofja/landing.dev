<script setup>
import { reactive } from 'vue';
import { useForm } from "@inertiajs/vue3";

const companies = reactive([
    {
        name: '',
        logo: '',
    },
]);

function addCompany() {
    companies.push({
        name: '',
        logo: '',
    });
}

function removeCompany(index) {
    companies.splice(index, 1);
}

const form = useForm({
    blockType: 'Reviews block',
    review: {
        picture:'',
        comment:'',
        name_surname_position:'',
        stars_number: 0,
    },
    company: [],
    blockIndex: 0
});

const submit = () => {
    form.companies = companies;
    form.post(route('blocks.create'));
};
</script>

<template>
    <form @submit.prevent="submit">
<!--        <br><pre>reviews_blocks table</pre><br>-->

        <label for="picture">Picture:</label><br>
        <input type="url" id="picture" v-model="form.reviews.picture"><br>

        <label for="comment">Comment:</label><br>
        <input id="comment" type="text" v-model="form.reviews.comment" required /><br>

        <label for="name_surname_position">Name surname position:</label><br>
        <input id="name_surname_position" type="text" v-model="form.reviews.name_surname_position" required/><br>

        <label for="stars_number">Stars number:</label><br>
        <input id="stars_number" type="number" v-model="form.reviews.stars_number" required /><br>


<!--        <br><br><pre>companies table</pre><br>-->

        <div v-for="(company, index) in companies" :key="index" class="mb-4">
            <label :for="`name_${index}`">Company name:</label><br>
            <input
                :id="`name_${index}`"
                type="text"
                v-model="company.name"
                required
            ><br>

            <label :for="`logo_${index}`">Company logo:</label><br>
            <input
                :id="`logo_${index}`"
                type="url"
                v-model="company.logo"
                required
            ><br>

            <button type="button" @click="removeCompany(index)">Remove Company</button>
            <hr>
        </div>

        <button type="button" @click="addCompany">Add Company</button>

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
