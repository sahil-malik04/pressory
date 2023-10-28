<template>
    <div>
        <div v-if="datashow">
            <div v-html="pageData"></div>
        </div>

        <div v-if="loadershow">
            <img id="loader" src="/images/placeholder-loading-demo-3.gif" />
        </div>
    </div>
</template>

<script>
export default {
    name: "ContactUs",
    data() {
        return {
            loadershow: true,
            datashow: false,
            pageData: "",
        };
    },

    mounted() {
        axios.get(`/api/cms?id=3`).then((res) => {
            this.datashow = true;
            this.loadershow = false;

            this.pageData = res.data.cms.page_body;
        });
    },
};
</script>
