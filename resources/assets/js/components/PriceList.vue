<template>
    <div id="priceList">
        <table class="table">
            <tr>
                <td>Date</td>
                <td>Price</td>
                <td>Currency</td>
                <td>Occurance</td>
            </tr>
            <tr v-for="(item, index) in prices" :key="index">
                <td>{{ item.birthday }}</td>
                <td>{{ priceSymbol(item.currency) }}{{ item.price }}</td>
                <td>{{ item.currency }}</td>
                <td>{{ formatOccurance(item.occurance) }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        props: ['prices', 'refresh'],
        watch: {
            refresh() {
                if(this.refresh) {
                    this.$emit('update:refresh', false);
                    this.getAllPrices();
                }
            }
        },
        methods: {
            formatOccurance(occurance) {
                if(occurance > 1) return occurance;
                return '';
            },
            priceSymbol(currency) {
                if(currency == 'GBP') return '£';
                if(currency == 'EUR') return '€';
                if(currency == 'USD') return '$';
            },
            getAllPrices() {
                this.$http.post(window.baseUrl + '/api/priceHistory', { 
                }).then(response => {

                    // get body data
                    this.prices = response.body.prices;
                    alert('Price list refreshed!');

                }, response => {
                    // error callback

                    alert('There was an error, price list not refreshed!');
                });
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
