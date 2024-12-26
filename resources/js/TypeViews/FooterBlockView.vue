<script setup>
import {defineProps} from "vue";

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: '',
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
</script>

<template>
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-left">
                <div v-if="props.block.footer.picture" class="footer-image-wrapper">
                    <img :src="props.block.footer.picture" alt="Footer image" class="footer-image" />
                </div>

                <div v-if="props.block.footer.paragraph" class="footer-form-wrapper">
                    <p class="footer-paragraph">{{ props.block.footer.paragraph }}</p>
                    <div class="footer-form">
                        <input
                            type="text"
                            :placeholder="props.block.footer.form_text"
                            class="form-input"
                        />
                        <button
                            :style="{ backgroundColor: props.block.footer.button_color }"
                            class="form-button"
                        >
                            {{ props.block.footer.button_text }}
                        </button>
                    </div>
                </div>
            </div>

            <div class="footer-right">
                <h2 v-if="props.block.footer.heading" class="footer-heading">
                    {{ props.block.footer.heading }}
                </h2>
                <p v-if="props.block.footer.company_name" class="footer-company">
                    {{ props.block.footer.company_name }}
                </p>
                <p v-if="props.block.footer.info" class="footer-info">
                    {{ props.block.footer.info }}
                </p>
            </div>
        </div>

        <div v-if="props.block.footer.copyrights" class="footer-copyrights">
            <small>{{ props.block.footer.copyrights }}</small>
        </div>
    </div>
</template>

<style scoped>
.footer-container {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    padding: 2rem;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 2rem;
}

.footer-left,
.footer-right {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.footer-image-wrapper {
    margin-bottom: 2rem;
}

.footer-image {
    max-width: 40%;
    height: auto;
    border-radius: 8px;
}

.footer-form-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.footer-paragraph {
    font-size: 1.25rem;
    color: #333;
    text-align: left;
}

.footer-form {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.form-input {
    flex: 1;
    padding: 0.5rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-button {
    padding: 0.5rem 1rem;
    font-size: 1rem;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-button:hover {
    opacity: 0.9;
}

.footer-right {
    text-align: left;
}

.footer-heading {
    font-size: 2rem;
    font-weight: bold;
}

.footer-company {
    font-size: 1.25rem;
    font-weight: 500;
    color: #555;
}

.footer-info {
    font-size: 1rem;
    color: #777;
}

.footer-copyrights {
    text-align: center;
    font-size: 0.875rem;
    color: #aaa;
    margin-top: 2rem;
}
</style>
