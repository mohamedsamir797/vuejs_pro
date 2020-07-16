<template>
    <div class="container">
        <form @submit.prevent="onSubmit">
            <alert-success :form="form">Your post updated successfully </alert-success>

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
        name: "edit",
        data(){
            return {
                form : new Form({
                    title : '',
                    body : ''
                }),
                id : 0
            }
        },
        methods : {
            onSubmit(){
                this.form.put('/api/posts/'+this.id)
            },
            loadPost(){
                axios.get('/api/posts/'+this.id).then((res) => {
                    this.form.fill(res.data.data)
                })
            }
        },
        created() {
             this.id = this.$route.params.id ;
             this.loadPost()
        }
    }
</script>

<style scoped>

</style>