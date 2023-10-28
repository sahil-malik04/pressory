<template>
    <div>
        <nav class="bg-sky-500">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-2">
                <div class="relative flex items-center justify-between h-20">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                    >
                        <!-- Mobile menu button-->
                        <button
                            type="button"
                            @click="showResponsive = !showResponsive"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu"
                            aria-expanded="false"
                        >
                            <span class="sr-only">Open main menu</span>
                            <svg
                                class="block h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                            <svg
                                class="hidden h-6 w-6"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start"
                    >
                        <div class="flex-shrink-0 flex items-center">
                            <router-link
                                to="/"
                                class="text-white px-3 py-2 rounded-md text-xl font-medium icon"
                                >Pressory</router-link
                            >
                        </div>

                        <!-- dropdown - click to hide and show  -->
                        <div class="hidden sm:block sm:mx-auto">
                            <div class="flex space-x-2 items-center">
                                <div class="mr-5 relative">
                                    <select
                                        class="text-base text-black bg-white px-3 py-3 rounded hover:shadow-lg border-0"
                                        type="button"
                                        v-model="search_by"
                                    >
                                        <font-awesome-icon
                                            icon="fa-solid fa-angle-down"
                                        />
                                        <option>
                                            <a
                                                href=""
                                                class="block px-4 py-2 text-sm text-gray-700 leading-6"
                                            >
                                                Article
                                            </a>
                                        </option>

                                        <option>
                                            <a
                                                href=""
                                                class="block px-4 py-2 text-sm text-gray-700"
                                            >
                                                Author
                                            </a>
                                        </option>
                                        <option>
                                            <a
                                                href=""
                                                class="block px-4 py-2 text-sm text-gray-700 leading-6"
                                            >
                                                Publication
                                            </a>
                                        </option>
                                        <option>
                                            <a
                                                href=""
                                                class="block px-4 py-2 text-sm text-gray-700"
                                            >
                                                URL
                                            </a>
                                        </option>
                                    </select>
                                </div>

                                <!--  Search bar   -->
                                <form class="relative">
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                                        >
                                            <span
                                                class="text-gray-500 sm:text-sm"
                                                ><font-awesome-icon
                                                    icon="fa-solid fa-magnifying-glass"
                                            /></span>
                                        </div>
                                        <div class="flex items-center">
                                            <input
                                                type="text"
                                                name="price"
                                                id="price"
                                                :class="
                                                    errormsg_visible
                                                        ? 'focus:ring-red-600 focus:border-red-600 block  w-96 pl-7 text-lg px-3 py-3 pr-40 sm:text-sm  placeholder:text-base  rounded-md h-12 error-border'
                                                        : 'focus:ring-white focus:border-white block  w-96 pl-7 text-lg px-3 py-3 pr-40 sm:text-sm border-2 border-white placeholder:text-base  rounded-md h-12 border-2 border-white'
                                                "
                                                placeholder="Search here.."
                                                v-model="search_input"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Search here..'"
                                            />

                                            <span
                                                class="md:inline-block tracking-widest ml-2.5"
                                            >
                                                <button
                                                    class="text-base text-white bg-black px-3 py-3 rounded hover:shadow-lg uppercase"
                                                    @click.prevent="
                                                        search_btn()
                                                    "
                                                    type="submit"
                                                >
                                                    search
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- dropdown - click to hide and show  -->
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                    >
                        <div class="ml-3 relative">
                            <button
                                id="dropdownDividerButton"
                                data-dropdown-toggle="dropdownDivider"
                                class="text-4xl text-black px-2"
                                type="button"
                            >
                                <font-awesome-icon
                                    icon="fa-solid fa-ellipsis-vertical"
                                />
                            </button>

                            <div
                                id="dropdownDivider"
                                class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                            >
                                <ul
                                    class="py-1"
                                    aria-labelledby="dropdownDividerButton"
                                >
                                    <li>
                                        <router-link
                                            to="/about"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >About</router-link
                                        >
                                    </li>

                                    <li>
                                        <router-link
                                            to="/authors?sort=author_name&direction=asc"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >Authors</router-link
                                        >
                                    </li>

                                    <li>
                                        <router-link
                                            to="/publication?sort=author_name&direction=asc"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >Publications</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/articles?sort=author_name&direction=asc"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >Articles</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/fallacies?sort=fallacy&direction=asc"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >Fallacies</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/how-to"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >How-to</router-link
                                        >
                                    </li>

                                    <li>
                                        <router-link
                                            to="/contact"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >Contact</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/faqs"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >FAQs</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link
                                            to="/donate"
                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                            >Donate</router-link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative hidden sm:block">
                            <div
                                class="text-base text-white bg-black px-3 rounded flex items-center text-base"
                                v-if="visible"
                            >
                                <p
                                    class="block px-4 py-2.5 text-lg text-white hover:text-sky-400"
                                >
                                    {{ name }}
                                </p>
                                |
                                <button
                                    class="block px-4 py-2.5 text-lg text-white hover:text-sky-400"
                                    @click="logout()"
                                >
                                    Logout
                                </button>
                            </div>

                            <div
                                class="text-base text-white bg-black px-3 rounded flex items-center text-base"
                                v-if="buttons"
                            >
                                <font-awesome-icon icon="fa-solid fa-user" />
                                <a
                                    href="/login"
                                    class="block px-2.5 py-2.5 text-lg text-white hover:text-sky-400"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-0"
                                    @click.prevent="login"
                                    >Login</a
                                >
                                |
                                <font-awesome-icon icon="fa-solid fa-user-plus" class="pl-4"/>
                                <a
                                    href="/signup"
                                    class="block px-2.5 py-2.5 text-lg text-white hover:text-sky-400"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="user-menu-item-1"
                                    @click.prevent="signup"
                                    >Signup</a
                                >
                            </div>
                        </div>

                        <div class="sm:hidden" v-if="visible">
                            <!-- <font-awesome-icon icon="fa-solid fa-user"/> -->
                            <div class="ml-3 relative">
                                <button
                                    id="dropdownDividerButtonsecond"
                                    data-dropdown-toggle="dropdownDividersecond"
                                    class="text-2xl text-black bg-white rounded-full w-8 h-8 block overflow-hidden"
                                    type="button"
                                >
                                    <font-awesome-icon
                                        icon="fa-solid fa-user"
                                    />
                                </button>

                                <div
                                    id="dropdownDividersecond"
                                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                                >
                                    <p
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    >
                                        {{ name }}
                                    </p>
                                    |
                                    <button
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-left"
                                        @click="logout()"
                                    >
                                        Logout
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="sm:hidden" v-if="buttons">
                            <!-- <font-awesome-icon icon="fa-solid fa-user"/> -->
                            <div class="ml-3 relative">
                                <button
                                    id="dropdownDividerButtonsecond"
                                    data-dropdown-toggle="dropdownDividersecond"
                                    class="text-2xl text-black bg-white rounded-full w-8 h-8 block overflow-hidden"
                                    type="button"
                                >
                                    <font-awesome-icon
                                        icon="fa-solid fa-user"
                                    />
                                </button>

                                <div
                                    id="dropdownDividersecond"
                                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                                >
                                    <ul
                                        class="py-1"
                                        aria-labelledby="dropdownDividerButtonsecond"
                                    >
                                        <li>
                                            <router-link
                                                to="/signup"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                >Signup</router-link
                                            >
                                        </li>

                                        <li>
                                            <router-link
                                                to="/login"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                                >Login</router-link
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-search bar -->
            <div
                class="justify-between items-center w-full sm:hidden p-4 bg-white shadow z-50 mb-3"
                id="mobile-menu"
                v-if="showResponsive"
            >
                <div class="relative mt-3 md:hidden">
                    <div
                        class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
                    >
                        <svg
                            class="w-5 h-5 text-gray-500"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="search-navbar"
                        class="block p-2 pl-10 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search..."
                    />
                </div>
                <ul class="flex flex-col mt-4">
                    <li>
                        <a
                            href=""
                            class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Article</a
                        >
                    </li>
                    <li>
                        <a
                            href=""
                            class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Author</a
                        >
                    </li>
                    <li>
                        <a
                            href=""
                            class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >Publication</a
                        >
                    </li>
                    <li>
                        <a
                            href=""
                            class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                            >URL</a
                        >
                    </li>
                </ul>
            </div>
            <!-- mobile-menu-search bar -->
        </nav>
    </div>
</template>

<script>
export default {
    name: "Navbar",
    data() {
        return {
            dotsdropdownPopoverShow: false,
            search_input: "",
            search_by: "Article",
            buttons: true,
            name: "",
            visible: false,
            errormsg_visible: false,
            showResponsive: false,
            searchBy: '',
        };
    },
    watch: {
        search_input(value) {
            if (value.length == 0 || undefined) {
                this.errormsg_visible = true;
            } else if (value.length <= 2) {
                this.errormsg_visible = true;
            }
             else {
                this.errormsg_visible = false;
            }
        },
    },
    mounted() {
            let keyword = this.$route.query.keyword;

                if(this.$route.query.search_by){
                        this.searchBy = this.$route.query.search_by;
                        this.searchBy = this.searchBy.charAt(0).toUpperCase() + this.searchBy.slice(1);
                }
            if(keyword != undefined && this.searchBy != undefined){
                this.search_input = keyword
                this.search_by = this.searchBy
            }

        
        let isAuthenticated = localStorage.getItem("isAuthenticated");
        if (isAuthenticated == "true") {
            let name = localStorage.getItem("name");
            this.name = name;
            this.buttons = false;
            this.visible = true;
        }
    },

    methods: {
        // search button functionality
        search_btn() {
            if (this.search_input.length == 0 || undefined) {
                this.errormsg_visible = true;
            } else if (this.search_input.length <= 2) {
                this.errormsg_visible = true;
            } else {
                this.errormsg_visible = false;
                let lowerSearchBy = this.search_by.toLowerCase();
                let trimmedSearchInput = this.search_input.trim();

                this.$router.push({
                    path: `/search?keyword=${trimmedSearchInput}&search_by=${lowerSearchBy}`,
                });
                window.scrollTo(0,0);
                this.$router.go();
            }
        },
        login() {
            this.errormsg = "";
            this.$router.push("/login").catch(()=>{});
            window.scrollTo(0,0);
        },
        signup() {
            this.errormsg = "";
            this.$router.push("/signup").catch(()=>{});
            window.scrollTo(0,0);
        },
        logout() {
            localStorage.removeItem("token");
            localStorage.removeItem("isAuthenticated");
            localStorage.removeItem("name");
            localStorage.removeItem("id");
            this.visible = false;
            this.buttons = true;
            this.$router.push("/login");
            this.$router.go();
        },
    },
};
</script>
