<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Войти</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error">
                    <p>Ошибка, не удается войти, неправильно ввели логин/пароль</p>
                </div>
                <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>
                    <button type="submit" class="btn btn-default">Войти</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        var app = this
        // this.$http.post('/login', {
        //   email: app.email,
        //   password: app.password
        // }).then(res => {
        //   this.$router.push({name: 'news'})
        // }, (err) => {
        //   this.has_error = true
        // }, {
        // rememberMe: true,
        // fetchUser: true})
        app.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            this.$route.push({name: 'news'})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        });
      }
    }
  }
</script>
