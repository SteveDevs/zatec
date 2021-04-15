 
<script>
console.log(localStorage.getItem('usertoken'));
    export default {
        data() {
            return {
                products: []
            }
        },
        created() {
                this.axios.get('http://localhost:8000/api/products/')
                .then(response => {
                    this.products = response.data.data;
                });
        },
        methods: {
            purchase() {
                this.axios
                    .post('http://localhost:8000/api/purchases/create', {this.product.price, 
                    user_id: localStorage.getItem('userId')})
                    .then(response => (
                        this.$router.push({ name: 'user-home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
<template>
    <div>
        <h2 class="text-center">Products</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.discount }}</td>
                <td><button v-on:click="purchase(product)">Purchase</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
