<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Войти</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error">
                    <p>Ошибка, не удается войти, неправильно ввели логин/пароль</p>
                </div>
                <form autocomplete="off" @submit.prevent="createNews()" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control" placeholder="Header" v-model="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" id="description" class="form-control" v-model="description" required>
                    </div>
                    <div class="form-group">
                        <label for="photoLink">photo-link</label>
                        <input type="text" id="photoLink" class="form-control" v-model="photoLink" required>
                    </div>
                    <button type="submit" class="btn btn-default">Создать</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        title: null,
        description: null,
        photoLink: null,
        has_error: false
      }
    },
    mounted() {
      //
    },
    methods: {
      createNews() {
        var app = this
        app.$http.post('/news/create', {title: app.title, description: app.description, photoLink: app.photoLink}).then(res => {
          console.log(res);
        })
      }
    }
  }
</script>
