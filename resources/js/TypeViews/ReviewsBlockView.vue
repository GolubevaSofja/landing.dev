<script setup>
import { defineProps, computed } from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: () => ({
            id: null,
            blockIndex: '',
            review: {
                picture: '',
                comment: '',
                name_surname_position: '',
                stars_number: '',
            },
            company_id: '',
        }),
    },
    companies: {
        type: Array,
        required: true,
        default: () => [{
            name: '',
            logo: '',
        }],
    },
});

// Находим компанию по company_id
const company = computed(() => {
    return props.companies.find(c => c.id === props.block.company_id) || {name: '', logo: ''};
});
</script>

<template>
    <div class="review-block">
        <img class="review-avatar" :src="props.block.review.picture" alt="Reviewer"/>
        <div class="review-content">
            <div class="review-header">
                <div class="reviewer-info">
                    <span class="reviewer-name">{{ props.block.review.name_surname_position }}</span>
                    <span class="company-info">
            {{ company.name }}
            <img class="company-logo" :src="company.logo" alt="Company Logo"/>
          </span>
                </div>
            </div>
            <div class="review-comment">{{ props.block.review.comment }}</div>
            <div class="review-stars">
                <span v-for="star in props.block.review.stars_number" :key="star" class="star">★</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
.review-block {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding: 16px;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 16px auto;
    max-width: 800px;
}

.review-avatar {
    width: 15em;
    height: 15em;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 16px;
}

.review-content {
    flex: 1;
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
}

.reviewer-info {
    display: flex;
    flex-direction: column;
}

.reviewer-name {
    font-size: 2em;
    font-weight: bold;
    margin-bottom: 6px;
}

.company-info {
    display: flex;
    align-items: center;
    font-size: 1.5em;
    color: #555;
}

.company-logo {
    width: 1.6em;
    height: 1.6em;
    border-radius: 50%;
    object-fit: cover;
    margin-left: 8px;
}

.review-comment {
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
}

.review-stars {
    color: #ffcc00;
    font-size: 2em;
}
</style>
