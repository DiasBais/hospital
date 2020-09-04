<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Регистрация</div>
            <div class="card-body">
                <form autocomplete="off" @submit.prevent="register" method="post">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.name }">
                        <label for="name">Name</label>
                        <input type="name" id="name" v-bind:class="{ 'is-invalid': (has_error && errors.name) }" class="form-control" placeholder="Name" v-model="name">
                        <span class="invalid-feedback" v-if="has_error && errors.name">{{ errors.name[0] }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" v-bind:class="{ 'is-invalid': has_error && errors.email }" class="form-control" placeholder="user@example.com" v-model="email">
                        <span class="invalid-feedback" v-if="has_error && errors.email">{{ errors.email[0] }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" v-bind:class="{ 'is-invalid': has_error && errors.password }" class="form-control" placeholder="********" v-model="password">
                        <span class="invalid-feedback" v-if="has_error && errors.password">{{ errors.password[0] }}</span>
                    </div>
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                        <label for="password_confirmation">Подтверждение пароля</label>
                        <input type="password" id="password_confirmation" v-bind:class="{ 'is-invalid': has_error && errors.password_confirmation }" class="form-control" placeholder="********" v-model="password_confirmation">
                        <span class="invalid-feedback" v-if="has_error && errors.password_confirmation">{{ errors.password_confirmation[0] }}</span>
                    </div>
                    <button type="submit" class="btn btn-default">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        has_error: false,
        errors: {}
      }
    },
    methods: {
      register() {
        var app = this
        this.$http.post('/auth/register',
        {
            name: app.name,
            email: app.email,
            password: app.password,
            password_confirmation: app.password_confirmation
        }).then(res => {
          this.$router.push({name: 'login'});
        }, (err) => {
          this.has_error = true
          this.errors = err.response.data.errors
        });
      }
    }
  }
</script>
