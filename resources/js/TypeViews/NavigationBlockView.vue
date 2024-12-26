<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: () => ({
            id: null,
            blockIndex: '',
            headBlock: {
                logo: '',
                bg_color: '',
                font_color: '',
            },
            headBlockElements: [{
                name: '',
            }],
        }),
    },
});
</script>

<template>
    <header
        :style="{
            backgroundColor: props.block.headBlock.bg_color,
            color: props.block.headBlock.font_color,
        }"
        class="navigation-panel"
    >
        <div v-if="props.block.headBlock.logo" class="navigation-logo">
            <img :src="props.block.headBlock.logo" alt="Logo" />
        </div>

        <nav v-if="props.block.headBlockElements && props.block.headBlockElements.length" class="navigation-elements">
            <ul>
                <li v-for="(element, index) in props.block.headBlockElements" :key="index">
                    {{ element.name }}
                </li>
            </ul>
        </nav>
    </header>
</template>

<style scoped>
.navigation-panel {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navigation-logo img {
    max-height: 40px;
    object-fit: contain;
}

.navigation-elements ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.navigation-elements li {
    margin-left: 20px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: color 0.3s ease;
}

.navigation-elements li:hover {
    color: rgba(255, 255, 255, 0.8);
}
</style>
