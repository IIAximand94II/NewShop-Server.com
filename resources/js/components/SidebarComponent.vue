<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link :to="{ name:'main.index' }" class="brand-link">
            <img src="../../assets/image/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">NewSHOP</span>
        </router-link>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../assets/image/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin Adminovich</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">PRODUCTS</li>
                    <li class="nav-item">
                        <router-link :to="{ name:'category.index' }" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>
                                Categories
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name:'tag.index' }" class="nav-link">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Tags
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name:'product.index' }" class="nav-link">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>
                                Products
                            </p>
                        </router-link>
                    </li>
                    <!-- Colors -->
                    <li class="nav-item">
                        <router-link :to="{ name:'color.index' }" class="nav-link">
                            <i class="nav-icon fas fa-palette"></i>
                            <p>
                                Colors
                            </p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name:'size.index' }" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Sizes
                            </p>
                        </router-link>
                    </li>

                    <!-- User -->
                    <li class="nav-header">USERS</li>
                    <li class="nav-item">
                        <router-link :to="{ name:'user.index' }" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                            </p>
                        </router-link>
                    </li>

                    <!-- Orders -->
                    <li class="nav-header">ORDERS</li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Orders
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

</template>

<script>
export default {
    name: "SidebarComponent"
}
</script>

<style scoped>

</style>
