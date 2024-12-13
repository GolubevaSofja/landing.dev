<script setup>
import { reactive } from 'vue';

const companies = reactive([
    {
        company_name: '',
        company_logo: '',
    },
]);

function addCompany() {
    companies.push({
        company_name: '',
        company_logo: '',
    });
}

function removeCompany(index) {
    if (companies.length > 1) {
        companies.splice(index, 1);
    }
}
</script>

<template>
    <form>
<!--        <br><pre>reviews_blocks table</pre><br>-->

        <label for="picture">Picture:</label><br>
        <input type="url" id="picture" name="picture"><br>

        <label for="comment">Comment:</label><br>
        <input id="comment" type="text" name="comment" required /><br>

        <label for="name_surname_position">Name surname position:</label><br>
        <input id="name_surname_position" type="text" name="name_surname_position" required/><br>

        <label for="stars_number">Stars number:</label><br>
        <input id="stars_number" type="number" name="stars_number" required /><br>


<!--        <br><br><pre>companies table</pre><br>-->

        <div v-for="(company, index) in companies" :key="index" class="mb-4">
            <label :for="`company_name_${index}`">Company name:</label><br>
            <input
                :id="`company_name_${index}`"
                type="text"
                v-model="company.company_name"
                required
            ><br>

            <label :for="`company_logo_${index}`">Company logo:</label><br>
            <input
                :id="`company_logo_${index}`"
                type="url"
                v-model="company.company_logo"
                required
            ><br>

            <button type="button" @click="removeCompany(index)">Remove Company</button>
            <hr>
        </div>

        <button type="button" @click="addCompany">Add Company</button>

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
