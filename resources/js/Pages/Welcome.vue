<script setup>
import { Head, Link } from '@inertiajs/vue3';
import BlockWithColumnElementsAndPicturesView from "@/TypeViews/BlockWithColumnElementsAndPicturesView.vue";
import BlockWithDropdownElementsAndPictureView from "@/TypeViews/BlockWithDropdownElementsAndPictureView.vue";
import BlockWithHeadingAndButtonsView from "@/TypeViews/BlockWithHeadingAndButtonsView.vue";
import BlockWithHeadingAndCarouselView from "@/TypeViews/BlockWithHeadingAndCarouselView.vue";
import BlockWithHeadingAndColumnElementsBoldView from "@/TypeViews/BlockWithHeadingAndColumnElementsBoldView.vue";
import BlockWithHeadingAndColumnElementsBasicView from "@/TypeViews/BlockWithHeadingAndColumnElementsBasicView.vue";
import CenteredTextAndPictureBlockView from "@/TypeViews/CenteredTextAndPictureBlockView.vue";
import FooterBlockView from "@/TypeViews/FooterBlockView.vue";
import InitialBlockView from "@/TypeViews/InitialBlockView.vue";
import NavigationBlockView from "@/TypeViews/NavigationBlockView.vue";
import ReviewsBlockView from "@/TypeViews/ReviewsBlockView.vue";
import TimelineBlockView from "@/TypeViews/TimelineBlockView.vue";
import TrustedOrganizationsBlockView from "@/TypeViews/TrustedOrganizationsBlockView.vue";
import WelcomingBlockView from "@/TypeViews/WelcomingBlockView.vue";

const props = defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    landingView: {
        type: Array,
        required: true,
        default: () => [],
    },
    blockTypes: {
        type: Array,
        required: true,
        default: () => [],
    },
    companies: {
        type: Array,
        required: true,
        default: () => [],
    },
});

const blockComponents = {
    "Block with column elements and pictures": BlockWithColumnElementsAndPicturesView,
    "Block with dropdown elements and picture": BlockWithDropdownElementsAndPictureView,
    "Block with heading and buttons": BlockWithHeadingAndButtonsView,
    "Block with heading and carousel": BlockWithHeadingAndCarouselView,
    "Block with heading and column elements / basic": BlockWithHeadingAndColumnElementsBasicView,
    "Block with heading and column elements / bold": BlockWithHeadingAndColumnElementsBoldView,
    "Centered text and picture block": CenteredTextAndPictureBlockView,
    "Footer block": FooterBlockView,
    "Initial block": InitialBlockView,
    "Navigation block": NavigationBlockView,
    "Reviews block": ReviewsBlockView,
    "Timeline block": TimelineBlockView,
    "Trusted organisations block": TrustedOrganizationsBlockView,
    "Welcoming block": WelcomingBlockView,
};

const getComponentType = (blockTypeID) => {

    // Найти блок по ID
    const blockType = props.blockTypes.find((type) => type.id === blockTypeID);
    if (!blockType) {
        console.warn("No blockType found for blockTypeID:", blockTypeID);
        return null;
    }

    // Найти компонент по типу
    const component = blockComponents[blockType.type];
    if (!component) {
        console.warn("No component found for block type:", blockType.type);
        return null;
    }

    return component;
};


</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2">
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('homepage')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <template v-for="(block, index) in landingView" :key="index">
<!--                        <div>-->
<!--                            <p>Block ID: {{ block.data.id }}</p>-->
<!--                            <p>Block Type ID: {{ block.data.blockTypeID }}</p>-->
<!--                            <p>Component Type: {{ getComponentType(block.data.blockTypeID) }}</p>-->
<!--                        </div>-->
                        <component
                            v-if="getComponentType(block.data.blockTypeID)"
                            :is="getComponentType(block.data.blockTypeID)"
                            :block="block.data"
                            :companies="companies"
                        />
                        <br><br>
                    </template>

                </main>

<!--                <footer class="py-16 text-center text-sm text-black dark:text-white/70">-->
<!--                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})-->
<!--                </footer>-->
            </div>
        </div>
    </div>
</template>
