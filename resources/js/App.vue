<template>
    <div>
        <Navbar />
        <router-view> </router-view>
        <Footer />
    </div>
</template>

<script>
import Navbar from "./components/layout/Navbar.vue";
import Footer from "./components/layout/Footer.vue";
import axios from "axios";

export default {
    components: {
        Footer,
        Navbar,
    },
    data() {
        return {
            about_title: "",
            about_content: "",
            about_keyword: "",
            about_desc: "",

            contact_title: "",
            contact_content: "",
            contact_keyword: "",
            contact_desc: "",
        };
    },
    watch: {
        $route(to, from) {
            if (to.name == "about") {
                document.title = this.about_title;
                document.head.childNodes[5].content = this.about_keyword;
                document.head.childNodes[7].content = this.about_desc;
            } else if (to.name == "contact") {
                document.title = this.contact_title;
                document.head.childNodes[5].content = this.contact_keyword;
                document.head.childNodes[7].content = this.contact_desc;
            } else {
                document.title = "Pressory";
                document.head.childNodes[5].content = "";
                document.head.childNodes[7].content = "";
            }
        },
    },
    mounted() {
        axios.get(`/api/cms?id=2`).then((res) => {
            this.about_title = res.data.cms.title;
            this.about_content = res.data.cms.meta_content;
            this.about_keyword = res.data.cms.meta_keyword;
            this.about_desc = res.data.cms.meta_description;
        });
        axios.get(`/api/cms?id=3`).then((res) => {
            this.contact_title = res.data.cms.title;
            this.contact_content = res.data.cms.meta_content;
            this.contact_keyword = res.data.cms.meta_keyword;
            this.contact_desc = res.data.cms.meta_description;
        });
    },
};
</script>
