<template>
    <div>
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 h-screen">
            <div
                class="text-2xl text-black text-center font-bold mt-5 md:mt-10"
            >
                FAQ
            </div>
            <div class="my-10 lg:w-4/5 mx-auto">
                <div v-for="item in data" v-bind:key="item.id">
                    <button
                        type="button"
                        class="flex justify-between items-center py-5 w-full font-medium text-left border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                        @click="toggleAccordion(item.fquestion)"
                    >
                        <span> {{ item.fquestion }} </span>

                        <svg
                            data-accordion-icon=""
                            :class="
                                isOpen && item.fquestion === selected
                                    ? 'w-6 h-6 shrink-0 rotate-180'
                                    : 'w-6 h-6 shrink-0'
                            "
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                    <div
                        class="py-5 border-b border-gray-200 dark:border-gray-700"
                        v-if="isOpen && item.fquestion === selected"
                    >
                        <p class="mb-2 text-gray-500 dark:text-gray-400">
                            {{ item.fanswer }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "FAQs",
    data() {
        return {
            data: [],
            isOpen: false,
            selected: "",
            svgclass: "w-6 h-6 shrink-0",
            id: 0,
        };
    },
    mounted() {
        axios.get("/api/faq").then((res) => {
            this.data = res.data.faq;
        });
    },
    methods: {
        toggleAccordion(item) {
            item == this.selected
                ? (this.isOpen = !this.isOpen)
                : (this.isOpen = true);
            this.selected = item;
        },
    },
};
</script>
