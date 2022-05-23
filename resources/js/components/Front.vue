<template>
    <div class="container">
        <div class="flex justify-center mt-24">
            <h1 class="text-3xl text-center font-bold text-blue-500">
                To Do List
            </h1>
        </div>
        <div
            class="w-10/12 md:w-7/12 lg:6/12 mx-auto relative text-center py-5"
        >
            <add-item-form
            v-on:reloadList="loadItems()"
            />
        </div>

        <!-- List View -->
        <div class="w-10/12 md:w-7/12 lg:6/12 mx-auto relative py-5">
            <list-view :items="items"
            v-on:reloadList="loadItems()" />
        </div>
    </div>
</template>

<script>
//Item Form
import addItemForm from "./AddItemForm.vue";
import ListItem from "./ListItem.vue";
import listView from "./ListView.vue";

export default {
    components: {
        addItemForm,
        listView,
        ListItem,
    },
    data: function () {
        return {
            items: [],
        };
    },
    mounted() {
        this.loadItems();
    },

    methods: {
        loadItems: function () {
            //load from Api
            //assign to Variable
            //catch Errors
            axios
                .get("/api/items")
                .then((response) => {
                    this.items = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
    // created(){
    //     this.loadItems();
    // }
};
</script>
