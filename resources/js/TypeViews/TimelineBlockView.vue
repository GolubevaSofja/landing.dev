<script setup>
import { defineProps, ref, onMounted } from 'vue';

const props = defineProps({
    block: {
        type: Object,
        default: {
            id: null,
            blockIndex: '',
            dropdown: {
                picture: '',
                picture_size: '',
                alt_text: '',
                subheading: '',
                heading_logo: '',
                heading: '',
                element_type: '',
                orientation: '',
                main_color: '',
            },
            dropdownElements: [
                {
                    heading: '',
                    paragraph1: '',
                    paragraph2: '',
                    link: '',
                    link_text: '',
                    index: '',
                    active_element: '',
                },
            ],
            buttons: [{
                text: '',
                link: '',
                color: '',
                icon: '',
            }],
        },
    },
});

const activeIndex = ref(null);

const toggleDropdown = (index) => {
    activeIndex.value = activeIndex.value === index ? null : index;
};

onMounted(() => {
    const activeElement = props.block.dropdownElements.findIndex(element => element.active_element);
    if (activeElement !== -1) {
        activeIndex.value = activeElement;
    }
});
</script>

<template>
    <div class="block-container">
        <div class="dropdown-heading">
            <h3 class="subheading" v-if="props.block.dropdown.subheading">
                {{ props.block.dropdown.subheading }}
            </h3>
            <div class="heading-with-logo">
                <img
                    v-if="props.block.dropdown.heading_logo"
                    :src="props.block.dropdown.heading_logo"
                    alt="Heading Logo"
                    class="heading-logo"
                />
                <h2 class="heading">{{ props.block.dropdown.heading }}</h2>
            </div>
        </div>

        <div
            class="dropdown-content-wrapper"
            :class="props.block.dropdown.orientation === 'right' ? 'reverse' : ''"
        >
            <div class="timeline-content">
                <div class="timeline">
                    <div class="timeline-line"></div>
                    <div
                        v-for="(element, index) in props.block.dropdownElements"
                        :key="index"
                        class="timeline-item"
                        :class="{ active: activeIndex === index }"
                        @click="toggleDropdown(index)"
                    >
                        <div
                            class="timeline-marker"
                            :style="{
                                backgroundColor: activeIndex === index
                                    ? props.block.dropdown.main_color
                                    : '#ccc'
                            }"
                        ></div>
                        <div class="timeline-element-content">
                            <h4>{{ element.heading }}</h4>
                            <div v-if="activeIndex === index" class="dropdown-content">
                                <p>{{ element.paragraph1 }}</p>
                                <p>{{ element.paragraph2 }}</p>
                                <a v-if="element.link" :href="element.link" class="dropdown-link">
                                    {{ element.link_text || 'Read more' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timeline-buttons-spacing"></div>

                <div v-if="props.block.buttons && props.block.buttons.length" class="button-container">
                    <a
                        v-for="(button, index) in props.block.buttons"
                        :key="index"
                        :href="button.link"
                        :style="{
                            backgroundColor: button.color,
                            backgroundImage: button.icon ? `url(${button.icon})` : 'none',
                        }"
                        class="button"
                    >
                        {{ button.text }}
                    </a>
                </div>
            </div>

            <div class="dropdown-image">
                <img
                    v-if="props.block.dropdown.picture"
                    :src="props.block.dropdown.picture"
                    :alt="props.block.dropdown.alt_text || 'Image'"
                    :style="{ width: props.block.dropdown.picture_size || 'auto' }"
                />
            </div>
        </div>
    </div>
</template>

<style scoped>
.block-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.dropdown-heading {
    text-align: left;
}

.subheading {
    font-size: 1.5rem;
    color: #555;
    margin-bottom: 10px;
}

.heading-with-logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.heading-logo {
    max-height: 2rem;
    object-fit: contain;
}

.heading {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
}

.dropdown-content-wrapper {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.dropdown-content-wrapper.reverse {
    flex-direction: row-reverse;
}

.timeline-content {
    flex: 1;
    position: relative;
}

.timeline {
    display: flex;
    flex-direction: column;
    gap: 20px;
    position: relative;
    padding-left: 20px;
}

.timeline-line {
    position: absolute;
    top: 0;
    left: 7px;
    width: 2px;
    height: 100%;
    background-color: #ccc;
    z-index: 1;
}

.timeline-item {
    display: flex;
    align-items: flex-start;
    position: relative;
    cursor: pointer;
    margin-left: 10px;
}

.timeline-marker {
    width: 20px;
    height: 20px;
    border: 3px solid #fff;
    border-radius: 50%;
    position: absolute;
    left: -10px;
    z-index: 2;
    transition: background-color 0.3s;
}

.timeline-item.active .timeline-marker {
    border-color: #fff;
}

.timeline-element-content {
    padding-left: 40px;
}

.timeline-element-content h4 {
    font-size: 1.25rem;
    margin: 0;
}

.dropdown-content {
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid #ddd;
}

.dropdown-link {
    color: inherit;
    text-decoration: underline;
}

.dropdown-image {
    flex: 1;
}

.dropdown-image img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    object-fit: cover;
}

.button-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
}

.button {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: 500;
    color: #fff;
    text-decoration: none;
    border-radius: 25px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    min-width: 150px;
    height: 50px;
}

.button:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.timeline-buttons-spacing {
    margin-top: 30px;
}
</style>
