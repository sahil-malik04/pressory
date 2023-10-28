<template>
    <div class="flex flex-wrap" id="wrapper-for-text-slate">
        <div class="w-full">
            <div class="w-full lg:w-8/12 mx-auto">
                <ul
                    class="flex mb-8 list-none flex-wrap flex-row border border-gray-300 shadow-lg rounded"
                >
                    <li class="-mb-px last:mr-0 flex-auto text-center">
                        <a
                            class="text-xs md:text-lg font-semibold px-5 py-3 rounded block leading-normal text-white bg-slate-900 cursor-pointer"
                            data-tab-toggle="text-tab-articles-slate"
                            v-on:click="
                                changeAtiveTab(
                                    $event,
                                    'wrapper-for-text-slate',
                                    'slate',
                                    'text-tab-articles-slate'
                                )
                            "
                        >
                            Articles
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a
                            class="text-xs md:text-lg font-semibold px-5 py-3 rounded block leading-normal text-slate-900 bg-white cursor-pointer"
                            data-tab-toggle="text-tab-discussion-slate"
                            v-on:click="
                                changeAtiveTab(
                                    $event,
                                    'wrapper-for-text-slate',
                                    'slate',
                                    'text-tab-discussion-slate'
                                )
                            "
                        >
                            Discussion
                        </a>
                    </li>
                </ul>
            </div>
            <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
            >
                <div class="p-0 rounded flex-auto">
                    <div class="tab-content tab-space">
                        <div
                            class="block"
                            data-tab-content="true"
                            id="text-tab-articles-sky"
                        >
                            <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                <table
                                    class="items-center w-full bg-transparent border-collapse border table-border border-gray-200"
                                >
                                    <thead class="bg-sky-500">
                                        <tr>
                                            <th
                                                class="px-6 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Article
                                            </th>
                                            <th
                                                class="px-6 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Author
                                            </th>

                                            <th
                                                class="px-6 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Publication
                                            </th>
                                            <th
                                                class="px-6 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Published On
                                            </th>
                                            <th
                                                class="px-6 text-black align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Uploaded On
                                            </th>
                                        </tr>
                                    </thead>
                                     <th class="mess" colspan="8" v-if="message">
                                                 <p>No record found</p>
                                        </th>
                                    <tbody class="divide-y divide-gray-200" v-if="datashow">
                                        
                                        <tr
                                            v-for="(item, i) in receiveData"
                                            v-bind:key="i"
                                        >
                                          
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left"
                                            >
                                                <a
                                                        :href="`/article/${item.id}/${item.title
                                                        .replace(/[ / ]/g, '')
                                                        .replace('/,/g', '')
                                                        .replace('?', '')
                                                 }`"
                                                    class="text-sky-500 tooltip"
                                                    @click.prevent="
                                                        article(
                                                            item.id,
                                                            item.title
                                                                .replace(
                                                                    / /g,
                                                                    '-'
                                                                )
                                                               .replace(/[ / ]/g, '')
                                                                .replace(
                                                                    '?',
                                                                    ''
                                                                )
                                                        )
                                                    "
                                                    ><h6 class="article" v-if="item.title != undefined">
                                                        {{
                                                            `${item.title.substring(
                                                                0,
                                                                35
                                                            )}... `
                                                        }}
                                                    </h6>
                                                    <span class="tooltiptext">
                                                        {{ item.title }}</span
                                                    >
                                                </a>
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left"
                                            >
                                                <a   
                                                    @click.prevent="stop_redirection"
                                                    class="text-sky-500 cursor-default"
                                                    v-for="(
                                                        list, i
                                                    ) in item.articles_authors"
                                                    v-bind:key="i"
                                                >
                                                    {{ list.author_name }}</a
                                                >
                                            </td>
                                             <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left"
                                            >
                                                <a
                                                        :href="`/publication/${item.publication_id}/${item.publication.publication.replace(
                                                            / /g,
                                                            '-'
                                                            )
                                                        }`"
                                                    class="text-sky-500 "
                                                    v-if="
                                                        item.publication != null
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
                                                    {{
                                                        item.publication
                                                            .publication
                                                    }}
                                                </a>
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >
                                                {{
                                                    item.published | formatDate
                                                }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >  {{
                                                    item.created_at | formatDate
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div v-if="paginateshow">
                                <Paginate
                                    :totalPages="totalPage"
                                    :currentPage="currentPage"
                                    @pagechanged="onPageChange"
                                    v-bind:DataLink="receiveReuse"
                                />
                            </div>
                        </div>

                        <div
                            class="hidden"
                            data-tab-content="true"
                            id="text-tab-discussion-sky"
                        >
                            <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                <!-- <table class="items-center w-full bg-transparent border-collapse border table-border border-gray-200">
                         //   if (this.receiveData.length == 0) {
        //     
        // }      <thead class="bg-sky-500 text-white">
                                <tr>
                                  <th class="px-6   align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Post</th>
                                  <th class="px-6  align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Username</th>
                                  
                                  <th class="px-6   align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">Posted When</th>
                                  <th class="px-6   align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold  text-center">Replies</th>
                                </tr>
                              </thead>
                              <tbody class=" divide-y divide-gray-200">
                                <tr>
                                  <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left">
                                    This author sucks
                                  </td>
                                  <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                                    Henry
                                  </td>
                                  <td class="border-t-0 px-6 align-middle border-l-0  border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                                    22/01/2022
                                  </td>
                                  <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base text-center whitespace-nowrap p-4">
                                    1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /></a>
                                  </td>
                                </tr>
                                <tr>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left">
                                      This author sucks
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                                      Henry
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0  border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                                      22/01/2022
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base text-center whitespace-nowrap p-4">
                                      1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left">
                                      This author sucks
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                                      Henry
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0  border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                                      22/01/2022
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base text-center whitespace-nowrap p-4">
                                      1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /></a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left">
                                      This author sucks
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                             //   if (this.receiveData.length == 0) {
        //     
        // }           </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0  border-r-0 text-xs md:text-base whitespace-nowrap p-4">
                                      22/01/2022
                                    </td>
                                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base text-center whitespace-nowrap p-4">
                                      1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /></a>
                                    </td>
                                  </tr>
                                  
                              </tbody>
                            </table> -->
                            </div>
                            <!-- <div class="w-full text-right p-4">
                            <button class="bg-sky-500 text-white active:bg-amber-600 font-bold text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                Add New Post
                              </button>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Paginate from "../Paginate.vue";

export default {
    data() {
        return {
            paginateshow: false,
            currentPage: 1,
            receiveData: this.data,
            receiveReuse: this.reuse,
            datashow: false,
            message: false
        };
    },
    components: {
        Paginate,
    },
    mounted() {
        // console.log(this.receiveData.length)
        if (this.receiveData.length != 0) {
                this.paginateshow = true;
             
                this.datashow = true;
        }
        else{
            this.message = true;
        }
             
    },
    name: "AuthorsArticleDiscussion",

    methods: {

        changeAtiveTab(event, wrapperID, color, tabID) {
            let tabsWrapper = document.getElementById(wrapperID);
            let tabsAnchors = tabsWrapper.querySelectorAll("[data-tab-toggle]");
            let tabsContent =
                tabsWrapper.querySelectorAll("[data-tab-content]");

            for (let i = 0; i < tabsAnchors.length; i++) {
                if (tabsAnchors[i].getAttribute("data-tab-toggle") === tabID) {
                    tabsAnchors[i].classList.remove("text-" + color + "-900");
                    tabsAnchors[i].classList.remove("bg-white");
                    tabsAnchors[i].classList.add("text-white");
                    tabsAnchors[i].classList.add("bg-" + color + "-900");
                    tabsContent[i].classList.remove("hidden");
                    tabsContent[i].classList.add("block");
                } else {
                    tabsAnchors[i].classList.add("text-" + color + "-9500");
                    tabsAnchors[i].classList.add("bg-white");
                    tabsAnchors[i].classList.remove("text-white");
                    tabsAnchors[i].classList.remove("bg-" + color + "-900");
                    tabsContent[i].classList.add("hidden");
                    tabsContent[i].classList.remove("block");
                }
            }
        },
        onPageChange(page) {
            this.currentPage = page;
            let id = this.$route.params.id; //get the id from ul
            let name = this.$route.params.name; // get the name from url
            window.scrollTo(0,500);
            axios
                .get(`/api/author/view/${id}/${name}?page=${page}`)
                .then((res) => {
                    this.receiveData = res.data.list.data;
                    this.receiveReuse = res.data.list;
                    this.current_page = res.data.list.current_page;
                });
        },

        stop_redirection(e){e.preventDefault();},
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
    },
    // end

    // Receiving the data from Parent component
    props: ["data", "totalPage", "reuse"],
};
</script>
