<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <BreadcrumbsComponent></BreadcrumbsComponent>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="" name="title" class="form-control" id="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Product title image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="title_image" id="image">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Category</label>
                            <select class="form-control" name="category_id">
                                Categories
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Multi select</label>
                            <multiselect :options="tags"></multiselect>
                        </div>

                        <div class="form-group">
                            <label for="title">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Status</label>
                            <select class="form-control" name="gender">
                                <option value="in_stock">In Stock</option>
                                <option value="on_order">On Order</option>
                                <option value="no">Not</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="sale" id="sale" type="checkbox">
                                <label class="form-check-label" for="sale"> Published</label>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
import BreadcrumbsComponent from "../../components/BreadcrumbsComponent.vue";
import Multiselect from '@vueform/multiselect'

export default {
    name: "CreateView",

    data(){
        return{
            tags: [
                'Tag 1',
                'Tag 2',
                'Tag 3',
            ]
        }
    },

    methods: {

    },

    components: {BreadcrumbsComponent,Multiselect}
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style scoped>

</style>
