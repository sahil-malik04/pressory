<template>
    <div>
        <div class="mess" v-if="message">
            <p>No record found</p>
        </div>

        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8" v-if="datashow">
            <div class="py-10 lg:px-8 px-4">
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
                        v-if="datashow"
                    >
                        <thead class="bg-gray-500 text-white">
                            <tr>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-center"
                                >
                                    Result
                                </th>
                                <th
                                    class="px-3 align-middle py-3 text-sm font-semibold text-center"
                                >
                                    Result Category
                                </th>
                            </tr>
                        </thead>
                        <tbody class=" ">
                            <tr
                                v-for="item in response.data"
                                v-bind:key="item.id"
                            >
                                <td
                                    class="align-middle text-xs md:text-base p-3 text-center"
                                    v-if="search_by == 'publication'"
                                >
                                    <a
                                         :href="`/publication/${item.id}/${item.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                                }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openResult(
                                                item.id,
                                                item.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                    >
                                        {{ item.publication }}</a
                                    >
                                </td>

                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                    v-else-if="search_by == 'article'"
                                >
                                    <a
                                            :href="`/article/${item.id}/${item.title.replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                            }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openResult(
                                                item.id,
                                                item.title
                                                        .replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                            )
                                        "
                                    >
                                        {{ item.title }}</a
                                    >
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                    v-else-if="search_by == 'author'"
                                >
                                    <a
                                         :href="`/author/${item.id}/${item.author_name.replace(
                                                    / /g,
                                                    '-' )
                                                }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openResult(
                                                item.id,
                                                item.author_name.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                    >
                                        {{ item.author_name }}</a
                                    >
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3"
                                    v-else-if="search_by == 'url'"
                                >
                                    <a
                                          :href="`/article/${item.id}/${item.title.replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                            }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openResult(
                                                item.id,
                                                item.title.replace(/ /g, '-')
                                                            .replace(/[ / ]/g, '')
                                                            .replace('?', '')
                                                )
                                            
                                        "
                                    >
                                        {{ item.url }}</a
                                    >
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3 text-center"
                                    v-if="search_by == 'publication'"
                                >
                                    <a
                                            :href="`/publication/${item.id}/${item.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                                }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openCategory(
                                                item.id,
                                                item.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                    >
                                        publication
                                    </a>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3 text-center"
                                    v-if="search_by == 'article'"
                                >
                                    <a
                                            :href="`/article/${item.id}/${item.title.replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                            }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openCategory(
                                                item.id,
                                                item.title.replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                            )
                                        "
                                    >
                                        article
                                    </a>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3 text-center"
                                    v-if="search_by == 'author'"
                                >
                                    <a
                                          :href="`/author/${item.id}/${item.author_name.replace(
                                                    / /g,
                                                    '-' )
                                                }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openCategory(
                                                item.id,
                                                item.author_name.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                    >
                                        author
                                    </a>
                                </td>
                                <td
                                    class="align-middle text-xs md:text-base p-3 text-center"
                                    v-if="search_by == 'url'"
                                >
                                    <a
                                          :href="`/article/${item.id}/${item.title.replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                            }`"
                                        class="text-sky-500"
                                        @click.prevent="
                                            openCategory(
                                                item.id,
                                                item.title.replace(/ /g, '-')
                                                        .replace(/[ / ]/g, '')
                                                        .replace('?', '')
                                                )
                                            
                                        "
                                    >
                                        url
                                    </a>
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
import axios from "axios";
import Paginate from '../Paginate.vue'

export default {
    name: "SearchModule",
    data() {
        return {
            currentPage: 1,
            response: [],
            search_by: "",
            keyword: "",
            totalPage: 0,
            reuse: [],
            loadershow: true,
            datashow: false,
            message: false,
            paginateshow: false
        };
    },
    components:{
        Paginate
    },

    mounted() {
        let keyword = this.$route.query.keyword;
        let search_by = this.$route.query.search_by;
        axios
            .get(`/api/search?keyword=${keyword}&search_by=${search_by}`)
            .then((res) => {
                this.response = res.data.result;
                this.reuse = res.data.result
                this.search_by = search_by;
                this.totalPage = Math.ceil(this.reuse.total / this.reuse.per_page);


                this.loadershow = false;

                if (this.response.data.length != 0 || undefined) {
                    this.datashow = true;
                    this.paginateshow = true
                } else {
                    this.message = true;
                }
            });
    },
    methods: {
           onPageChange(page) {
            this.currentPage = page;
                this.loadershow = true
                this.datashow = false
                window.scrollTo(0,0);
                    let keyword = this.$route.query.keyword;
                    let search_by = this.$route.query.search_by;

            axios.get(`/api/search?keyword=${keyword}&search_by=${search_by}&page=${page}`).then((res) => {
                this.loadershow = false
                this.datashow = true
                this.response = res.data.result;
                this.reuse = res.data.result
                this.current_page = res.data.result.current_page;
            });
        },
        openResult(id, name) {
            if (this.search_by == "article") {
                this.$router.push({
                    name: "article",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            } else if (this.search_by == "publication") {
                this.$router.push({
                    name: "publication",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            } else if (this.search_by == "author") {
                this.$router.push({
                    name: "author",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            } else if (this.search_by == "url") {
                this.$router.push({
                    name: "article",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            }
        },
        openCategory(id, name) {
            if (this.search_by == "article") {
                this.$router.push({
                    name: "article",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            } else if (this.search_by == "publication") {
                this.$router.push({
                    name: "publication",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            } else if (this.search_by == "author") {
                this.$router.push({
                    name: "author",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            } else if (this.search_by == "url") {
                this.$router.push({
                    name: "article",
                    params: { id: id, name: name },
                });
                window.scrollTo(0,0);
            }
        },
    },
};
</script>
