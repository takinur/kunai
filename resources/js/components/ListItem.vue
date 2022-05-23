<template>
    <div class="container">
        <!-- Card -->
        <div
            :class="[item.completed ? 'bg-green-600' : 'bg-purple-600']"
            class="transform transition hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0"
        >
            <!-- Dot Follwing the Left Vertical Line -->
            <div
                class="w-5 h-5 bg-green-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"
            ></div>

            <!-- Line that connecting the box with the vertical line -->
            <div class="w-10 h-1 bg-green-300 absolute -left-10 z-0"></div>

            <!-- Content that showing in the box -->
            <div class="flex-auto">
                <h1
                    class="text-xl font-bold"
                    :class="[item.completed ? 'line-through' : '']"
                >
                    {{ item.name }}
                </h1>
                <h3>Eh?</h3>
            </div>
            <input
                type="checkbox"
                @change="updateCheck()"
                v-model="item.completed"
            />
            <button
                class="bg-red-600 text-zinc-50"
                type="submit"
                @click="removeItem()"
            >
                Delete
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ["item"],
    methods: {
        updateCheck() {
            axios
                .put("api/items/" + this.item.id, {
                    item: this.item,
                })
                .then((response) => {
                    if (response.status == 200) {
                        this.$emit("itemChanged");
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        },
        removeItem() {
            axios
                .delete("api/items/" + this.item.id)
                .then((response) => {
                    if (response.status == 200) {
                        this.$emit("itemChanged");
                    }
                })
                .catch((error) => {
                    console.log(error);
                })
        },
    },
};
</script>
