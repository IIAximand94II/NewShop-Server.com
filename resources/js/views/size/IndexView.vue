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
                            <h3 class="card-title">Size</h3>
                            <a href="" class="btn btn-secondary fa-pull-right">Create size</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Size</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="size in sizes">
                                    <td>{{ size.id }}</td>
                                    <td> {{ size.size }}</td>
                                    <td> {{ size.created_at }}</td>
                                    <td> {{ size.updated_at }}</td>
                                    <td>
                                        <a class="btn btn-primary m-1" href=""><i class="fas fa-edit"> Edit</i></a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger m-1" ><i class="fas fa-trash-alt"> Delete</i></button>
                                    </td>
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
            sizes:[],
        }
    },

    mounted() {
        this.getSizes()
    },

    methods:{
        getSizes(){
            axios.get('/api/admin/sizes')
                .then(res => {
                    this.sizes = res.data.data;
                    //console.log(this.sizes);
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
