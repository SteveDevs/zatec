<template>
    <div>
        <h3 class="text-center">Topup</h3>
        <div class="row">
            <div class="col-md-6">
                <div>Amount: {{ topup }} </div>
                <form @submit.prevent="topup">
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" class="form-control" v-model="topup.amount">
                    </div>
                    <button type="submit" class="btn btn-primary">Topup</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                topup: {}
            }
        },
        created() {
                this.axios.get('http://localhost:8000/api/topup/' + localStorage.getItem('userId'))
                .then(response => {
                    this.topup = response.data;
                });
        },
        methods: {
            topup() {
                this.axios
                    .post('http://localhost:8000/api/users/topup', [localStorage.getItem('userId'), this.topup.amount])
                    .then(response => (
                        this.$router.push({ name: 'user-home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>