<template>
    <div>
        <div class="container">
            <h1>Testing</h1>
            <div>
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea class="form-group" name="" id="" rows="3"></textarea>
                </div>
                
                <button @click="addPost()" type="button" class="btn btn-primary">Add Post</button>
                <button @click="updatePost(post.id)" type="button" class="btn btn-success">Update Post</button>

            </div>
            <div class="box" v-for="post in posts" :key="post.id">
                <h3>{{ post.title }}</h3>
                <p>{{ post.body }}</p>
                <button @click="deletePost(post.id)" type="button" class="btn btn-danger">Delete</button>
                <button @click="fetchPost(post.id)" type="button" class="btn btn-secondary">Edit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            posts : [],
            post : {
                    title : '',
                    body : ''
            }
        }
    },
    created(){
        this.fetchPosts()
    },
    methods:{

        fetchPosts(){
            axios.get('api/posts')
            .then(response => {
                this.posts = response.data
            }).catch(error => console.log(err))
        },

        addPost(){
            axios.post('api/add-posts', this.post)
            .then(response => {
                console.log("Post has been added.");
                this.fetchPosts()
                this.post = {
                    title : '',
                    body : ''
                }
                this.posts = response.data
            }).catch(error => console.log(err))
        },

        deletePost(id){
            axios.delete('api/delete-posts/' + id)
            .then(response => {
                console.log(response.data.message);
                this.fetchPosts()
            }).catch(error => console.log(err))
        },

        fetchPost(id){
            axios.get('api/delete-posts/' + id)
            .then(response => {
                this.posts = response.data
            }).catch(error => console.log(err))
        },

        updatePost(id){
            axios.put('api/update-posts/' + id)
            .then(response => {
                this.fetchPosts()
                this.post = {
                    title : '',
                    body : ''
                }
            }).catch(error => console.log(err))
        }

    }
}
</script>

<style scoped>

h1 {
    margin: 100px 0;
}

.box {
    border: 1px solid #EEEEEE;
    margin: 10px 0;
    padding: 10px;
}
</style>