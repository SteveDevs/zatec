<template>
    <div>
        <h2 class="text-center">Transactions</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>Type</th>
                <th>Amonut</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="transaction in transactions" :key="transaction.id">
                <td>{{ transaction.type }}</td>
                <td>{{ transaction.amount }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                products: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/transactions/' + localStorage.getItem('userId'))
                .then(response => {
                    this.products = response.data;
                });
        }
    }
</script>