<template>
    <div>

        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8" v-if="datashow">
            <div>
                <div class="grid grid-cols-12 gap-4 my-8">
                    <div
                        class="col-span-6 md:col-span-4 lg:col-span-3 text-left overflow-hidden shadow border border-gray-100 bg-white rounded"
                        v-for="items in response"
                        v-bind:key="items.id"
                    >
                        <div
                            v-if="
                                (items.publication != null &&
                                    items.publication.image != null) ||
                                ''
                            "
                        >
                            <img
                             @click.prevent="
                                    article(
                                        items.id,
                                        items.title
                                            .replace(/ /g, '-')
                                            .replace('/,/g', '')
                                            .replace('?', '')
                                            .replace(/ %2 /g, '')
                                    )"
                                :src="`/storage/publication/${items.publication.image}`"
                                class="w-full h-30 md:h-40 bg-cover bg-center cursor-pointer"
                            />
                        </div>
                        <div v-else>
                            <img
                             @click.prevent="
                                    article(
                                        items.id,
                                        items.title
                                            .replace(/ /g, '-')
                                            .replace('/,/g', '')
                                            .replace('?', '')
                                            .replace(/ %2 /g, '')
                                )"
                                src="/images/no-publication.png"
                                class="w-full h-30 md:h-40 bg-cover bg-center cursor-pointer"
                            />
                        </div>

                        <div class="p-3 md:p-4">
                            <!-- <span v-for="list in items.articles_authors" v-bind:key="list.id"> -->
                            <a
                                  :href="`/article/${items.id}/${items.title.replace(/ /g, '-')
                                                                    .replace('/,/g', '')
                                                                    .replace('?', '')
                                                                    .replace(/ %2 /g, '')

                                                }`"
                                class="font-semibold text-xs md:text-lg tooltip"
                                @click.prevent="
                                    article(
                                        items.id,
                                        items.title
                                            .replace(/ /g, '-')
                                            .replace(/[ / ]/g, '')
                                            .replace('?', '')
                                    )
                                "
                                ><h6 class="article">
                                    {{ `${items.title.substring(0, 30)}... ` }}
                                </h6>
                                <span class="tooltiptext">
                                    {{ items.title }}</span
                                >
                            </a>
                            <!-- </span> -->
                            <div
                                v-for="list in items.articles_authors"
                                v-bind:key="list.id"
                            >
                                <a
                                      :href="`/author/${list.id}/${list.author_name.replace(
                                                        / /g,
                                                        '-' )
                                                        }`"
                                    class="text-base"
                                    @click.prevent="
                                        author(
                                            list.id,
                                            list.author_name.replace(/ /g, '-')
                                        )
                                    "
                                    ><h6 class="author bg-gray-50 border-gray-100 border-b-2"> 
                                        {{ list.author_name }}
                                    </h6>
                                </a>
                            </div>

                            <!-- <div v-for="links,i in items.publication" v-bind:key="i"  >  {{links.id}} </div> -->
                            <div v-if="items.publication != null || undefined">
                                <a 
                                 :href="`/publication/${items.publication_id}/${items.publication.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                                }`" 
                                class="text-base">
                                    <h6
                                        class="publication"
                                        @click.prevent="
                                            publication(
                                                items.publication_id,
                                                items.publication.publication.replace(
                                                    / /g,
                                                    '-'
                                                )
                                            )
                                        "
                                    >
                                        {{ items.publication.publication }}
                                    </h6></a
                                >
                            </div>
                            
                            <button
                                class="rounded-md mt-3 bg-gray-200 text-black py-1 px-2 block mb-2 text-xs md:text-sm homedate"
                                v-if="items.created_at != null || undefined"
                            >
                                {{ items.created_at | formatDate }}
                            </button>
                        </div>
                    </div>
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
import Paginate from "./Paginate.vue";
const API = "/api/home";

export default {
    name: "Home",
    components: {
        Paginate,
    },

    data() {
        return {
            currentPage: 1,
            response: [],
            reuse: [],
            totalPage: 0,
            article_id: "",
            loadershow: true,
            datashow: false,
            paginateshow: false,
            image: false,
            imagesrc: "",
        };
    },

    // get the data from API

    mounted() {
        axios.get(API).then((resp) => {
            this.response = resp.data.HomeData.data;
            this.reuse = resp.data.HomeData;
            this.totalPage = Math.ceil(this.reuse.total / this.reuse.per_page);
            this.loadershow = false;
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
            axios.get(`/api/home?page=${page}`).then((res) => {
                this.loadershow = false
                this.datashow = true
                this.response = res.data.HomeData.data;
                this.reuse = res.data.HomeData;
                this.current_page = res.data.HomeData.current_page;
            });
        },

        //defining the routes dynamically on click
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
    },
};
</script>
