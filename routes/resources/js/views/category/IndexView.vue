<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
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
                            <h3 class="card-title">Category</h3>
                            <a href="{{ route('category.create') }}" class="btn btn-secondary fa-pull-right">Create category</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Parent category</th>
                                    <th>Product count</th>
                                    <th>Actions</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Category 1</td>
                                    <td>image</td>
                                    <td>1</td>
                                    <td> 0</td>
                                    <td class="justify-content-center">
                                        <a class="btn btn-secondary m-1" href=""><i class="fas fa-book"> Show</i></a>
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
            categories:[],
        }
    },

    mounted() {
        //this.getCategories()
    },

    methods:{
        getCategories(){
            axios.get('/api/admin/categories')
                .then(res => {

                    this.categories = res.data.data;
                    console.log(this.categories);
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
