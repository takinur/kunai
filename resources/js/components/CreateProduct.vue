<template>
    <div>
        <!-- component -->
        <div class="grid min-h-screen place-items-center">
            <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
                <h1 class="text-xl font-semibold">
                    Hello there 👋,
                    <span class="font-normal">Lets add some Product</span>
                </h1>
                <form class="mt-6" @submit.prevent="addProduct">
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
                        Add new Product
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
            product: {},
        };
    },
    methods: {
        addProduct() {
            this.axios
                .post("/api/products", this.product)
                .then((response) => this.$router.push({ name: "home" }))
                .catch((err) => console.log(err))
                .finally(() => (this.loading = false));
        },
    },
};
</script>
