<template>
  <main>
    <div class="container">
        <div class="row">
            <div class="col-4" v-for="post in posts" :key="post.id">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ post.content }}</p>
                        <a href="#" class="btn btn-primary">Vedi articolo</a>
                    </div>
                </div>
            </div>
        </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item" :class="(currentPage == 1)?'disable':''"><span class="page-link" @click="getPosts(currentPage - 1)">Precedente</span></li>
          <li class="page-item" :class="(currentPage == lastPage)?'disabled':''"><span class="page-link" @click="getPosts(currentPage + 1)">Successivo</span></li>
        </ul>
      </nav>

    </div>
  </main>
</template>

<script>
export default {
  name: "Main",

  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: null
    };
  },

  methods: {
    getPosts(apiPage) {
      axios
        .get("/api/posts", {
         'params': {
            'page': apiPage
          },
        })
        .then((res) => {
            this.currentPage = res.data.results.current_page;
            this.posts = res.data.results.data;
            this.lastPage = res.data.results.last_page;
        });
    },
  },

  created() {
    this.getPosts();
  },
};
</script>

<style></style>
