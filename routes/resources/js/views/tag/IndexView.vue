<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tags</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Tags</h3>
                            <a href="" class="btn btn-secondary fa-pull-right">Create tag</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Product count</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="tag in tags">
                                    <td>{{ tag.id }}</td>
                                    <td>{{ tag.title }}</td>
                                    <td>{{ tag.description }}</td>
                                    <td>{{ tag.created_at }}</td>
                                    <td>{{ tag.updated_at }}</td>
                                    <td class="justify-content-center">
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

export default {
    name: "IndexView",

    data(){
        return{
            tags:[],
        }
    },

    mounted() {
        this.getTags()
    },

    methods:{
        getTags(){
            axios.get('/api/admin/tags')
            .then(res => {

                this.tags = res.data.data;
                console.log(this.tags);
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
