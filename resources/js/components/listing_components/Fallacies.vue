<template>
    <div>
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8" v-if="datashow">
            <div class="py-10 lg:px-8 px-4">
                <div>
                    <h1 class="text-2xl text-black text-center font-bold mb-3">
                        Fallacies
                    </h1>
                </div>
                <div class="flex justify-between">
                    <!-- <div class="flex items-center "><span class="mr-2">Show</span>
                <input type="text"  class="focus:ring-gray-500 focus:border-gray-500  rounded-0 border-gray-500  block  w-16  text-lg px-3 py-3  sm:text-sm border  " placeholder="" v><span class="ml-2">Entries</span>
                </div>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm"> <font-awesome-icon icon="fa-solid fa-magnifying-glass" /></span>
                    </div>
                    <div class="flex items-center">
                    <input type="text"  class="focus:ring-sky-500 focus:border-sky-500 block border-gray-500   w-96 pr-7 text-lg px-3 py-3 pr-40 sm:text-sm border  " placeholder="">
                    </div>
            </div> -->
                </div>
                <div class="block w-full overflow-x-auto my-8">
                    <!-- Projects table -->
                    <table
                        class="border w-full bg-transparent border-collapse border border-slate-400 table-border"
                     
                    >
                        <thead class="bg-gray-500 text-white text-left">
                            <tr>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold w-64"
                                >
                                    Fallacy
                                    <button
                                        @click="descendingData($event)"
                                        ref="fallacyDownButton"
                                        id="fallacyDownButton"
                                        class="ml-1"
                                    >
                                        &#8595;
                                    </button>
                                    <button
                                        @click="ascendingData($event)"
                                        ref="fallacyUpButton"
                                        id="fallacyUpButton"
                                    >
                                        &#8593;
                                    </button>
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold whitespace-nowrap w-40"
                                >
                                    Code
                                    <button
                                        @click="descendingData($event)"
                                        ref="codeDownButton"
                                        id="codeDownButton"
                                        class=""
                                    >
                                        &#8595;
                                    </button>
                                    <button
                                        @click="ascendingData($event)"
                                        ref="codeUpButton"
                                        id="codeUpButton"
                                    >
                                        &#8593;
                                    </button>
                                </th>

                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold"
                                >
                                    Description
                                    <button
                                        @click="descendingData($event)"
                                        ref="descDownButton"
                                        id="descDownButton"
                                        class=""
                                    >
                                        &#8595;
                                    </button>
                                    <button
                                        @click="ascendingData($event)"
                                        ref="descUpButton"
                                        id="descUpButton"
                                    >
                                        &#8593;
                                    </button>
                                </th>
                            </tr>
                        </thead>
                           <td colspan="3" v-if="SortingLoadershow">
                                     <img id="SortingLoader" src="/images/SortingLoader.gif" />
                            </td>
                        <tbody class=" " v-if="aftersorting">
                            <tr v-for="item in response" v-bind:key="item.id">
                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                >
                                    <a
                                        href=""
                                        class="text-sky-500 cursor-default"
                                        @click="stop_redirection"
                                    >
                                        {{ item.fallacy }}</a
                                    >
                                </td>

                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                >
                                    {{ item.code }}
                                </td>

                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                >
                                    <a href="" class="text-sky-500 cursor-default" @click="stop_redirection">
                                        {{ item.description }}</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div v-if="loadershow">
            <img id="loader" src="/images/placeholder-loading-demo-3.gif" />
        </div>

        <div v-if="paginateshow">
            <Paginate
                :totalPages="totalPage"
                :currentPage="currentPage"
                @pagechanged="onPageChange"
                v-bind:DataLink="reuse"
            />
        </div>
    </div>
</template>

<script>
import Paginate from "../Paginate.vue";
import axios from "axios";

export default {
    name: "Fallacies",
    components: {
        Paginate,
    },

    data() {
        return {
            currentPage: 1,
            response: [],
            reuse: [],
            totalPage: 0,
            loadershow: true,
            datashow: false,
            paginateshow: false,
            direction: "asc",
            SortingLoadershow: false,
            aftersorting: true
        };
    },

    // get the data from API
    async mounted() {
        await axios
            .get(`/api/fallacie?sort=fallacy&direction=${this.direction}`)
            .then((resp) => {
                this.response = resp.data.fallicies.data;
                this.reuse = resp.data.fallicies;
                this.totalPage = Math.ceil(
                    this.reuse.total / this.reuse.per_page
                );
                this.loadershow = false;
                this.datashow = true;
                this.paginateshow = true;
            });
    },
    methods: {
        stop_redirection(e){
                e.preventDefault();
        },
        //pagination data define
        onPageChange(page) {
            this.currentPage = page;
                this.loadershow = true
                this.datashow = false
                window.scrollTo(0,0);
            axios
                .get(
                    `/api/fallacie?sort=fallacy&direction=${this.direction}&page=${page}`
                )
                .then((res) => {
                        this.loadershow = false
                        this.datashow = true
                    this.response = res.data.fallicies.data;
                    this.reuse = res.data.fallicies;
                    this.current_page = this.reuse.current_page;
                });
        },
        ascendingData(e) {
            if (e.target.id == "fallacyUpButton") {
                 this.SortingLoadershow = true
                this.aftersorting = false
                axios
                    .get(`/api/fallacie?sort=fallacy&direction=asc`)
                    .then((res) => {
                          this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.fallicies.data;
                        this.reuse = res.data.fallicies;
                        this.direction = "asc";
                        this.$router
                            .replace("/fallacies?sort=fallacy&direction=asc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }

            if (e.target.id == "codeUpButton") {
                    this.SortingLoadershow = true
                    this.aftersorting = false
                axios
                    .get(`/api/fallacie?sort=code&direction=asc`)
                    .then((res) => {
                            this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.fallicies.data;
                        this.reuse = res.data.fallicies;
                        this.direction = "asc";
                        this.$router
                            .replace("/fallacies?sort=code&direction=asc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }
            if (e.target.id == "descUpButton") {
                    this.SortingLoadershow = true
                    this.aftersorting = false
                axios
                    .get(`/api/fallacie?sort=description&direction=asc`)
                    .then((res) => {
                            this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.fallicies.data;
                        this.reuse = res.data.fallicies;
                        this.direction = "asc";
                        this.$router
                            .replace(
                                "/fallacies?sort=description&direction=asc"
                            )
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }
        },

        descendingData(e) {
            if (e.target.id == "fallacyDownButton") {
                  this.SortingLoadershow = true
                    this.aftersorting = false
                axios
                    .get(`/api/fallacie?sort=fallacy&direction=desc`)
                    .then((res) => {
                            this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.fallicies.data;
                        this.reuse = res.data.fallicies;
                        this.direction = "desc";
                        this.$router
                            .replace("/fallacies?sort=fallacy&direction=desc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }
            if (e.target.id == "codeDownButton") {
                    this.SortingLoadershow = true
                    this.aftersorting = false
                axios
                    .get(`/api/fallacie?sort=code&direction=desc`)
                    .then((res) => {
                            this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.fallicies.data;
                        this.reuse = res.data.fallicies;
                        this.direction = "desc";
                        this.$router
                            .replace("/fallacies?sort=code&direction=desc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }
            if (e.target.id == "descDownButton") {
                   this.SortingLoadershow = true
                    this.aftersorting = false
                axios
                    .get(`/api/fallacie?sort=description&direction=desc`)
                    .then((res) => {
                           this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.fallicies.data;
                        this.reuse = res.data.fallicies;
                        this.direction = "desc";
                        this.$router
                            .replace(
                                "/fallacies?sort=description&direction=desc"
                            )
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }
        },
    },
};
</script>
