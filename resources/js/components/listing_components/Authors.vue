<template>
    <div>
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8" v-if="datashow">
            <div class="py-10 lg:px-8 px-4">
                <div>
                    <h1 class="text-2xl text-black text-center font-bold mb-3">
                        Authors
                    </h1>
                </div>
                <div class="flex justify-between">
                    <!-- <div class="flex items-center "><span class="mr-2">Show</span>
                <input type="text"  class="focus:ring-gray-500 focus:border-gray-500  rounded-0 border-gray-500  block  w-16  text-lg px-3 py-3  sm:text-sm border  " placeholder=""><span class="ml-2">Entries</span>
                </div>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm"><font-awesome-icon icon="fa-solid fa-magnifying-glass" /></span>
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
                        id="myTable"
                    >
                        <thead class="bg-gray-500 text-white text-left">
                            <tr>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left"
                                >
                                    Author Name
                                    <button
                                        @click="descendingData($event)"
                                        ref="authorDownButton"
                                        id="authorDownButton"
                                    >
                                        &#8595;
                                    </button>
                                    <button
                                        @click="ascendingData($event)"
                                        ref="authorUpButton"
                                        id="authorUpButton"
                                    >
                                        &#8593;
                                    </button>
                                </th>

                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Website
                                    <!-- <font-awesome-icon icon="fa-solid fa-arrow-down"  id="sorticon" @click="desecdingData" />
                                      <font-awesome-icon icon="fa-solid fa-arrow-up" id="sorticon" @click="ascendingData"  /> -->
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Nationality
                                    <button
                                        @click="descendingData($event)"
                                        ref="nationalityDownButton"
                                        id="nationalityDownButton"
                                    >
                                        &#8595;
                                    </button>
                                    <button
                                        @click="ascendingData($event)"
                                        ref="nationalityUpButton"
                                        id="nationalityUpButton"
                                    >
                                        &#8593;
                                    </button>
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Twitter
                                    <!-- <font-awesome-icon icon="fa-solid fa-arrow-down"  id="sorticon" @click="desecdingData" />
                                      <font-awesome-icon icon="fa-solid fa-arrow-up" id="sorticon" @click="ascendingData"  /> -->
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Wikipedia
                                    <!-- <font-awesome-icon icon="fa-solid fa-arrow-down"  id="sorticon" @click="desecdingData" />
                                      <font-awesome-icon icon="fa-solid fa-arrow-up" id="sorticon" @click="ascendingData"  /> -->
                                </th>
                                <!-- <th class="px-3 align-middle  py-3 text-sm  font-semibold  ">No. of Articles</th> -->
                            </tr>
                        </thead>
                             <td colspan="30" v-if="SortingLoadershow">
                            <img id="SortingLoader" src="/images/SortingLoader.gif" />
                            </td>
                        <tbody class=" " v-if="aftersorting">
                         
                    
                            <tr v-for="item in response" v-bind:key="item.id">
                                <td
                                    class="align-middle text-xs md:text-base p-3 text-left"
                                >
                                    <a
                                           :href="`/author/${item.id}/${item.author_name.replace(
                                                    / /g,
                                                    '-' )
                                                }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            author(
                                                item.id,
                                                item.author_name.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                    >
                                        {{ item.author_name }}
                                        </a>
                                </td>

                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                >
                                    <div v-if="item.website == null || undefined"> N/A </div>

                                    <div v-else>
                                    <a :href="item.website" class="text-sky-500"
                                        >{{item.website}}</a
                                    >
                                    </div>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                >   
                                <div v-if="item.nationality == null"> N/A</div>
                                <div v-else-if="item.nationality == 'NULL' "> N/A </div>
                                <div v-else> 
                                    {{ item.nationality }}
                                </div>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                >
                                <div v-if="item.twitter == null || undefined"> N/A </div>
                                    <div class="w-40 text-white" v-else>
                                        <a
                                            :href="item.twitter"
                                            class="text-sky-500 break-words"
                                            >{{item.twitter}}</a
                                        >
                                    </div>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                >
                                <div v-if="item.wiki_pedia == null || undefined"> N/A </div>
                                    <div class="w-40 text-white" v-else>
                                        <a
                                            :href="item.wiki_pedia"
                                            class="text-sky-500 break-words"
                                            >{{item.wiki_pedia}}</a
                                        >
                                    </div>
                                </td>
                                <!-- <td class=" align-middle text-xs md:text-base p-3">
                        {{item.articles_count}}
                      </td> -->
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
    name: "Authors",

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
        axios
            .get(`/api/authors?sort=author_name&direction=${this.direction}`)
            .then((res) => {

                this.response = res.data.author.data;
                this.reuse = res.data.author;
                this.totalPage = Math.ceil(
                    this.reuse.total / this.reuse.per_page
                );
                this.loadershow = false; //  loader
                this.datashow = true;
                this.paginateshow = true;
            });
    },
    methods: {
        //pagination data define
        onPageChange(page) {
            this.currentPage = page;
                this.loadershow = true
                this.datashow = false
                window.scrollTo(0,0);
            axios
                .get(
                    `/api/authors?sort=author_name&direction=${this.direction}&page=${page}`
                )
                .then((res) => {
                    this.loadershow = false
                    this.datashow = true
                    this.response = res.data.author.data;
                    this.reuse = res.data.author;
                    this.current_page = res.data.author.current_page;
                });
        },

        author(id, name) {
            this.$router.push({
                name: "author",
                params: { id: id, name: name },
            });
            window.scrollTo(0,0);

        },

        ascendingData(e) {
            if (e.target.id == "authorUpButton") {
                this.SortingLoadershow = true
                this.aftersorting = false
             
                axios
                    .get(`/api/authors?sort=author_name&direction=asc`)
                    .then((res) => {
                        this.SortingLoadershow = false
                        this.aftersorting = true
                        this.response = res.data.author.data;
                        this.reuse = res.data.author;
                        this.direction = "asc";
                        this.$router
                            .replace("/authors?sort=author_name&direction=asc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
                // this.$route.query.direction = 'asc'
            }

            if (e.target.id == "nationalityUpButton") {
                this.SortingLoadershow = true
                this.aftersorting = false
                axios
                    .get(`/api/authors?sort=nationality&direction=asc`)
                    .then((res) => {
                         this.SortingLoadershow = false
                        this.aftersorting = true
                        this.response = res.data.author.data;
                        this.reuse = res.data.author;
                        this.direction = "asc";
                        this.$router
                            .replace("/authors?sort=nationality&direction=asc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }
        },
        descendingData(e) {
            if (e.target.id == "authorDownButton") {
                    this.SortingLoadershow = true
                    this.aftersorting = false

                axios
                    .get(`/api/authors?sort=author_name&direction=desc`)
                    .then((res) => {
                        this.SortingLoadershow = false
                        this.aftersorting = true
                        this.response = res.data.author.data;
                        this.reuse = res.data.author;
                        this.direction = "desc";
                        this.$router
                            .replace("/authors?sort=author_name&direction=desc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }

            if (e.target.id == "nationalityDownButton"){
                    this.SortingLoadershow = true
                    this.aftersorting = false
                axios
                    .get(`/api/authors?sort=nationality&direction=desc`)
                    .then((res) => {
                            this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.author.data;
                        this.reuse = res.data.author;
                        this.direction = "desc";
                        this.$router
                            .replace("/authors?sort=nationality&direction=asc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }
        },
    },
};
</script>
