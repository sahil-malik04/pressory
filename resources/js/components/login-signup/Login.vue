<template>
    <div>
        <div class="lg:container-lg" v-if="datashow">
            <div class="flex bg-center bg-no-repeat bg-cover">
                <div
                    class="w-full md:w-3/12 lg:w-6/12 lg:relative bg-full bg-no-repeat bg-cover bg-center"
                    style="
                        background-image: url(https://images.unsplash.com/photo-1572949645841-094f3a9c4c94?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80);
                    "
                >
                    <div
                        class="flex flex-col justify-aroun items-center justify-center h-full relative"
                    >
                        <div class="w-full absolute left-3 top-3">
                            <i
                                class="fas fa-tooth text-indigo-600 text-6xl"
                            ></i>
                        </div>
                        <div class="w-full md:w-3/4 mx-auto">
                            <p
                                class="text-white text-right text-2xl opacity-100 mt-3"
                            ></p>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full px-4 md:px-8 md:py-0 max-w-md mx-auto sm:max-w-xl lg:max-w-full lg:w-6/12 lg:py-0 lg:px-12"
                >
                    <div
                        class="min-h-screen flex items-center justify-center bg-white-50 md:py-12 md:px-6 lg:px-8"
                    >
                        <div class="max-w-sm w-full space-y-8">
                            <div
                                class="relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg"
                            >
                                <div class="rounded-t bg-white mb-0 py-6">
                                    <div class="text-left">
                                        <h6 class="text-4xl font-bold mb-6">
                                            <span
                                                class="bg-sky-500 text-white pr-2 pl-1"
                                                >Pressory</span
                                            >
                                        </h6>
                                        <h6
                                            class="text-gray-900 text-3xl font-bold"
                                        >
                                            Log into your account
                                        </h6>
                                    </div>
                                </div>
                                <div class="flex-auto">
                                    <form
                                        @submit.prevent="loginUser"
                                        method="post"
                                        class="form"
                                    >
                                        <div class="relative w-full mb-3">
                                            <div class="col-md-4">
                                                <label
                                                    class="block uppercase text-xs font-bold mb-2"
                                                    for="grid-password"
                                                    >Email
                                                </label>
                                                <input
                                                    type="email"
                                                    class="border px-3 py-2 placeholder-black text-black bg-white rounded text-lg shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150 valid"
                                                    name="email"
                                                    id="email"
                                                    aria-invalid="false"
                                                    v-model="email"
                                                />
                                                <p class="errormsg">
                                                    {{ email_errormsg }}
                                                </p>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <label
                                                    class="block uppercase text-xs font-bold mb-2"
                                                    for="grid-password"
                                                    >Password</label
                                                >
                                                <input
                                                    type="password"
                                                    class="border px-3 py-2 placeholder-black text-black bg-white rounded text-lg shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150 valid"
                                                    name="password"
                                                    id="password"
                                                    aria-invalid="false"
                                                    v-model="password"
                                                />
                                                <p class="errormsg">
                                                    {{ pass_errormsg }}
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="g-recaptcha"
                                            data-sitekey="6LepkMkZAAAAAK1N2zLu4ydAYCep721nTaNvM6EY"
                                        ></div>

                                        <br />

                                        <button
                                            type="submit"
                                            class="w-full text-white bg-black focus:ring-4 focus:outline-none focus:ring-gray-900 font-medium rounded text-lg px-5 py-2 text-center mr-2 mb-2"
                                        >
                                            Login
                                        </button>
                                        <div class="my-4"></div>
                                        <div class="flex flex-wrap mt-3">
                                            <div class="w-1/2">
                                                <router-link
                                                    to="/forgot_username_step1"
                                                    class="text-gray-400 hover:text-gray-800"
                                                    >Forgot username or
                                                    password?</router-link
                                                ><br />
                                            </div>
                                            <div class="w-1/2 text-right">
                                                <router-link
                                                    to="/signup"
                                                    class="text-gray-400 hover:text-gray-800"
                                                    >Create new
                                                    account</router-link
                                                >
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="loadershow">
            <img id="loader" src="/images/placeholder-loading-demo-3.gif" />
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Login",
    data() {
        return {
            email: "",
            password: "",
            res: "",
            isAuthenticated: false,
            loadershow: true,
            datashow: false,
            email_errormsg: "",
            pass_errormsg: "",
        };
    },
    watch: {
        email(value) {
            if (value.length == 0) {
                this.email_errormsg = "Email is required";
            } else {
                this.email_errormsg = "";
            }
        },
        password(value) {
            if (value.length == 0) {
                this.pass_errormsg = "Password is required";
            } else {
                this.pass_errormsg = "";
            }
        },
    },
    mounted() {
        this.loadershow = false;
        this.datashow = true;
    },

    methods: {
        loginUser() {
            if (this.email.length == 0 && this.password.length == 0) {
                this.email_errormsg = "Email is required";
                this.pass_errormsg = "Password is required";
            } else if (this.email.length == 0 || null) {
                this.email_errormsg = "Email is required";
            } else if (this.password.length == 0 || null) {
                this.pass_errormsg = "Password is required";
            } else if (this.password.length < 6) {
                this.pass_errormsg = "Password must be at least 6 characters";
            } else {
                axios
                    .post(
                        `/api/user/login?email=${this.email}&password=${this.password}`
                    )
                    .then((res) => {
                            window.scrollTo(0,0);
                        if (res.status == 200) {
                            localStorage.setItem(
                                "token",
                                res.data.access_token
                            );
                            this.isAuthenticated = true;
                            localStorage.setItem(
                                "isAuthenticated",
                                this.isAuthenticated
                            );

                            let name = res.data.user.first_name;
                            localStorage.setItem("name", name);
                            localStorage.setItem("id", res.data.user.id);

                            this.$router.push("/");
                            this.$router.go();
                        } else {
                            // console.log(res)
                            this.$alert("Invalid credentials");
                        }
                    })
                    .catch((error) => {
                        console.clear();
                        if (error.response.status === 401) {
                            this.$alert("Invalid credentials");
                        }
                        // console.log(error.response);
                    });
                // // console.log('do whatever');
            }
        },
    },
};
</script>
