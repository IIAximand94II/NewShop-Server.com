import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            component: () => import('../views/main/IndexView.vue'),
            name: 'main.index',
        },
        {
            path: '/categories',
            component: () => import('../views/category/IndexView.vue'),
            name: 'category.index',
        },
        {
            path: '/tags',
            component: () => import('../views/tag/IndexView.vue'),
            name: 'tag.index',
        },
        {
            path: '/products',
            component: () => import('../views/product/IndexView.vue'),
            name: 'product.index',
        },
        {
            path: '/products/create',
            component: () => import('../views/product/CreateView.vue'),
            name: 'product.create',
        },
        {
            path: '/products/single/create',
            component: () => import('../views/product/AddSingleProductView.vue'),
            name: 'product.single.create',
        },
        {
            path: '/users',
            component: () => import('../views/user/IndexView.vue'),
            name: 'user.index',
        },
        {
            path: '/users/:id',
            component: () => import('../views/user/ShowView.vue'),
            name: 'user.show',
        },
        {
            path: '/colors',
            component: () => import('../views/color/IndexView.vue'),
            name: 'color.index',
        },
        {
            path: '/sizes',
            component: () => import('../views/size/IndexView.vue'),
            name: 'size.index',
        },
        {
            path: '/posts',
            component: () => import('../views/blog/post/IndexView.vue'),
            name: 'post.index',
        },
        {
            path: '/posts/create',
            component: () => import('../views/blog/post/CreateView.vue'),
            name: 'post.create',
        },
        {
            path: '/posts/edit/:id',
            component: () => import('../views/blog/post/EditView.vue'),
            name: 'post.edit',
        },
        {
            path: '/blog/categories',
            component: () => import('../views/blog/category/IndexView.vue'),
            name: 'blog.category.index',
        },
        {
            path: '/blog/tags',
            component: () => import('../views/blog/tag/IndexView.vue'),
            name: 'blog.tag.index',
        },
    ]
});

export default router;
