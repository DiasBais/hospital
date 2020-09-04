<template>
    <div class="container">
        <!-- <div class="card p-3" v-for="newsItem in news" v-bind:key="newsItem.id"> -->
            <!-- <img class="card-img-top" :src="news.photo" alt="Card image cap">
            <div class="card-body mt-3">
                <h5 class="card-title">{{ news.id }}</h5>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <a href="#" v-if="$auth.check(2)"><input type="button" class="btn btn-danger btn-block" value="delete"></a>
                    <a href="#"><input type="button" class="btn btn-info btn-block" value="more"></a>
                </small>
            </div> -->
        <!-- </div> -->
            <div class="card-body mt-3">
                <h5 class="h1 text-info text-center">{{ news.title }}</h5>
                <div class="p-3" width="500px"><img class="card-img-top" height="500px" :src="news.photo" alt="Card image cap"></div>
                <p class="h5">{{ news.description }}</p>
            </div>
            <!-- <img class="card-img-top" :src="news.photo" alt="Card image cap">
            <div class="card-footer">
                <small class="text-muted">
                    <a href="#" v-if="$auth.check(2)"><input type="button" class="btn btn-danger btn-block" value="delete"></a>
                    <a href="#"><input type="button" class="btn btn-info btn-block" value="more"></a>
                </small>
            </div> -->
    </div>
</template>

<script>
    export default {
      data() {
        return {
          id: '',
          news: {},
          has_error: false
        }
      },
      mounted() {
        this.getNews()
      },
      methods: {
        getNews() {
          this.id = this.$route.params.id,
          this.$http.get('/newsItem/'+this.id).then(res => {
            console.log(res);
            this.news = res.data.news
          }, () => {
            this.has_error = true
          })
        }
      }
    }
</script>
