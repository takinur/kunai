<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="p-2 pl-5 pr-5 bg-gray-500 text-gray-100 text-lg rounded-lg focus:border-4 border-gray-300">Products List</router-link>
                    <router-link to="/create" class="p-2 pl-5 pr-5 bg-green-500 text-gray-100 text-lg rounded-lg focus:border-4 border-green-300">Create Product</router-link>
                </div>
            </div>
        </nav>

        <router-view> </router-view>
    </div>
</template>

<script>
    export default {}
</script>
