<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <a class="navbar-brand text-light" href="#">Hospital</a>
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ml-auto">
                <!-- NEWS -->
                <li class="nav-item" v-for="(route, key) in routes.news" v-bind:key="route.path">
                    <router-link class="nav-link text-light"  :to="{ name : route.path }" :key="key">
                        {{route.name}}
                    </router-link>
                </li>
                <!-- CREATE NEWS -->
                <li class="nav-item" v-if="$auth.check(2)" v-for="(route, key) in routes.createNews" v-bind:key="route.path">
                    <router-link class="nav-link text-light"  :to="{ name : route.path }" :key="key">
                        {{route.name}}
                    </router-link>
                </li>
                <!-- UNLOGGED -->
                <li class="nav-item" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                    <router-link class="nav-link text-light"  :to="{ name : route.path }" :key="key">
                        {{route.name}}
                    </router-link>
                </li>
                <!-- LOGGED USER -->
                <li class="nav-item" v-if="$auth.check(1) || $auth.check(3)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                    <router-link class="nav-link text-light"  :to="{ name : route.path }" :key="key">
                        {{route.name}}
                    </router-link>
                </li>
                <!-- LOGGED ADMIN -->
                <li class="nav-item" v-if="$auth.check(2)" v-for="(route, key) in routes.admin" v-bind:key="route.path">
                    <router-link class="nav-link text-light"  :to="{ name : route.path }" :key="key">
                        {{route.name}}
                    </router-link>
                </li>
                <!-- QUERY -->
                <li class="nav-item" v-if="$auth.check(1)" v-for="(route, key) in routes.query" v-bind:key="route.path">
                    <router-link class="nav-link text-light"  :to="{ name : route.path }" :key="key">
                        {{route.name}}
                    </router-link>
                </li>
                <!-- QUERIES -->
                <li class="nav-item" v-if="$auth.check(3)" v-for="(route, key) in routes.queries" v-bind:key="route.path">
                    <router-link class="nav-link text-light"  :to="{ name : route.path }" :key="key">
                        {{route.name}}
                    </router-link>
                </li>
                <!-- LOGOUT -->
                <li class="nav-item" v-if="$auth.check()">
                    <a class="nav-link text-light" href="#" @click.prevent="$auth.logout()">Logout</a>
                </li>
                <!--  -->
            </ul>
        </div>
    </nav>
    <!-- <nav id="nav">
        <ul>
            <!-/- NEWS -/->
            <li v-for="(route, key) in routes.news" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!-/- CREATE NEWS -/->
            <li v-for="(route, key) in routes.createNews" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!-/- UNLOGGED -/->
            <li v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!-/- LOGGED USER -/->
            <li v-if="$auth.check(1) || $auth.check(3)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!-/- LOGGED ADMIN -/->
            <li v-if="$auth.check(2)" v-for="(route, key) in routes.admin" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!-/- QUERY -/->
            <li v-if="$auth.check(1) || $auth.check(3)" v-for="(route, key) in routes.queries" v-bind:key="route.path">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!-/- LOGOUT -/->
            <li v-if="$auth.check()">
                <a href="#" @click.prevent="$auth.logout()">Logout</a>
            </li>
            <!-/-  -/->
        </ul>
    </nav> -->
</template>

<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Регистрация',
              path: 'register'
            },
            {
              name: 'Авторизация',
              path: 'login'
            }
          ],
          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            }
          ],
          // LOGGED ADMIN
          admin: [
            {
              name: 'Dashboard',
              path: 'admin.dashboard'
            }
          ],
          // NEWS
          news: [
            {
              name: 'News',
              path: 'news'
            }
          ],
          // CREATE NEWS
          createNews: [
            {
              name: 'Create News',
              path: 'createNews'
            }
          ],
          // QUERY
          query: [
            {
              name: 'Query',
              path: 'query'
            }
          ],
          // QUERIES
          queries: [
            {
              name: 'Queries',
              path: 'queries'
            }
          ]
        }
      }
    },
    mounted() {
    }
  }
</script>
