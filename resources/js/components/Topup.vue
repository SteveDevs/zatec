<template>
    <div>
        <h3 class="text-center">Topup</h3>
        <div class="row">
            <div class="col-md-6">
                <div>Amount: {{ topup }} </div>
              
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" v-model="amount">
                    </div>
                    <button v-on:click="doTopup()" class="btn btn-primary">Topup</button>
             
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                topup: 0,
                amount: 0
            }
        },
        created() {
                this.axios.post('http://localhost:8000/api/topup/',{ user_id: localStorage.getItem('userId')})
                .then(response => {
                console.log(response.data.data);
                    this.topup = response.data.data;
                });
        },
        methods: {
            doTopup() {
                this.axios.post('http://localhost:8000/api/topup/update', { user_id: localStorage.getItem('userId'), topup: this.amount})
                    .then(response => (
                        this.$router.push({ name: 'user-home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>