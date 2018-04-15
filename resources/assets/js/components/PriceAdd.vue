<template>
    <div class="priceAdd">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <label for="day">Day of Birth:</label>
                    <input name="day" type="text" v-model="day" maxlength="2" />

                    <label for="month">Month of Birth:</label> 
                    <input name="month" type="text" v-model="month" maxlength="2" />

                    <input type="button" @click="getPrice" value="Get Price" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                day: '',
                month: '',
                price: 0
            }
        },
        props: ['refresh'],
        methods: {
            getPrice() {
                this.$emit('update:message', '');
                this.$http.post(window.baseUrl + '/api/priceLastBirthday', { 
                    day: this.day, 
                    month: this.month 
                }).then(response => {

                    // get body data
                    this.price = response.body.price;
                    this.$emit('update:refresh', true);

                }, response => {
                    // error callback

                    this.$emit('update:message', response.body.message);
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
