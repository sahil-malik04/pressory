<template>
    <div>
        <div v-if="datashow">
            <div class="text-center mb-5" v-html="pageData"></div>
        </div>

        <div v-if="loadershow">
            <img id="loader" src="/images/placeholder-loading-demo-3.gif" />
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "HowTo",
    data() {
        return {
            loadershow: true,
            datashow: false,
            pageData: "",
        };
    },

    mounted() {
        axios.get(`/api/cms?id=4`).then((res) => {
            this.loadershow = false;
            this.datashow = true;
            this.pageData = res.data.cms.page_body;
        });
    },
};
</script>
