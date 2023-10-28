<template>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex mb-20 pt-8">
            <div
                class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
            >
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        {{ " " }}
                        <span class="font-medium">{{ DataLink.from }}</span>
                        {{ " " }}
                        to
                        {{ " " }}
                        <span class="font-medium">{{ DataLink.to }}</span>
                        {{ " " }}
                        of
                        {{ "" }}
                        <span class="font-medium">{{ DataLink.total }}</span>
                        {{ " " }}
                        results
                    </p>
                </div>
            </div>

            <div aria-label="Pagination">
                <ul
                    class="pagination relative z-0 inline-flex rounded-md -space-x-px"
                >
                    <li class="pagination-item">
                        <!-- First button -->
                        <button
                            :class="isInFirstPage ? 'mx-2 py-2 opacity-40' : 'mx-2 py-2' "
                            type="button"
                            @click="onClickFirstPage"
                            :disabled="isInFirstPage"
                        >
                            First
                        </button>
                    </li>

                    <!-- previous icon  -->
                    <li
                        class="relative inline-flex items-center px-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                    >
                        <button
                            type="button"
                            @click="onClickPreviousPage"
                            :disabled="isInFirstPage"
                            :class="isInFirstPage ? 'opacity-40' : '' "
                        >
                            <svg
                                class="h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>

                            <!-- <ChevronLeftIcon class="relative inline-flex items-center px-0 py-1 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-dark-500 hover:bg-gray-50" aria-hidden="true" /> -->
                        </button>
                    </li>

                    <li
                        v-for="page in pages"
                        :key="page.name"
                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center border text-sm font-medium"
                    >
                        <button
                            id="innerNumbers"
                            type="button"
                            @click="onClickPage(page.name)"
                            :disabled="page.isDisabled"
                            :class="{ active: isPageActive(page.name) }"
                        >
                            {{ page.name }}
                        </button>
                    </li>

                    <!-- ... -->

                    <!-- Visible Buttons End -->
                    <li
                        class="relative inline-flex items-center px-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                    >
                        <button
                            type="button"
                            @click="onClickNextPage"
                            :disabled="isInLastPage"
                            :class="isInLastPage ? 'opacity-40' : ''"
                        >
                            <svg
                                class="h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </li>

                    <li class="pagination-item">
                        <button
                            :class="isInLastPage ? 'mx-2 py-2 opacity-40' : 'mx-2 py-2'"
                            type="button"
                            @click="onClickLastPage"
                            :disabled="isInLastPage"
                        >
                            Last
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { ChevronLeftIcon, ChevronRightIcon } from "@vue-hero-icons/solid";
export default {
    name: "Paginate",

    components: {
        ChevronLeftIcon,
        ChevronRightIcon,
    },

    computed: {
        startPage() {
            // When on the first page
            if (this.currentPage === 1) {
                return 1;
            }

            // When on the last page
            if (this.currentPage === this.totalPages) {
                // return this.totalPages - this.maxVisibleButtons;
            }

            // When inbetween
            return this.currentPage - 1;
        },
        pages() {
            const range = [];

            for (
                let i = this.startPage;
                i <=
                Math.min(
                    this.startPage + this.maxVisibleButtons,
                    this.totalPages
                );
                i++
            ) {
                range.push({
                    name: i,
                    isDisabled: i === this.currentPage,
                });
            }

            return range;
        },
        isInFirstPage() {
            return this.currentPage === 1;
        },
        isInLastPage() {
            return this.currentPage === this.totalPages;
        },
    },

    methods: {
        onClickFirstPage() {
            this.$emit("pagechanged", 1);
        },
        onClickPreviousPage() {
            this.$emit("pagechanged", this.currentPage - 1);
        },
        onClickPage(page) {
            this.$emit("pagechanged", page);
        },
        onClickNextPage() {
            this.$emit("pagechanged", this.currentPage + 1);
        },
        onClickLastPage() {
            this.$emit("pagechanged", this.totalPages);
        },
        isPageActive(page) {
            return this.currentPage === page;
        },
    },

    props: {
        DataLink: [],
        maxVisibleButtons: {
            type: Number,
            required: false,
            default: 2,
        },
        totalPages: {
            type: Number,
            required: true,
        },
        currentPage: {
            type: Number,
            required: true,
        },
    },
};
</script>

<style>
.pagination {
    list-style-type: none;
}

.pagination-item {
    display: inline-block;
}

.active {
    border: 1px solid #0ea5e9;
    color: #0ea5e9;
    background: #f0f9ff;
}
#innerNumbers {
    padding: 8px 14px;
}
</style>
