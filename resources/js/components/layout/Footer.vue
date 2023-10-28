<template>
    <footer class="bg-sky-500 pt-8">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 text-center">
            <p class="text-xs md:text-base text-white">If you would like to Donate or Support, please click <router-link to="/donate" class="text-white underline">here</router-link></p>
            <ul class="ps-0 pt-3">
                <li class="inline-block px-4 font-semibold text-white"><button @click="about">About </button></li>
                
                <li class="inline-block px-4 font-semibold text-white"><button @click="faq"> FAQs </button></li>
                <li class="inline-block px-4 font-semibold text-white"><button @click="contact"> Contact </button></li>
            </ul>
        </div>
        <div class="border-t border-white mt-8 py-4">
            <div class="md:flex align-middle justify-around text-center">
                <p class="text-white text-sm">© Pressory. All Rights Reserved</p>
                <div>
                    <!-- Social media icons -->
                    <ul class="mt-4 md:mt-0">
                        <li class="inline-block "><a href="#" class="px-2 mx-2 bg-white text-sky-400 rounded-full w-8 h-8 flex align-middle justify-center py-2 "><font-awesome-icon icon="fa-brands fa-facebook" /></a></li>
                        <li class="inline-block "><a href="#" class="px-2 mx-2 bg-white text-sky-400 rounded-full w-8 h-8 flex align-middle justify-center py-2 "><font-awesome-icon icon="fa-brands fa-twitter" /></a></li>
                        <li class="inline-block "><a href="#" class="px-2 mx-2 bg-white text-sky-400 rounded-full w-8 h-8 flex align-middle justify-center py-2 "><font-awesome-icon icon="fa-brands fa-instagram" /></a></li>
                    </ul>
                    <!-- End -->
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
// window.scrollTo(0,0);
export default {
    name: 'Footer',
    methods:{
        about(){
            this.$router.push('/about');
            window.scrollTo(0,0);
        },
        faq(){
            this.$router.push('/faqs');
            window.scrollTo(0,0);
        },
        contact(){
            this.$router.push('/contact');
            window.scrollTo(0,0);
        },

    }
}
</script>