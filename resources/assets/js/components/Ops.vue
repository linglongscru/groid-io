<script>
    export default{
        methods: {
            fetchOps() {
                let x = [];
                this.$http.get('/api/ops').then((response) => {
                    for (i = 0; i < response.data.data.length; i++) {
                    x.push(response.data.data[i])
                }
                this.$set('ops', x);
                return
            }, (response) => {
                    throw new EventException;
                });

            }
        },
        data: function() {
            return{
                title: Spark.state.currentTeam.name,
                ops: this.fetchOps
            }
        },
        ready(){

        },
        mounted() {
        }
    }
</script>
<template>
    <div name="ops">
        <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">{{ title }} - Team Grow Operations</div>
            <div id="ops-list" class="panel-body">
                <ul>
                    <li v-for="op in ops">
                        {{ op.name }} | {{ op.street_address }}
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</template>