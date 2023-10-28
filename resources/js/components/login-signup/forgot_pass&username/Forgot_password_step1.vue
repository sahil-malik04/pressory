<template>
    <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col"
        @submit.prevent="forgPass"
    >
        <p
            class="flex flex-row items-center justify-center lg:justify-center text-lg mb-0 mr-4 text-gray-900 font-bold"
        >
            Forgot Password
        </p>
        <div class="mb-4 w-96 mx-auto mt-5">
            <label
                class="block text-grey-darker text-sm font-bold mb-2"
                for="email"
            >
                Email:
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                id="email"
                type="email"
                v-model="forgPassEmail"
            />
            <p class="errormsg">{{ email_errormsg }}</p>

            <div class="text-right mt-3">
                <button
                    class="bg-sky-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full"
                    type="submit"
                >
                    Submit
                </button>
                <span>
                    <router-link
                        to="/forgot_username_step1"
                        class="text-gray-400 hover:text-gray-800 mt-3 block"
                        >Forgot username?</router-link
                    ><br />
                </span>
            </div>
        </div>
    </form>
</template>

<script>
import axios from "axios";
export default {
    name: "Forgot_password_step1",
    data() {
        return {
            forgPassEmail: "",
            email_errormsg: "",
        };
    },
    watch: {
        forgPassEmail(value) {
            if (value.length == 0) {
                this.email_errormsg = "Email is required";
            } else {
                this.email_errormsg = "";
            }
        },
    },
    methods: {
        forgPass() {
            if (this.forgPassEmail.length == 0) {
                this.email_errormsg = "Email is required";
            } else {
                axios
                    .post(`/api/forget-password?email=${this.forgPassEmail}`)
                    .then((res) => {
                        this.$fire({
                            title: "Email has been sended successfully",
                            text: "Kindly check your email",
                            type: "success",
                            timer: 8000,
                        });
                    });
            }
        },
    },
};
</script>
