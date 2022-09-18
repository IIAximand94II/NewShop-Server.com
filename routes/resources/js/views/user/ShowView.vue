<template>
    <div class="content-wrapper">
        <!-- Breadcrumbs -->
        <BreadcrumbsComponent></BreadcrumbsComponent>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="../../../assets/image/user2-160x160.jpg"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">User Userovich</h3>

                                <p class="text-muted text-center">Role: user</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Total orders</b> <a class="float-right">0</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Comments</b> <a class="float-right">1</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Review</b> <a class="float-right">1</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Phone number</strong>

                                <p class="text-muted">
                                    +79788882134
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">ma</p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Email</strong>

                                <p class="text-muted">user@mail.ru</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Comments</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab">Reviews</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#orders" data-toggle="tab">Orders</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../../assets/image/user2-160x160.jpg" alt="user image">
                                                <span class="username">
                                                        <a href="#">User</a>
                                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                    </span>
                                                <span class="description">Shared publicly - 22.06.2022</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                lore ipsum dolor sit amet.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                      <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Read
                                                      </a>
                                                    </span>
                                            </p>
                                        </div>
                                        <p>The user hasn't left any comments yet.</p>
                                        <!-- /.post -->

                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="reviews">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../../assets/image/user2-160x160.jpg" alt="user image">
                                                <span class="username">
                                                        <a href="#">User</a>
                                                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                    </span>
                                                <span class="description">Shared publicly - 22.10.2022</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                      <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Read
                                                      </a>
                                                    </span>
                                            </p>
                                        </div>
                                        <p>The user hasn't left any reviews yet.</p>
                                        <!-- /.post -->

                                    </div>

                                    <div class="tab-pane" id="orders">
                                        <div class="card">
                                            <div class="card-header border-transparent">
                                                <h3 class="card-title">User Orders</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <thead>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>Item</th>
                                                            <th>Status</th>
                                                            <th>Popularity</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><a href="">OR9842</a></td>
                                                            <td>Call of Duty IV</td>
                                                            <td><span class="badge badge-success">Shipped</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="">OR1848</a></td>
                                                            <td>Samsung Smart TV</td>
                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="">OR7429</a></td>
                                                            <td>iPhone 6 Plus</td>
                                                            <td><span class="badge badge-danger">Delivered</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="">OR7429</a></td>
                                                            <td>Samsung Smart TV</td>
                                                            <td><span class="badge badge-info">Processing</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="">OR1848</a></td>
                                                            <td>Samsung Smart TV</td>
                                                            <td><span class="badge badge-warning">Pending</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="">OR7429</a></td>
                                                            <td>iPhone 6 Plus</td>
                                                            <td><span class="badge badge-danger">Delivered</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="">OR9842</a></td>
                                                            <td>Call of Duty IV</td>
                                                            <td><span class="badge badge-success">Shipped</span></td>
                                                            <td>
                                                                <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.table-responsive -->
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
import BreadcrumbsComponent from "../../components/BreadcrumbsComponent.vue";
export default {
    name: "ShowView",
    components: {BreadcrumbsComponent}
}
</script>

<style scoped>

</style>
