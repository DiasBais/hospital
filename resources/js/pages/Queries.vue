<template>
  <div class="container">
      <!--  -->
      <div class="card card-default">
          <div class="card-header">{{ title }}</div>
          <div class="card-body">
              <table class="table">
                  <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Patient</th>
                      <th scope="col">Reception</th>
                      <th scope="col">Published</th>
                  </tr>
                  <tr v-for="query in queries" v-bind:key="query.id" style="margin-bottom: 5px;">
                      <th scope="row">{{ query.id }}</th>
                      <td>{{ query.patient }}</td>
                      <td>{{ query.reception }}</td>
                      <td>{{ query.created_at }}</td>
                  </tr>
              </table>
          </div>
      </div>
      <!--  -->
      <!-- <table class="table" v-if="$auth.check(3)">
          <tr>
              <th scope="col">Id</th>
              <th scope="col">Doctor</th>
              <th scope="col">Reception</th>
              <th scope="col">Submit</th>
          </tr>
          <tr v-for="query in queries" v-bind:key="query.id" style="margin-bottom: 5px;">
              <th scope="row">{{ query.id }}</th>
              <td>{{ query.name }}</td>
              <td class="form-group" v-bind:class="{ 'has-error': has_error && errors.reception }">
                  <form autocomplete="off" @submit.prevent="addReception(query.id)" v-if="!success" method="post">
                      <input type="text" :id="reception-query.id" class="form-control" placeholder="xxxx-xx-xx xx:xx:xx" v-model="reception">
                      <input type="submit" class="btn btn-default" v-model="Submit">
                  </form>
              </td>
          </tr>
      </table> -->
      <!--  -->
  </div>
</template>

<script>
  export default {
    data() {
      return {
        title: 'Queries',
        has_error: false,
        queries: null
      }
    },
    mounted() {
      this.getQueries()
    },
    methods: {
      getQueries() {
        this.$http.get('/query/list/queries').then(res => {
          this.queries = res.data.queries
        }, () => {
          this.has_error = true
        })
      }
    }
  }
</script>
