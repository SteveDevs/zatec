import Products from './components/Products.vue';
import Topup from './components/Topup.vue';
import Transactions from './components/Transactions.vue';
import Login from './components/Login'
import Register from './components/Register'
 
export const routes = [
    {
        name: 'user-home',
        path: '/user/user-home',
        component: Login
    },
    {
        name: 'products',
        path: '/user/user-products',
        component: Products
    },
    {
        name: 'topup',
        path: '/user/user-topup',
        component: Topup
    },
    {
        name: 'transactions',
        path: '/user/user-transactions',
        component: Transactions
    },
    {
      path: '/user/user-login',
      name: 'Login',
      component: Login
    },
    {
      path: '/user/user-register',
      name: 'Register',
      component: Register
    }
];