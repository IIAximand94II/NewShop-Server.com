<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <BreadcrumbsComponent></BreadcrumbsComponent>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">User</h3>
                            <a href="" class="btn btn-secondary fa-pull-right">Create user</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Created AT</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>User</td>
                                    <td>Image</td>
                                    <td>none</td>
                                    <td>none</td>
                                    <td>none</td>
                                    <td> 3</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
import axios from "axios";
import BreadcrumbsComponent from "../../components/BreadcrumbsComponent.vue";

export default {
    name: "IndexView",
    components: {BreadcrumbsComponent},
    data(){
        return{
            users:[],
        }
    },

    mounted() {
        //this.getUsers()
    },

    methods:{
        getUsers(){
            axios.get('/api/admin/users')
                .then(res => {

                    this.users = res.data.data;
                    console.log(this.users);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style scoped>

</style>
