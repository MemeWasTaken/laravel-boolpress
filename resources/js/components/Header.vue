<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <router-link class="nav-link" :to="{ name: 'home'}"> </router-link>
                
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item"  
                    v-for="(item) in menuItems"
                    :key="item.id">

                    <router-link class="nav-link" :to="{ name: item.routeName}">{{ item.label }}</router-link>
                </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Header",
        data() {
            return {
                menuItems: [
                    {
                        label: 'Home',
                        routeName: 'home'
                    },
                    {
                        label: 'Posts',
                        routeName: 'posts'
                    },
                    {
                        label: 'Chi siamo',
                        routeName: 'about'
                    },
                    {
                        label: 'Contatti',
                        routeName: 'contacts'
                    }
                ],
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>