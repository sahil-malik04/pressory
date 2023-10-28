<template>
    <div>
           <div class="mess"  v-if="message">
                 <p>No record found</p>
            </div>
     
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8" v-if="datashow">
            <div class="bg-white">
                <div
                    class="max-w-2xl mx-auto py-10 px-4 grid grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8 lg:grid-cols-3"
                >
                    <div class="lg:col-span-2">
                        <div class="bg-white overflow-hidden sm:rounded-lg">
                            <div class="">
                                <dl>
                                    <div
                                        class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Author :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >   
                                        
                                            {{ result.author_name }}
                                        </dd>
                                    </div>
                                    <div
                                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Website :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-sky-500 sm:mt-0 sm:col-span-2"
                                        >
                                        <div v-if="result.website == null || undefined"> N/A </div>
                                        <div v-else> <a :href="result.website"> {{ result.website }} </a> </div>
                                        </dd>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Nationality :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"
                                        >
                                        <div v-if="result.nationality == null || undefined"> N/A </div>
                                        <div v-else-if="result.nationality == 'NULL' "> N/A </div>
                                        <div v-else> {{ result.nationality }} </div>
                                        </dd>
                                    </div>
                                    <div
                                        class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Twitter :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-sky-500  sm:mt-0 sm:col-span-2"
                                        >
                                        <div v-if="result.twitter == null || undefined"> N/A </div>
                                        <div v-else> <a :href="result.twitter"> {{ result.twitter }} </a> </div>

                                        </dd>
                                    </div>
                                    <div
                                        class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
                                    >
                                        <dt
                                            class="text-sm font-medium text-gray-500"
                                        >
                                            Wikipedia :
                                        </dt>
                                        <dd
                                            class="mt-1 text-sm text-sky-500  sm:mt-0 sm:col-span-2"
                                        >
                                        <div v-if="result.wiki_pedia == null || undefined"> N/A </div>
                                        <div v-else> <a :href="result.wiki_pedia"> {{ result.wiki_pedia }} </a> </div>

                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div v-if="image">
                        <img
                            :src="`/storage/author/${result.image}`"
                            alt="Walnut card tray with white powder coated steel divider and 3 punchout holes."
                            class="bg-gray-100 rounded-lg w-60 h-72 object-cover"
                        />
                    </div>
                    <div v-else>
                        <img
                            src="/images/default_user_image.png"
                            alt="Walnut card tray with white powder coated steel divider and 3 punchout holes."
                            class="bg-gray-100 rounded-lg w-60 h-72 object-cover"
                        />
                    </div>
                </div>
            </div>

            <AuthorsArticleDiscussion
                :data="this.sendData"
                :totalPage="this.totalPage"
                :reuse="this.reuse"
            />
        </div>
        <div v-if="loadershow">
            <img id="loader" src="/images/placeholder-loading-demo-3.gif" />
        </div>
    </div>
</template>

<script scoped>
import AuthorsArticleDiscussion from "./Authors-ArticleDiscussion.vue";
import axios from "axios";

// get the data from API
export default {
    name: "Author",

    data() {
        return {
            reuse: [],
            totalPage: 0,
            result: [],
            sendData: [],
            loadershow: true,
            datashow: false,
            message: false,
            image: true,
            // paginateshow: false
        };
    },
    components: {
        AuthorsArticleDiscussion,
    },
    mounted() {
        let id = this.$route.params.id; //get the id from ul
        let name = this.$route.params.name; // get the name from url
        axios.get(`/api/author/view/${id}/${name}`).then((res) => {
            if(res.data == "" || res.data == undefined){
                 this.message = true;
                this.loadershow = false;
            }else{
                this.datashow = true;
                this.loadershow = false;
                this.result = res.data.author;
                this.sendData = res.data.list.data;
                this.reuse = res.data.list;
                this.totalPage = Math.ceil(this.reuse.total / this.reuse.per_page);
                if (this.result.image == null) {
                    this.image = false;
                }
            }
            

        });
    },
};
</script>
