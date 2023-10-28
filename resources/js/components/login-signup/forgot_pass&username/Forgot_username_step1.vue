<template>
    <form
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col"
        @submit.prevent="forgUsername"
    >
        <p
            class="flex flex-row items-center justify-center lg:justify-center text-lg mb-0 mr-4 text-gray-900 font-bold"
        >
            Forgot Username
        </p>
        <div class="mb-4 w-96 mx-auto mt-5">
            <label
                class="block text-grey-darker text-sm font-bold mb-2"
                for="username"
            >
                Email:
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                id="username"
                type="email"
                v-model="forgUsernameEmail"
            />
            <p class="errormsg">{{ username_errormsg }}</p>

            <div class="text-right mt-3">
                <button
                    class="bg-sky-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full"
                    type="submit"
                >
                    Submit
                </button>
                <span>
                    <router-link
                        to="/forgot_password_step1"
                        class="text-gray-400 hover:text-gray-800 mt-3 block"
                        >Forgot password?</router-link
                    ><br />
                </span>
            </div>
        </div>
    </form>
</template>

<script>
import axios from "axios";
export default {
    name: "Forgot_username_step1",
    data() {
        return {
            forgUsernameEmail: "",
            username_errormsg: "",
        };
    },
    watch: {
        forgUsernameEmail(value) {
            if (value.length == 0) {
                this.username_errormsg = "Email is required";
            } else {
                this.username_errormsg = "";
            }
        },
    },
    methods: {
        forgUsername() {
            if (this.forgUsernameEmail.length == 0) {
                this.username_errormsg = "Email is required";
            } else {
                axios
                    .post(
                        `/api/forget-username?email=${this.forgUsernameEmail}`
                    )
                    .then(() => {
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
