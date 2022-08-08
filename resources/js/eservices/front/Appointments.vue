<template>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="appointment in appointments.data" :key="appointment.id ">
                        <td>183</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    data(){
        return {
            appointment: {},
            appointments: {},
            editMode: false,
            form: new Form({}),
        }
    },
    methods:{
        getAllInitials(){
            this.$Progress.start();
            axios.get('/api/lms/std_courses').then(response =>{
                this.courses = response.data.courses;
                this.$Progress.finish();
                toast.fire({icon: 'success', title: 'Courses loaded successfully',});
            })
            .catch(()=>{
                this.$Progress.fail();
                toast.fire({icon: 'error', title: 'Courses not loaded successfully',});
            });
        },
        getAppointments(page=1){
            axios.get('/api/emr/appointments?page='+page)
            .then(response=>{this.appointments = response.data.appointments;});
        },
    },
    mounted() {
        this.getAllInitials();
    }   
}
</script>