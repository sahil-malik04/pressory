<template>
    <div>
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8" v-if="datashow">
            <div class="py-10 lg:px-8 px-4">
                <div>
                    <h1 class="text-2xl text-black text-center font-bold mb-3">
                        Articles
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
                        id="myTable"
                    >
                        <thead class="bg-gray-500 text-white">
                            <tr>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left"
                                >
                                    Article

                                    <button
                                        @click="descendingData($event)"
                                        ref="articleDownButton"
                                        id="articleDownButton"
                                    >
                                        &#8595;
                                    </button>
                                    <button
                                        @click="ascendingData($event)"
                                        ref="articleUpButton"
                                        id="articleUpButton"
                                    >
                                        &#8593;
                                    </button>
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Author
                                    <!-- <button @click="descendingData($event)"  ref="authorDownButton"  id="authorDownButton"> &#8595;  </button>
                                <button @click="ascendingData($event)"  ref="authorUpButton"  id="authorUpButton" > &#8593;   </button> -->
                                </th>

                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Publication
                                    <!-- <button @click="descendingData($event)"  ref="publicationDownButton" id="publicationDownButton"> &#8595; </button>
                                <button @click="ascendingData($event)"  ref="publicationUpButton" id="publicationUpButton">  &#8593; </button> -->
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Date Article Published
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-left w-48"
                                >
                                    Date Article Added
                                </th>
                            </tr>
                        </thead>
                              <td colspan="30" v-if="SortingLoadershow">
                                     <img id="SortingLoader" src="/images/SortingLoader.gif" />
                            </td>
                        <tbody v-if="aftersorting">
                            <tr v-for="item in response" v-bind:key="item.id">
                                <td
                                    class="align-middle text-xs md:text-base p-3 text-left card"
                                >
                                    <div class="w-60 text-white">
                                        <a
                                           :href="`/article/${item.id}/${item.title
                                                        .replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                                }`"
                                            class="text-sky-500 break-words tooltip"
                                            @click.prevent="article(item.id,item.title
                                                                    .replace(/ /g, '-')
                                                                    .replace(/[ / ]/g, '')
                                                                    .replace('?', '')
                                                                    )"
                                        >
                                            <h6 class="article">
                                                {{
                                                    `${item.title.substring(
                                                        0,
                                                        30
                                                    )}... `
                                                }}
                                            </h6>
                                            <span class="tooltiptext">
                                                {{ item.title }}</span
                                            >
                                        </a>
                                    </div>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                      
                                >
                                    <a
                                            v-for="list in item.articles_authors"
                                            v-bind:key="list.id"
                                         :href="`/author/${list.id}/${list.author_name.replace(
                                                    / /g,
                                                    '-' )
                                                }`"
                                        class="text-sky-500 card"
                                        @click.prevent="
                                            author(
                                                list.id,
                                                list.author_name.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                        >{{ `${list.author_name}, ` }}</a
                                    >
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3 card"
                                >
                                    <a
                                          :href="`/publication/${item.publication_id}/${item.publication.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                                }`"
                                        class="text-sky-500"
                                        v-if="
                                            item.publication != null ||
                                            undefined
                                        "
                                        @click.prevent="
                                            publication(
                                                item.publication_id,
                                                item.publication.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                    >
                                        {{ item.publication.publication }}
                                        </a>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3 card"
                                >
                                    {{ item.published | formatDate }}
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3 card"
                                    v-if="item.created_at != null || undefined"
                                >
                                    {{ item.created_at | formatDate }}
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
const API = "/api/article";

export default {
    name: "Articles",
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
            .get(`/api/article?sort=title&direction=${this.direction}`)
            .then((resp) => {
                this.response = resp.data.articles.data;
                this.reuse = resp.data.articles;
                this.totalPage = Math.ceil(
                    this.reuse.total / this.reuse.per_page
                ); // formula to calculate the number of pages required
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
                    `/api/article?sort=title&direction=${this.direction}&page=${page}`
                )
                .then((res) => {
                    this.loadershow = false
                    this.datashow = true
                    this.response = res.data.articles.data;
                    this.reuse = res.data.articles;
                    this.current_page = res.data.articles.current_page;
                });
        },

        article(id, name) {
            this.$router.push({
                name: "article",
                params: { id: id, name: name },
            });
            window.scrollTo(0,0);

        },
        publication(id, name) {
            this.$router.push({
                name: "publication",
                params: { id: id, name: name },
            });
            window.scrollTo(0,0);

        },
        author(id, name) {
            this.$router.push({
                name: "author",
                params: { id: id, name: name },
            });
            window.scrollTo(0,0);

        },

        ascendingData(e) {
              
            if (e.target.id == "articleUpButton") {
                 this.SortingLoadershow = true
                this.aftersorting = false
                axios
                    .get(`/api/article?sort=title&direction=asc`)
                    .then((res) => {
                            this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.articles.data;
                        this.reuse = res.data.articles;

                        this.direction = "asc";
                        this.$router
                            .replace("/articles?sort=title&direction=asc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }

            if (e.target.id == "authorUpButton") {
                axios
                    .get(`/api/authors?sort=articles_authors&direction=asc`)
                    .then((res) => {
                        // console.log(this.response)
                        // this.response = res.data.author.data
                    });
            }

            if (e.target.id == "publicationUpButton") {
                axios
                    .get(`/api/publication?sort=publication&direction=asc`)
                    .then((res) => {
                        // this.response = res.data.publication.data
                        //  console.log(this.response)
                    });
            }
        },
        descendingData(e) {
            if (e.target.id == "articleDownButton") {
                   this.SortingLoadershow = true
                    this.aftersorting = false
                axios
                    .get(`/api/article?sort=title&direction=desc`)
                    .then((res) => {
                            this.SortingLoadershow = false
                            this.aftersorting = true
                        this.response = res.data.articles.data;
                        this.reuse = res.data.articles;
                        this.direction = "desc";
                        this.$router
                            .replace("/articles?sort=title&direction=desc")
                            .catch(() => {});
                        this.currentPage = 1;
                    });
            }

            if (e.target.id == "authorDownButton") {
                axios
                    .get(`/api/authors?sort=articles_authors&direction=desc`)
                    .then((res) => {
                        // this.response = res.data.author.data
                        //  console.log(this.response)
                    });
            }

            if (e.target.id == "publicationDownButton") {
                axios
                    .get(`/api/publication?sort=publication&direction=desc`)
                    .then((res) => {
                        // this.response = res.data.publication.data
                        //  console.log(this.response)
                    });
            }
        },
    },
};
</script>
