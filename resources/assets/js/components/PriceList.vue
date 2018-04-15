<template>
    <div id="priceList">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Occurance</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in prices" :key="index">
                    <td>{{ item.birthday }}</td>
                    <td>{{ priceSymbol(item.currency) }}{{ item.price }}</td>
                    <td>{{ item.currency }}</td>
                    <td>{{ formatOccurance(item.occurance) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                prices: []
            }
        },
        props: ['refresh'],
        watch: {
            refresh() {
                if(this.refresh) {
                    this.$emit('update:refresh', false);
                    this.getAllPrices();
                }
            },
            prices() {
                
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
            getAllPrices(firstLoad) {
                this.$emit('update:message', '');
                this.$http.post(window.baseUrl + '/api/priceHistory', { 
                }).then(response => {

                    // get body data
                    this.prices = response.body.prices;
                    if(!firstLoad) this.$emit('update:message', 'Price list refreshed!');

                }, response => {
                    // error callback

                    this.$emit('update:message', 'There was an error, price list not refreshed!');
                });
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.getAllPrices(true);
        }
    }
</script>
