<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link class="navbar-brand" to="/">Blog</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <router-link class="nav-link" to="/post/create">CreatePost</router-link>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a v-for="category in categories" class="dropdown-item" href="#">{{ category.name }}</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        data (){
            return {
              categories : {}
            }
        },
        methods : {
            getCategory(){
                axios.get('/api/categories').then((res) =>{
                    this.categories = res.data.data
                })
            }
        },
        created () {
            this.getCategory();
        },
        name: "navBar"
    }
</script>

<style scoped>

</style>