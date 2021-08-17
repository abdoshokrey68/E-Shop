<template>
    <div>
        {{ordersCount}}
    </div>
</template>


<script>
export default {
    name: 'OrdersCount',
    props: ['store_id', 'user_id'],
    data: function () {
        return {
            ordersCount: 0
        }
    },
    mounted() {
        this.orderCount();
    },
    methods: {
        orderCount() {
            axios.get(`/api/orderscount/${this.store_id}/${this.user_id}`)
            .then(res => {
                this.ordersCount = res.data
            });
        },
    }
}
</script>
