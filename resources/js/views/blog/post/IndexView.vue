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
                            <h3 class="card-title">All posts</h3>
                            <div class="fa-pull-right">
                                <router-link class="btn btn-primary mr-1" :to="{ name:'post.create' }">Create post</router-link>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-responsive-lg table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Total comments</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Change status</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <template v-for="post in posts">
                                    <tr>
                                        <td>{{ post.id }}</td>
                                        <td>{{ post.title }}</td>
                                        <td> Image</td>
                                        <td>{{ post.category.title}}</td>
                                        <td>0</td>
                                        <td>{{ post.create }}</td>
                                        <td>{{ post.update }}</td>
                                        <td>{{ post.status }}</td>
                                        <td>
                                            <router-link title="Edit" class="btn  btn-sm btn-primary m-1" :to="{ name:'post.edit', params: {id: post.id} }"><i class="fas fa-edit"></i></router-link>
                                        </td>
                                        <td>
                                            <button title="Delete" @click.prevent="remove(post.id)" type="button" class="btn  btn-sm btn-danger m-1" ><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                </template>
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

import BreadcrumbsComponent from "../../../components/BreadcrumbsComponent.vue";
export default {
    name: "IndexView",
    components: {BreadcrumbsComponent},

    mounted(){
        this.getPosts()
    },

    data(){
        return{
            posts:[],
        }
    },

    methods:{
        getPosts(){
            axios.get('/api/admin/blog/posts')
                .then(res => {
                    console.log(res)
                    this.posts = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        remove(id){
            axios.delete(`/api/admin/blog/posts/${id}`)
                .then(res => {
                    console.log(res)

                    this.getPosts()

                    this.$wkToast(res.data.message, {
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        transition: 'fade',
                    })
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

}
</script>

<style scoped>

</style>
