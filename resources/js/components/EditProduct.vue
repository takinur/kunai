<template>
    <div>
         <div class="grid min-h-screen place-items-center">
            <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
                <h1 class="text-xl font-semibold">
                    Never give Up 👋,
                    <span class="font-normal">V</span>
                </h1>
                <form class="mt-6" @submit.prevent="updateProduct">
                    <label
                        for="name"
                        class="block mt-2 text-xs font-semibold text-gray-600 uppercase"
                        >Product Name</label
                    >
                    <input
                        id="name"
                        type="text"
                        name="name"
                        v-model="product.name"
                        placeholder="Eh?"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                        required
                    />
                    <label
                        for="detail"
                        class="block mt-2 text-xs font-semibold text-gray-600 uppercase"
                        >Some Details</label
                    >
                    <input
                        id="details"
                        type="text"
                        name="detail"
                        v-model="product.detail"
                        placeholder="Random Text"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner"
                        required
                    />
                    <button
                        type="submit"
                        class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none"
                    >
                        Edit Product
                    </button>
                    <p
                        class="flex justify-between inline-block mt-4 text-xs text-gray-500 cursor-pointer hover:text-black"
                    >
                        Cancel
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        created() {
            this.axios
                .get(`api/products/${this.$route.params.id}`)
                .then((res) => {
                    this.product = res.data;
                });
        },
        methods: {
            updateProduct() {
                this.axios
                    .patch(`/api/products/${this.$route.params.id}`, this.product)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>
