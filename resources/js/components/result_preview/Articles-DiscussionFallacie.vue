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
                            Discussion
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
                            Fallacies
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
                                <!-- <table class="items-center w-full bg-transparent border-collapse border table-border border-gray-200">
                            
                              <thead class="bg-sky-500 text-white">
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
                                    1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /> </a>
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
                                      1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /> </a>
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
                                      1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /> </a>
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
                                      1<a href="3" class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-sky-500 bg-sky-200 uppercase last:mr-0 ml-2"><font-awesome-icon icon="fa-solid fa-eye" /> </a>
                                    </td>
                                  </tr>
                                  
                              </tbody>
                            </table> -->
                            </div>
                            <!-- <div class="w-full text-right p-4">
                            <button class="bg-sky-500 text-white bg-sky-600 font-bold text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                                Add New Post
                              </button>
                        </div> -->
                        </div>
                        <div
                            class="hidden"
                            data-tab-content="true"
                            id="text-tab-discussion-sky"
                        >
                            <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                <table
                                    class="items-center w-full bg-transparent border-collapse border table-border border-gray-200"
                                >
                                    <thead class="bg-sky-500 text-white">
                                        <tr>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Fallacy<br />
                                                Number
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Statement From Article
                                            </th>

                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                            >
                                                Confirmation
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center"
                                            >
                                                Type of Fallacy
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center"
                                            >
                                                Yes
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center"
                                            >
                                                No
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center"
                                            >
                                                Date of Fallacy Added
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center"
                                            >
                                                Add Comment
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center"
                                            >
                                                Add Vote
                                            </th>
                                        </tr>
                                    </thead>

                                    <!-- Fallacies UI -->
                                    <tbody class="divide-y divide-gray-200">
                                        <tr
                                            v-for="(
                                                item, index
                                            ) in fallacie.article_fallacie_data"
                                            v-bind:key="item.id"
                                        >
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4 text-left"
                                            >
                                                {{ index + 1 }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >
                                                {{
                                                    `${item.fallacy_statement.substring(
                                                        0,
                                                        40
                                                    )}...`
                                                }}
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >
                                                <p v-if="item.confirmation == 1"> True </p>
                                                <p v-else> False </p>
                                                
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >
                                                <p
                                                    v-if="
                                                        item.fallacy != null ||
                                                        undefined
                                                    "
                                                >
                                                    {{ item.fallacy.fallacy }}
                                                </p>
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >
                                                0%
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >
                                                0%
                                            </td>
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4"
                                            >
                                                {{
                                                    item.created_at | formatDate
                                                }}
                                            </td>

                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4 addCommentbtn"
                                            >
                                                <button
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#addCommentModal"
                                                    type="button"
                                                >
                                                    Add Comment
                                                </button>
                                            </td>

                                            <div
                                                class="modal modal-bg fade fixed top-0 left-0 right-0 bottom-0 hidden w-screen h-full outline-none overflow-x-hidden overflow-y-auto"
                                                id="addCommentModal"
                                                tabindex="-1"
                                                aria-labelledby="exampleModalLabel"
                                                aria-hidden="true"
                                            >
                                                <div
                                                    class="flex items-stretch md:items-center h-screen justify-center min-h-full text-center md:px-2 lg:px-4"
                                                >
                                                    <div
                                                        class="modal-dialog relative w-full sm:w-96 pointer-events-none mx-auto"
                                                    >
                                                        <!-- content  -->
                                                        <div
                                                            class="modal-content border-none shadow-lg relative flex flex-col mx-auto w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
                                                        >
                                                            <div
                                                                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md"
                                                            >
                                                                <h5
                                                                    class="text-xl font-medium leading-normal text-gray-800"
                                                                    id="exampleModalLabel"
                                                                >
                                                                    Add Fallacy
                                                                    Comment
                                                                </h5>

                                                                <font-awesome-icon
                                                                    icon="fa-solid fa-xmark"
                                                                    class="px-2 py-1.5 hover:bg-gray-900 hover:text-white rounded cursor-pointer"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"
                                                                />
                                                            </div>
                                                            <div
                                                                class="modal-body relative p-4"
                                                            >
                                                                <!-- middle content -->

                                                                <textarea
                                                                    class="w-full rounded"
                                                                    rows="4"
                                                                    cols="35"
                                                                    placeholder="Add Comment"
                                                                    v-model="
                                                                        user_comment
                                                                    "
                                                                >
                                                                </textarea>
                                                            </div>
                                                            <!-- content end -->
                                                            <div
                                                                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md"
                                                            >
                                                                <button
                                                                    class="bg-sky-500 text-white bg-sky-600 font-bold text-sm px-6 py-3 rounded"
                                                                    type="button"
                                                                    v-if="
                                                                        user_comment.length !=
                                                                        0
                                                                    "
                                                                    data-bs-dismiss="modal"
                                                                    @click="
                                                                        addComment(
                                                                            item.id
                                                                        )
                                                                    "
                                                                >
                                                                    Confirm
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 text-center border-r-0 text-xs md:text-base whitespace-nowrap p-4 addVotebtn"
                                            >
                                                <button
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#addVoteModal"
                                                    type="button"
                                                >
                                                    Add Vote
                                                </button>
                                            </td>

                                            <div
                                                class="modal modal-bg fade fixed top-0 left-0 hidden w-screen h-full outline-none overflow-x-hidden overflow-y-auto"
                                                id="addVoteModal"
                                                tabindex="-1"
                                                aria-labelledby="exampleModalLabel"
                                                aria-hidden="true"
                                            >
                                                <div
                                                    class="flex items-stretch md:items-center h-screen justify-center min-h-full text-center md:px-2 lg:px-4"
                                                >
                                                    <div
                                                        class="modal-dialog relative w-full sm:w-96 pointer-events-none"
                                                    >
                                                        <!-- content  -->
                                                        <div
                                                            class="modal-content border-none shadow-lg relative flex flex-col mx-auto max-w-sm w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
                                                        >
                                                            <div
                                                                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md"
                                                            >
                                                                <h5
                                                                    class="text-xl font-medium leading-normal text-gray-800"
                                                                    id="exampleModalLabel"
                                                                >
                                                                    Add Fallacy
                                                                    Vote
                                                                </h5>

                                                                <font-awesome-icon
                                                                    icon="fa-solid fa-xmark"
                                                                    class="px-2 py-1.5 hover:bg-gray-900 hover:text-white rounded cursor-pointer"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"
                                                                />
                                                            </div>
                                                            <div
                                                                class="modal-body relative p-4 text-right"
                                                            >
                                                                <!-- middle content -->

                                                                <button
                                                                    class="bg-gray-800 text-white bg-gray-900 font-bold text-sm px-6 py-3 rounded"
                                                                    value="0"
                                                                    @click="
                                                                        noVote(
                                                                            item.id
                                                                        )
                                                                    "
                                                                    data-bs-dismiss="modal"
                                                                >
                                                                    No
                                                                </button>
                                                                <button
                                                                    class="bg-sky-500 text-white bg-sky-600 font-bold text-sm px-6 py-3 rounded"
                                                                    value="1"
                                                                    @click="
                                                                        yesVote(
                                                                            item.id
                                                                        )
                                                                    "
                                                                    data-bs-dismiss="modal"
                                                                >
                                                                    Yes
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    </tbody>
                                    <!-- End -->
                                </table>
                            </div>
                            <p class="mess">{{ message }}</p>

                            <div class="w-full text-right p-4">
                                <button
                                    class="bg-sky-500 text-white bg-sky-600 font-bold text-sm px-6 py-3 rounded"
                                    data-bs-toggle="modal"
                                    data-bs-target="#addFallacyModal"
                                    type="button"
                                >
                                    Add New Fallacy
                                </button>
                            </div>

                            <!-- Modal -->
                            <div
                                class="modal modal-bg fade fixed top-0 left-0 hidden w-screen h-full outline-none overflow-x-hidden overflow-y-auto"
                                id="addFallacyModal"
                                tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true"
                            >
                                <div
                                    class="flex items-stretch md:items-center h-screen justify-center min-h-full text-center md:px-2 lg:px-4"
                                >
                                    <div
                                        class="modal-dialog relative w-full sm:w-96 pointer-events-none"
                                    >
                                        <!-- content  -->
                                        <div
                                            class="modal-content border-none shadow-lg relative flex flex-col mx-auto max-w-sm w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
                                        >
                                            <div
                                                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md"
                                            >
                                                <h5
                                                    class="text-xl font-medium leading-normal text-gray-800"
                                                    id="exampleModalLabel"
                                                >
                                                    Add Fallacy
                                                </h5>

                                                <font-awesome-icon
                                                    icon="fa-solid fa-xmark"
                                                    class="px-2 py-1.5 hover:bg-gray-900 hover:text-white rounded cursor-pointer"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                />
                                            </div>
                                            <div
                                                class="modal-body relative p-4"
                                            >
                                                <input
                                                    type="text"
                                                    placeholder="Add Statement"
                                                    class="w-full rounded"
                                                    v-model="fstatement"
                                                />
                                                <select
                                                    class="mt-4 w-full rounded"
                                                    ref="opitonval"
                                                >
                                                    <option
                                                        v-for="item in dropdown"
                                                        v-bind:key="item.id"
                                                        :value="item.id"
                                                    >
                                                        {{ item.fallacy }}
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- content end -->
                                            <div
                                                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md"
                                            >
                                                <button
                                                    class="bg-sky-500 text-white bg-sky-600 font-bold text-sm px-6 py-3 rounded"
                                                    type="button"
                                                    v-if="
                                                        fstatement.length != 0
                                                    "
                                                    data-bs-dismiss="modal"
                                                    @click="confirm()"
                                                >
                                                    Confirm
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
let isAuthenticated = localStorage.getItem("isAuthenticated");
let userid = localStorage.getItem("id");

export default {
    name: "ArticlesDiscussionFallacie",

    data() {
        return {
            fallacie: [],
            message: "",
            dropdown: "",
            fstatement: "",
            ftype: "Middle Ground",
            user_comment: "",
        };
    },

    // get the data from API
    mounted() {
        let id = this.$route.params.id;
        let name = this.$route.params.name;
        axios.get(`/api/article/view/${id}/${name}`).then((resp) => {
            // console.log(resp.data)
            this.fallacie = resp.data.article.data[0];
            // condition to show error message
            if (this.fallacie.article_fallacie_data.length == 0 || undefined) {
                this.message = "No record found";
            }
            // end

            // Sending the data to parent
            this.$emit(
                "fallacie_length",
                this.fallacie.article_fallacie_data.length
            );
        });

        axios.get("/api/fallacie").then((res) => {
            this.dropdown = res.data.type_of_fallicies;
        });
    },
    methods: {
        /*  -- for tabs --  */
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
        addComment(id) {
            if (isAuthenticated == null) {
                this.$router.push("/login");
            } else if (isAuthenticated == "true") {
                axios
                    .post(
                        `/api/comment/view/${id}?comment=${this.user_comment}&user_id=${userid}`
                    )
                    .then(() => {
                        this.$fire({
                            title: "Comment successfully added",
                            type: "success",
                            timer: 5000,
                        });
                    });
            }
        },
        yesVote(id) {
            if (isAuthenticated == null) {
                this.$router.push("/login");
            } else if (isAuthenticated == "true") {
                axios
                    .post(`/api/vote/view/${id}?vote=1&user_id=${userid}`)
                    .then(() => {
                        this.$fire({
                            title: "Voted successfully",
                            type: "success",
                            timer: 4000,
                        });
                    });
            }
        },
        noVote(id) {
            if (isAuthenticated == null) {
                this.$router.push("/login");
            } else if (isAuthenticated == "true") {
                axios
                    .post(`/api/vote/view/${id}?vote=2&user_id=${userid}`)
                    .then(() => {
                        this.$fire({
                            title: "Voted successfully",
                            type: "success",
                            timer: 4000,
                        });
                    });
            }
        },
        confirm() {
            if (isAuthenticated == null) {
                this.$router.push("/login");
            } else if (isAuthenticated == "true") {
                let fallacyid = this.$refs.opitonval.value;
                let id = this.$route.params.id;

                axios
                    .post(
                        `/api/fallacies/add?article_id=${id}&user_id=${userid}&fallacy_statement=${this.fstatement}&fallacy_id=${fallacyid}&confirmation=0`
                    )
                    .then(() => {
                        this.$alert("Fallacy successfully added");
                        this.$router.go();
                    });
            }
        },
    },
};
</script>
