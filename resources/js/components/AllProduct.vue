<template>
    <div class="wrapper">
        <h2 class="text-center text-green-700 font-bold text-4xl">
            Products List
        </h2>
        <!-- component -->
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600"
                            >
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Details</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="text-gray-700" v-for="product in products" :key="product.id">
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold text-black">
                                                {{ product.name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-4 py-3 text-ms font-semibold border"
                                >
                                    {{ product.detail }}
                                </td>
                                <td class="px-4 py-3 text-xs border">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"
                                    >
                                        {{ product.id }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm border">
                                <router-link
                                :to="{
                                    name: 'edit',
                                    params: { id: product.id },
                                }"
                                class="py-3 px-6 text-white rounded-lg bg-purple-600 shadow-lg block md:inline-block"
                                >Edit</router-link
                            >
                            <button
                                class="py-3 px-6 text-white rounded-lg bg-red-500 shadow-lg block md:inline-block"
                                @click="deleteProduct(product.id)"
                            >
                                Delete
                            </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
        };
    },
    created() {
        this.axios
            .get("/api/products/")
            .then((response) => {
                this.products = response.data;
            });
    },
    methods: {
        deleteProduct(id) {
            this.axios
                .delete(`/api/products/${id}`)
                .then((response) => {
                    let i = this.products.map((data) => data.id).indexOf(id);
                    this.products.splice(i, 1);
                });
        },
    },
};
</script>
