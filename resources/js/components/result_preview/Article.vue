<template>
    <div>
        <div class="mess" v-if="message">
            <p>No record found</p>
        </div>

        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8" v-if="datashow">
            <div class="bg-white text-black">
                <div
                    class="max-w-2xl mx-auto py-10 px-4 grid grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8 lg:grid-cols-2"
                >
                    <div>
                        <div class="bg-white overflow-hidden sm:rounded-lg">
                            <div
                                class=""
                                v-for="list in result"
                                v-bind:key="list.id"
                            >
                                <dl
                                    v-for="item in list.data"
                                    v-bind:key="item.id"
                                >
                                    <div
                                        class="bg-gray-50 px-2 py-5 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-4"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Article Name :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >
                                        <div v-if="item.title == null || undefined"> N/A </div>
                                          <div v-else>  {{ item.title }} </div>
                                        </dd>
                                    </div>
                                    <div
                                        class="px-2 py-5 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-4"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Author :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >
                                        <div v-if="item.articles_authors.length == 0 || null"> N/A </div>
                                            <span v-else
                                                class="mr-3"
                                                v-for="(
                                                    list, i
                                                ) in item.articles_authors"
                                                v-bind:key="i"
                                                ><a
                                                    :href="`/author/${list.id}/${list.author_name.replace(
                                                        / /g,
                                                        '-' )
                                                    }`"
                                                    class="text-sky-500"
                                                    @click.prevent="
                                                        author(
                                                            list.id,
                                                            list.author_name.replace(
                                                                / /g,
                                                                '-'
                                                            )
                                                        )
                                                    "
                                                    >
                                               
                                                  {{`${list.author_name},`}}
                                                    </a>
                                                    </span
                                            >
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-2 py-5 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-4"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Publication :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >

                                        <div v-if="item.publication == null || undefined"> N/A </div>
                                            <div v-else>
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
                                                        item.publication.id,
                                                        item.publication.publication.replace(
                                                            / /g,
                                                            '-'
                                                        )
                                                    )
                                                "
                                                >{{
                                                    item.publication.publication
                                                }}
                                                </a> 
                                            </div>
                                        </dd>
                                    </div>
                                    <div
                                        class="px-2 py-5 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-4"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            URL :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >  
                                        <div v-if="item.url == null || undefined"> N/A </div>
                                        <div v-else>
                                            <a
                                                :href="item.url"
                                                class="text-sky-500"
                                                >{{ item.url }}
                                            </a>
                                        </div>
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-2 py-5 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-4"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Date of Article Published :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >
                                            <div v-if="item.published == null || undefined"> N/A </div>
                                            <div v-else> {{ item.published | formatDate }} </div>
                                        </dd>
                                    </div>
                                    <div
                                        class="px-2 py-5 sm:grid sm:grid-cols-3 sm:gap-3 sm:px-4"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Date of Article Added :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >
                                            <div v-if="item.created_at == null || undefined"> N/A </div>
                                            <div v-else>  {{ item.created_at | formatDate }} </div>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="w-full mb-8">
                            <div>
                                <Pie :totalLikes="totalLikes" :totalDisLikes="totalDisLikes"/> 
                            </div>
                            <!-- <div
                                class="mx-auto w-60 h-60 bg-sky-400 rounded-full border-4 border-sky-700"
                            >
                                <h5 id="fcirclecount">{{ fallacy_length }}</h5>
                            </div> -->
                        </div>
                        <div class="w-full mt-4">
                            <div
                                class="p-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 mb-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Like this article
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    <a
                                        href=""
                                        class="bg-sky-500 text-white active:bg-sky-600 font-bold text-sm px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        @click.prevent="like()"
                                    >
                                        <font-awesome-icon
                                            icon="fa-solid fa-thumbs-up"
                                        />
                                    </a>
                                    <a
                                        href=""
                                        class="ml-2 bg-sky-500 text-white active:bg-sky-600 font-bold text-sm px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        @click.prevent="deslike()"
                                    >
                                        <font-awesome-icon
                                            icon="fa-solid fa-thumbs-down"
                                        />
                                    </a>
                                </dd>
                            </div>

                            <div
                                class="p-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    Number of Fallacies
                                </dt>
                                <dd
                                    class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                >
                                    {{ fallacy_length }}
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ArticlesDiscussionFallacie @fallacie_length="fallacie_length" />
        </div>

        <div v-if="loadershow">
            <img id="loader" src="/images/placeholder-loading-demo-3.gif" />
        </div>
    </div>
</template>

<script scoped>

import axios from "axios";
import Pie from './Pie.vue'

import ArticlesDiscussionFallacie from "./Articles-DiscussionFallacie.vue";

let isAuthenticated = localStorage.getItem("isAuthenticated");
let userid = localStorage.getItem("id");

export default {
    name: "Article",

    data() {
        return {
            result: [],
            fallacy_length: 0,
            loadershow: true,
            datashow: false,
            message: false,
            id: 0,
            totalLikes: 0,
            totalDisLikes: 0,
        };
    },
    components: {
        ArticlesDiscussionFallacie,
        Pie
    },

    // get the data from API
    mounted() {
      
        let id = this.$route.params.id;
        let name = this.$route.params.name;
        this.name = name
        this.id = id;
        axios.get(`/api/article/view/${id}/${name}`).then((res) => {
            this.totalLikes = res.data.like
            this.totalDisLikes = res.data.dislike

            
            this.result = res.data;
            this.loadershow = false;
            
            if (this.result.article.data.length != 0 || !res == undefined){
                this.datashow = true;
            } else {
                this.message = true;
            }
        });
    },
    methods: {
        //defining the routes dynamically on click
        author(id, name) {
            this.$router.push({
                name: "author",
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
        fallacie_length(e) {
            this.fallacy_length = e;
        },
        like() {
            if (isAuthenticated == null) {
                this.$router.push("/login");
            } else if (isAuthenticated == "true") {
                axios
                    .post(
                        `/api/article-like?like_status=1&user_id=${userid}&article_id=${this.id}`
                    )
                    .then((res) => {
                             this.totalLikes = res.data.like
                              this.totalDisLikes = res.data.dislike                    
                    });
            }
        },
        deslike() {
            if (isAuthenticated == null) {
                this.$router.push("/login");
            } else if (isAuthenticated == "true") {
                axios
                    .post(
                        `/api/article-like?like_status=0&user_id=${userid}&article_id=${this.id}`
                    )
                    .then((res) => {

                            this.totalLikes = res.data.like
                            this.totalDisLikes = res.data.dislike
                    });
            }
        },
    },
};
</script>
