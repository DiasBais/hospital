<template>
  <div class="container">
      <!--  -->
      <div class="card card-default">
          <div class="card-header">{{ title }}</div>
          <div class="card-body">
              <form autocomplete="off" @submit.prevent="addReception()">
                  <div class="form-group">
                      <label for="direction-name" class="col-form-label">Directions:</label>
                      <select class="form-control" id="direction" @click="selectDirection()" name="direction" v-model="direction_id">
                          <option v-for="direction in directions" :key="direction.id" :value="direction.id">{{ direction.direction }}</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="doctor-name" class="col-form-label">Doctors:</label>
                      <select class="form-control" id="doctor" name="doctor" v-model="doctor_id">
                          <option v-for="doctor in doctorsWithDirections" :key="doctor.id" :value="doctor.id">{{ doctor.name }}</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="reception" class="col-form-label">Reception:</label>
                      <input type="text" class="form-control" id="reception" placeholder="xxxx-xx-xx xx:xx:xx" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}" v-model="reception">
                  </div>
                  <input type="submit" class="btn btn-secondary">
              </form>
          </div>
      </div>
      <!--  -->
      <!-- <div v-if="$auth.check(1)">
          <form @submit.prevent="addReception()">
              <div v-for="doctor in doctors">
                  <input :id="doctor.id" type="radio" v-bind:key="doctor.id" style="margin-bottom: 5px;" v-model="doctorTrue" :value="doctor.id"> <label :for="doctor.id">{{ doctor.name }}</label>
              </div>
              <input type="text" class="btn btn-light" id="reception" placeholder="xxxx-xx-xx xx:xx:xx" v-model="reception"><br><br>
              <input type="submit" class="btn btn-secondary">
          </form>
      </div> -->
      <!--  -->
  </div>
</template>

<script>
  export default {
    data() {
      return {
        title: 'Query',
        direction_id: 1,
        doctor_id: 1,
        has_error: false,
        doctorsWithDirections: null,
        doctors: null,
        directions: null,
        doctorTrue: null,
        reception: null
      }
    },
    mounted() {
      this.getDirections(),
      this.getDoctors()
    },
    methods: {
      getDirections() {
        this.$http.get('/query/list/directions').then(res => {
          this.directions = res.data.directions
        }, () => {
          this.has_error = true
        })
      },
      getDoctors() {
        this.$http.get('/query/list/doctor').then(res => {
          this.doctors = res.data.doctors,
          this.selectDirection()
        }, () => {
          this.has_error = true
        })
      },
      selectDirection() {
        let doctor_s = this.doctors;
        let dwd = [];
        for (let i = 0; i < doctor_s.length; i++) {
          if (doctor_s[i]['directions']['id'] == this.direction_id) dwd.push(doctor_s[i]);
        }
        this.doctorsWithDirections = dwd;
        this.doctor_id = 1;
      },
      addReception() {
        var app = this
        this.$http.post('/query/add', {doctor: app.doctor_id, reception: app.reception}).then(res => { console.log(res) })
      }
    }
  }
</script>
