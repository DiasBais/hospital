<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card m-2 col-md-3 col-sm-5 p-3" v-for="newsItem in news" v-bind:key="newsItem.id">
                <img class="card-img-top" height="250px" :src="newsItem.photo" alt="Card image cap">
                <div class="card-body mt-3">
                    <h5 class="card-title text-truncate" :title="newsItem.title">{{ newsItem.title }}</h5>
                </div>
                <div class="card-footer">
                    <small class="text-muted">
                        <input type="button" class="btn btn-info btn-block" data-toggle="modal" :data-target="'#exampleModel-'+newsItem.id" value="more">
                        <!--  -->
                        <div class="modal fade" :id="'exampleModel-'+newsItem.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                          <div class="modal-title h4" id="exampleModalLabel">{{ newsItem.title }}</div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span artia-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="card-body mt-3">
                                                <div class="p-3" width="500px"><img class="card-img-top" :src="newsItem.photo" alt="Card image cap"></div>
                                                <p class="h5">{{ newsItem.description }}</p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" @click="deleteNews(newsItem.id)" v-if="$auth.check(2)">delete</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        has_error: false,
        news: null
      }
    },
    mounted() {
      this.getNews()
    },
    methods: {
      getNews() {
        this.$http.get('/news/list').then(res => { this.news = res.data.news }, () => { this.has_error = true })
      },
      deleteNews(id) {
        this.$http.delete('/news/delete/'+id).then(res => { console.log(res) })
      }
    }
  }
</script>
