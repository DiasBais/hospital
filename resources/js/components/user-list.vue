<template>
<div>
    <h3>Liste de utilisateurs</h3>
    <div class="alert alert-danger" v-if="has_error">
        <p>Erreur, impossible de récupérer la liste des utilisateurs.</p>
    </div>
    <table class="table">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Invite Doctor</th>
        </tr>
        <tr v-for="user in users" v-bind:key="user.id" style="margin-bottom: 5px;">
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>
                <input type="submit" class="btn btn-danger" value="Invite" v-if="user.role == 2" disabled>
                <input type="submit" class="btn btn-danger" value="Invite" @click="changeRoleDoctorOnPatient(user.id)" v-else-if="user.role == 3">
                <form @submit.prevent="changeRolePatientOnDoctor(user.id)" v-else>
                    <input type="button" class="btn btn-success" data-toggle="modal" :data-target="'#exampleModel-'+user.id" value="Invite">
                    <div class="modal fade" :id="'exampleModel-'+user.id" tabindex="-1" role="dialog" :aria-labelledby="'exampleModalLabel'+user.id" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="modal-title" :id="'exampleModalLabel'+user.id">Invite doctor</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span artia-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="direction-name" class="col-form-label">Directions:</label>
                                        <select class="form-control" id="direction" name="direction" v-model="direction_id">
                                            <option v-for="direction in directions" :key="direction.id" :value="direction.id">{{ direction.direction }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-form-label">Telephone:</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="8(7xx)-xxx-xx-xx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" v-model="phone">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-success" value="Invite doctor">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    </table>
</div>
</template>

<script>
  export default {
    data() {
      return {
        has_error: false,
        users: null,
        directions: null,
        direction_id: 1,
        phone: ''
      }
    },
    mounted() {
      this.getUsers(),
      this.getDirections()
    },
    methods: {
      getUsers() {
        this.$http({
          url: `users`,
          method: 'GET'
        })
            .then((res) => {
              this.users = res.data.users
            }, () => {
              this.has_error = true
            })
      },
      getDirections() {
        this.$http({
          url: `directions`,
          method: 'GET'
        })
            .then((res) => {
              this.directions = res.data.directions
            }, () => {
              this.has_error = true
            })
      },
      changeRolePatientOnDoctor(id) {
        this.$http.put('/change/patient/'+id, {direction: this.direction_id, phone: this.phone}).then(res => {
          console.log(res);
          this.getUsers();
        })
      },
      changeRoleDoctorOnPatient(id) {
        this.$http.put('/change/doctor/'+id).then(res => {
          console.log(res);
          this.getUsers();
        })
      }
    }
  }
</script>
