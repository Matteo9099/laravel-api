<template>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4" v-for="post in posts" :key="post.id">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <p class="card-text">{{post.content}}</p>
                            <a href="#" class="btn btn-primary">Vedi articolo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: 'Main',

    data() {
        return {
            posts: []
        }
    },
    methods: {
        getPosts(){
                axios.get('/api/posts').then((res) => {
                this.posts = res.data.results;
            })
        }
    },
    created() {
        this.getPosts();
    }
}
</script>

<style>

</style>