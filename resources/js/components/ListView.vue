<template>
    <div class="container">
        <div class="border-l-2 mt-10" v-for="(item, index ) in items" :key="index">
            <list-item
                :item="item"
                v-on:itemChanged = "$emit('reloadList')"
             />
        </div>
    </div>
</template>

<script>
import listItem from "./ListItem.vue"
export default {
    props: ['items'],
    components: {
        listItem
    }
}
</script>
