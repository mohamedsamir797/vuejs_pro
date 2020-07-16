<template>
    <div>
        <nav-bar></nav-bar>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import navBar from './components/navBar'
    export default {
        name: "Main" ,
        components : {
            navBar
        }
    }
</script>

<style scoped>

</style>