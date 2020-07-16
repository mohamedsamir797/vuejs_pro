<template>
    <div class="container">
        <form @submit.prevent="onSubmit">
            <alert-success :form="form">Your post Created successfully </alert-success>

            <div class="form-group">
                <label >Title</label>
                <input type="text" name="title" class="form-control" v-model="form.title" >
                <has-error :form="form" field="title"></has-error>

            </div>
            <label >Body</label>
            <textarea class="form-control mb-3" name="body" style="height: 110px" v-model="form.body" ></textarea>
            <has-error :form="form" field="body"></has-error>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "create",
        data(){
           return {
               form : new Form({
                   title : '',
                   body : ''
               })
           }
        },
        methods : {
            onSubmit(){
               this.form.post('/api/posts').then((response)=>{

               }).catch((err) => {

               })
            }
        }
    }
</script>

<style scoped>

</style>