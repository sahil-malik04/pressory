<template>
    <div>
        <div class="lg:container-lg" v-if="datashow">
            <div class="flex bg-center bg-no-repeat bg-cover">
                <div
                    class="w-full md:w-3/12 lg:w-6/12 lg:relative bg-full bg-no-repeat bg-cover bg-center"
                    style="
                        background-image: url(https://images.unsplash.com/photo-1615403916271-e2dbc8cf3bf4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80);
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
                                            Signup your account
                                        </h6>
                                    </div>
                                </div>
                                <div class="flex-auto">
                                    <form
                                        @submit.prevent="signUpUser"
                                        method="post"
                                    >
                                        <div class="flex w-full mb-3 gap-x-2">
                                            <div class="w-full md:w-1/2">
                                                <label
                                                    class="block uppercase text-xs font-bold mb-2"
                                                    for="grid-password"
                                                    >First Name</label
                                                >
                                                <input
                                                    type="text"
                                                    class="border px-3 py-2 placeholder-black text-black bg-white rounded text-lg shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150 valid"
                                                    name="text"
                                                    id="name"
                                                    aria-invalid="false"
                                                    v-model="fname"
                                                />
                                                <p class="errormsg">
                                                    {{ fname_errormsg }}
                                                </p>
                                            </div>
                                            <div class="w-full md:w-1/2">
                                                <label
                                                    class="block uppercase text-xs font-bold mb-2"
                                                    for="grid-password"
                                                    >Last name</label
                                                >
                                                <input
                                                    type="text"
                                                    class="border px-3 py-2 placeholder-black text-black bg-white rounded text-lg shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150 valid"
                                                    name="password"
                                                    id="lastname"
                                                    aria-invalid="false"
                                                    v-model="lname"
                                                />
                                                <p class="errormsg">
                                                    {{ lname_errormsg }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="relative w-full mb-3">
                                            <div class="w-full">
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
                                            <div class="w-full mt-4">
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
                                                    {{ password_errormsg }}
                                                </p>
                                            </div>
                                            <div class="w-full mt-4">
                                                <label
                                                    class="block uppercase text-xs font-bold mb-2"
                                                    for="grid-password"
                                                    >Confirm password</label
                                                >
                                                <input
                                                    type="password"
                                                    class="border px-3 py-2 placeholder-black text-black bg-white rounded text-lg shadow-sm focus:outline-none focus:ring w-full ease-linear transition-all duration-150 valid"
                                                    name="password"
                                                    id="confpassword"
                                                    aria-invalid="false"
                                                    v-model="confpassword"
                                                />
                                                <p class="errormsg">
                                                    {{ confpassword_errormsg }}
                                                </p>
                                            </div>
                                        </div>
                                        <br />

                                        <button
                                            type="submit"
                                            class="w-full text-white bg-black focus:ring-4 focus:outline-none focus:ring-gray-900 font-medium rounded text-lg px-5 py-2 text-center mr-2 mb-2"
                                        >
                                            Sign up
                                        </button>
                                        <div class="my-4"></div>
                                        <div class="flex flex-wrap mt-3">
                                            <div class="w-full text-center">
                                                <span class="text-gray-400">
                                                    Already registered
                                                    <router-link
                                                        to="/login"
                                                        class="text-sky-400 hover:text-gray-800"
                                                        >Login</router-link
                                                    ></span
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
    name: "SignUp",
    data() {
        return {
            loadershow: true,
            datashow: false,
            fname: "",
            lname: "",
            email: "",
            password: "",
            confpassword: "",

            fname_errormsg: "",
            lname_errormsg: "",
            email_errormsg: "",
            password_errormsg: "",
            confpassword_errormsg: "",

            isAuthenticated: false,
        };
    },
    mounted() {
        this.loadershow = false;
        this.datashow = true;
    },
    watch: {
        fname(value) {
            if (value.length == 0) {
                this.fname_errormsg = "First name is required";
            } else {
                this.fname_errormsg = "";
            }
        },
        lname(value) {
            if (value.length == 0) {
                this.lname_errormsg = "Last name is required";
            } else {
                this.lname_errormsg = "";
            }
        },
        email(value) {
            if (value.length == 0) {
                this.email_errormsg = "Email is required";
            } else {
                this.email_errormsg = "";
            }
        },
        password(value) {
            if (value.length == 0) {
                this.password_errormsg = "Password is required";
            } else {
                this.password_errormsg = "";
            }
        },
        confpassword(value) {
            if (value.length == 0) {
                this.confpassword_errormsg =
                    "Password confirmation is required";
            } else {
                this.confpassword_errormsg = "";
            }
        },
    },
    methods: {
        signUpUser() {
            if (
                this.fname.length == 0 &&
                this.lname.length == 0 &&
                this.email.length == 0 &&
                this.password.length == 0 &&
                this.confpassword.length == 0
            ) {
                this.fname_errormsg = "First name is required";
                this.lname_errormsg = "Last name is required";
                this.email_errormsg = "Email is required";
                this.password_errormsg = "Password is required";
                this.confpassword_errormsg =
                    "Password confirmation is required";
            } else if (this.fname.length == 0) {
                this.fname_errormsg = "First name is required";
            } else if (this.lname.length == 0) {
                this.lname_errormsg = "Last name is required";
            } else if (this.email.length == 0) {
                this.email_errormsg = "Email is required";
            } else if (this.password.length == 0) {
                this.password_errormsg = "Password is required";
            } else if (this.confpassword.length == 0) {
                this.confpassword_errormsg =
                    "Password confirmation is required";
            } else if (this.password.length < 6) {
                this.password_errormsg =
                    "password must be at least 6 characters";
            } else if (this.confpassword.length < 6) {
                this.confpassword_errormsg =
                    "password must be at least 6 characters";
            } else if (this.password != this.confpassword) {
                this.confpassword_errormsg = `password didn't match`;
            } else {
                axios
                    .post(
                        `/api/user/register?first_name=${this.fname}&last_name=${this.lname}
				&email=${this.email}&password=${this.password}&password_confirmation=${this.confpassword}`
                    )
                    .then((res) => {
                        window.scrollTo(0,0);

                        if (res.status == 201) {
                            this.isAuthenticated = true;
                            localStorage.setItem(
                                "isAuthenticated",
                                this.isAuthenticated
                            );

                            let name = res.data.user.first_name;
                            localStorage.setItem("name", name);

                            localStorage.setItem("id", res.data.user.id);

                            this.$router.push("/");
                            this.$fire({
                                title: "Successfully registered",
                                type: "success",
                                timer: 5000,
                            }).then((r) => {
                                this.$router.go();
                            });
                        }
                    });
            }
        },
    },
};
</script>
