<template>
      <div class="row">
          <div class="card col-12 " style="width: 18rem;">
              <div class="card-header">
                  Posts
              </div>
              <div class="card-body p-0">
                  <table v-if="posts.length > 0" class="table table-striped ">
                      <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Body</th>
                          <th>Action</th>
                      </tr>
                      <tr v-for="post in posts">
                          <td>{{ post.id }}</td>
                          <td>{{ post.title }}</td>
                          <td>{{ post.body }}</td>
                          <td>
                              <div class="row">
                                  <router-link :to="'/post/edit/'+ post.id " class="btn btn-primary mr-3">edit</router-link>
                                  <a href="#" @click="onDelete(post.id)" class="btn btn-danger">Delete</a>
                              </div>
                          </td>
                      </tr>
                  </table>
                  <p class="text-center" v-else> there is no posts here </p>
              </div>
          </div>
      </div>

</template>

<script>
    export default {
        name: "index",
        data (){
            return {
                posts : {}
            }
        },
        methods : {
            getPosts(){
                axios.get('/api/posts').then((res)=>{
                  this.posts = res.data.data
                })
            },
            onDelete(id){
                axios.delete('/api/posts/'+id).then((res)=>{
                    this.getPosts();
                }).catch((err)=>{
                    alert(err.response.data.message)
                })
            }

        },
        created (){
             this.getPosts();
        }
    }
</script>

<style scoped>

</style>