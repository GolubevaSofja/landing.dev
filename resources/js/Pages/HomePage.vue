<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps, reactive, ref } from 'vue';
import NavigationBlock from "@/Types/NavigationBlock.vue";
import InitialBlock from "@/Types/InitialBlock.vue";
import WelcomingBlock from "@/Types/WelcomingBlock.vue";
import TrustedOrganizationsBlock from "@/Types/TrustedOrganizationsBlock.vue";
import CenteredTextAndPictureBlock from "@/Types/CenteredTextAndPictureBlock.vue";
import BlockWithDropdownElementsAndPicture from "@/Types/BlockWithDropdownElementsAndPicture.vue";
import BlockWithHeadingAndColumnElementsBasic from "@/Types/BlockWithHeadingAndColumnElementsBasic.vue";
import BlockWithHeadingAndColumnElementsBold from "@/Types/BlockWithHeadingAndColumnElementsBold.vue";
import BlockWithColumnElementsAndPictures from "@/Types/BlockWithColumnElementsAndPictures.vue";
import TimelineBlock from "@/Types/TimelineBlock.vue";
import ReviewsBlock from "@/Types/ReviewsBlock.vue";
import BlockWithHeadingAndCarousel from "@/Types/BlockWithHeadingAndCarousel.vue";
import BlockWithHeadingAndButtons from "@/Types/BlockWithHeadingAndButtons.vue";
import FooterBlock from "@/Types/FooterBlock.vue";
import Backgrounds from "@/Types/Backgrounds.vue";

defineProps({
    blockTypes: {
        type: Array,
        required: true,
    },
    message: {
        type: String,
        required: false,
    },
    companies: {
        type: Array,
        required: true,
        default: () => [],
    },
});

const blockComponents = {
    "Block with column elements and pictures": BlockWithColumnElementsAndPictures,
    "Block with dropdown elements and picture": BlockWithDropdownElementsAndPicture,
    "Block with heading and buttons": BlockWithHeadingAndButtons,
    "Block with heading and carousel": BlockWithHeadingAndCarousel,
    "Block with heading and column elements / basic": BlockWithHeadingAndColumnElementsBasic,
    "Block with heading and column elements / bold": BlockWithHeadingAndColumnElementsBold,
    "Centered text and picture block": CenteredTextAndPictureBlock,
    "Footer block": FooterBlock,
    "Initial block": InitialBlock,
    "Navigation block": NavigationBlock,
    "Reviews block": ReviewsBlock,
    "Timeline block": TimelineBlock,
    "Trusted organisations block": TrustedOrganizationsBlock,
    "Welcoming block": WelcomingBlock,
};

const selectedBlock = ref(null);

// const addedBlocks = reactive([]);
//
// function addBlock() {
//     if (selectedBlock) {
//         addedBlocks.push(selectedBlock.value);
//     }
// }


</script>

<template>
    <Head title="Homepage" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Landing content</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="p-6 text-gray-900">

                       <div v-if="message" class="bg-lime-100 p-4 rounded-sm mb-4">{{ message }}</div>

                       <h2>Block types</h2>

                       <select name="blockTypes" id="blockTypes" v-model="selectedBlock">
                           <option
                               v-for="block in blockTypes"
                               :key="block.id"
                               :value="block.type">
                               {{ block.type }}
                           </option>
                       </select>

                       <br><br>

                       <h3>Selected Block:</h3><br>
                       <div v-if="selectedBlock">
                           <component :is="blockComponents[selectedBlock]" v-bind="{ companies }" />
                       </div>


                </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
select {
    margin-bottom: 1rem;
}

.btn-submit {
    padding: 0.5rem 1rem;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-submit:hover {
    background-color: #218838;
}
</style>
