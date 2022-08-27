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
                            <h3 class="card-title">Post tags</h3>
                            <button type="button" class="btn btn-primary fa-pull-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Create tag
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-responsive-lg table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Post count</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <template v-for="tag in tags">
                                        <tr :class="!isEdit(tag.id) ? '':'d-none'">
                                            <td>{{ tag.id }}</td>
                                            <td>{{ tag.title }}</td>
                                            <td>{{ tag.description }}</td>
                                            <td>1</td>
                                            <td>{{ tag.create }}</td>
                                            <td>{{ tag.update }}</td>
                                            <td class="justify-content-center">
                                                <a title="Edit" class="btn btn-sm btn-primary m-1" @click.prevent="changeEditId(tag.id, tag.title, tag.description)" href="#"><i class="fas fa-edit"></i></a>
                                            </td>
                                            <td>
                                                <button title="Delete" @click.prevent="remove(tag.id)" type="button" class="btn  btn-sm btn-danger m-1" ><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>

                                        <tr :class="isEdit(tag.id) ? '':'d-none'">
                                            <td>{{ tag.id }}</td>
                                            <td><input type="text" v-model="editTitle" class="form-control"></td>
                                            <td><input type="text" v-model="editDescription" class="form-control"></td>
                                            <td>1</td>
                                            <td>{{ tag.create }}</td>
                                            <td>{{ tag.update }}</td>
                                            <td class="justify-content-center">
                                                <a title="Edit" class="btn  btn-sm btn-primary m-1" @click.prevent="update(tag.id)" href="#"><i class="fas fa-edit"></i></a>
                                                <a title="Close" class="btn  btn-sm btn-danger m-1" @click.prevent="closeEditFields" href="#"><i class="fas fa-window-close"></i></a>
                                            </td>
                                            <td>
                                                <button title="Delete" @click.prevent="remove(tag.id)" type="button" class="btn  btn-sm btn-danger m-1" ><i class="fas fa-trash-alt"></i></button>
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

    <!-- Create Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create category</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group  mb-5">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="title">Title</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="title" v-model="title" class="form-control ml-2">
                            </div>
                        </div>
                    </div>
                    <div class="form-group  mb-5">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="title">Description</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="description" v-model="description" class="form-control ml-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button @click.prevent="store" type="button" class="btn btn-primary" data-bs-dismiss="modal">Create</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import BreadcrumbsComponent from "../../../components/BreadcrumbsComponent.vue";
import axios from "axios";
export default {
    name: "IndexView",
    components: {BreadcrumbsComponent},

    mounted() {
        this.getTags();
    },

    data(){
        return{
            tags:[],

            editId:null,
            editTitle:null,
            editDescription:null,

            title:null,
            description:null,
        }
    },

    methods:{

        store(){
            axios.post('/api/admin/blog/tags', {
                title: this.title,
                description: this.description
            })
                .then(res => {
                    console.log(res);
                    this.title = null;
                    this.description = null;
                    this.getTags()

                    this.$wkToast(res.data.message, {
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        transition: 'fade',
                    })
                })
                .catch(error => {
                    console.log(error);
                })
        },

        remove(id){
            axios.delete(`/api/admin/blog/tags/${id}`)
                .then(res => {
                    console.log(res);
                    this.getTags()
                    this.$wkToast(res.data.message, {
                        className: 'wk-alert',
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        transition: 'fade',
                    })
                })
                .catch(error => {
                    console.log(error);
                })
        },

        update(id){
            axios.patch(`/api/admin/blog/tags/${id}`, {
                title: this.editTitle,
                description: this.editDescription
            })
                .then(res => {
                    console.log(res);
                    this.editId = null;
                    this.editTitle = null;
                    this.editDescription = null;
                    this.getTags();
                    this.$wkToast(res.data.message, {
                        horizontalPosition: 'right',
                        verticalPosition: 'top',
                        transition: 'fade',
                    })
                })
                .catch(error => {
                    console.log(error);
                })
        },

        getTags(){
            axios.get('/api/admin/blog/tags')
                .then(res => {
                    this.tags = res.data.data;
                    console.log(this.tags)
                })
                .catch(error => {
                    console.log(error)
                })
        },

        changeEditId(id, title=null, description=null){
            this.editId = !this.editId ?  id : null;
            this.editTitle = !this.editTitle ? title : null;
            this.editDescription = !this.editDescription ? description : null;
        },

        isEdit(id){
            return this.editId === id;
        },

        closeEditFields(){
            this.editId = null;
            this.editTitle = null;
            this.editDescription = null;
        }
    }
}
</script>

<style scoped>

</style>
