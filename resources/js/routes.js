import AdminLayout from "./components/layout/Layout.vue";

const Welcome = () => import('./components/Welcome.vue');
const Dashboard = () => import('./components/dashboard/Dashboard.vue');
const CategoryList = () => import('./components/category/List.vue');
const CategoryCreate = () => import('./components/category/Add.vue');
const CategoryEdit = () => import('./components/category/Edit.vue');
const ApplicationList = () => import('./components/application/List.vue');
const ApplicationCreate = () => import('./components/application/Add.vue');
const ApplicationEdit = () => import('./components/application/Edit.vue');
const Login = () => import('./components/user-management/Login.vue');
const UserCreate = () => import('./components/user-management/Add.vue');
const UserEdit = () => import('./components/user-management/Edit.vue');
const UserList = () => import('./components/user-management/List.vue');

export const routes = [
    {
        name: 'home',
        path: '/home',
        component: AdminLayout,
        children: [
            {
                name: 'home',
                path: '/home',
                component: Welcome
            },
            {
                name: 'dashboard',
                path: '/dashboard',
                component: Dashboard
            },
            {
                name: 'categoryList',
                path: '/category',
                component: CategoryList
            },
            {
                name: 'categoryEdit',
                path: '/category/:id/edit',
                component: CategoryEdit
            },
            {
                name: 'categoryAdd',
                path: '/category/add',
                component: CategoryCreate
            },
            {
                name: 'applicationList',
                path: '/application',
                component: ApplicationList
            },
            {
                name: 'applicationAdd',
                path: '/application/add',
                component: ApplicationCreate
            },
            {
                name: 'applicationEdit',
                path: '/application/:id/edit',
                component: ApplicationEdit
            },
            {
                name: 'userAdd',
                path: '/user/add',
                component: UserCreate
            },
            {
                name: 'userEdit',
                path: '/user/:id/edit',
                component: UserEdit
            },
            {
                name: 'userList',
                path: '/user',
                component: UserList
            },
        ]
    },
    {
        name: 'login',
        path: '/',
        component: Login
    }
]