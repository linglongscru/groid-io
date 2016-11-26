<script type="text/babel">
    export default{

        data() {
            return {
                username: Spark.state.user.name,
                ops: []
            }
        },
        mounted() {
            console.log("Ops Component Ready!")
            this.fetchOps();
        },
        methods: {
            fetchOps() {
               this.$http.get('/api/ops')
                .then(response => {
                   this.ops = response.data.data
             }).catch(response => {
                   throw new EventException;
               });
            }
        }
    }
</script>
<template>
    <div name="ops">
        <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">{{ username }} - Operations</div>
            <div id="ops-list" class="panel-body">
                <ul>
                    <li v-for="op in ops">
                        {{op.id}} | {{ op.name }} | {{ op.street_address }}
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</template>