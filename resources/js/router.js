import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import Blog from './pages/Blog.vue';
import CatogryBlogs from './pages/CatogryBlogs.vue';
import About from './pages/About.vue';
import Contact from './pages/Contact.vue';
import AllBlogs from './pages/AllBlogs.vue';
import Register from './pages/Register.vue';
import Login from './pages/Login.vue';
import Dashboard from './pages/dashboard/Dashboard.vue';
import PostBlog from './pages/dashboard/PostBlog.vue';
import EditBlog from './pages/dashboard/EditBlog.vue';








Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/blog/:id',
            name: 'blog',
            component: Blog,
            params:true
        },
        {
            path: '/catogry/:id/blogs',
            name: 'CatogryBlogs',
            component: CatogryBlogs,
            params:true
        },
        {
            path: '/blogs',
            name: 'AllBlogs',
            component: AllBlogs
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/contact Us',
            name: 'contact',
            component: Contact,
        },
        {
            path: '/register',
            component: Register,
            name:'register',
            beforeEnter: (to, form, next) =>{
                axios.get('/api/athenticated').then(()=>{
                    return next({ name: 'dashboard'})
                }).catch(()=>{
                    next()
                })
            }
        },
        {
            path: '/login',
            component: Login,
            name: 'login',
            beforeEnter: (to, form, next) =>{
                axios.get('/api/athenticated').then(()=>{
                    return next({ name: 'dashboard'})
                }).catch(()=>{
                   next()
                })
            }
        },
        {
            path: "/dashboard",
            name: "dashboard",
            component: Dashboard,
           beforeEnter: (to, form, next) =>{
               axios.get('/api/athenticated').then(()=>{
                   next()
               }).catch(()=>{
                   return next({ name: 'login'})
               })
           }
        },
        {
            path: "/postBlog",
            name: "postblog",
            component: PostBlog,
            beforeEnter: (to, form, next) =>{
                axios.get('/api/athenticated').then(()=>{
                    next()
                }).catch(()=>{
                    return next({ name: 'login'})
                })
            }
        },
        {
            path: "/editBlog",
            name: "editblog",
            component: EditBlog,
            params:true,
            beforeEnter: (to, form, next) =>{
                axios.get('/api/athenticated').then(()=>{
                    next()
                }).catch(()=>{
                    return next({ name: 'login'})
                })
            }
        }
    ]
});

export default router;