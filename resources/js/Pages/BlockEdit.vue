<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps, ref } from 'vue';
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

const props = defineProps({
    block: {
        type: Object,
        required: true,
    },
    blockType: {
        type: String,
        required: true,
    },
    blockTypes: {
        type: Array,
        required: true,
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

</script>

<template>
    <Head title="BlockEdit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Block</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <component :is="blockComponents[props.blockType]" :blockType="blockType" :block="props.block" v-bind="{ companies }"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
