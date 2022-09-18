<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Products</h1>
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
        <router-link class="btn btn-secondary" :to="{ name:'product.create' }">Create product</router-link>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Size</h3>
                            <div class="fa-pull-right">
                                <router-link class="btn btn-primary mr-1" :to="{ name:'product.create' }">Create product</router-link>
                                <router-link class="btn btn-secondary" :to="{ name:'product.single.create' }">Add single product in group</router-link>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Gender</th>
                                    <th>Product in group</th>
                                    <th>Total orders</th>
                                    <th>Existence</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Change status</th>
                                    <th>Action</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
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
export default {
    name: "IndexView"
}
</script>

<style scoped>

</style>
