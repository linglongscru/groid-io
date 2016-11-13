<script>
    export default{
        methods: {
            fetchOps: function() {
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
        ready(){

        },

        data(){
            return{
                title: Spark.state.currentTeam.name,
                ops: this.fetchOps()
            }
        },
    }
</script>
<template>
    <div name="ops">
        <div class="panel panel-default">
            <div class="panel-heading">{{ title }} - Team Grow Operations</div>
            <div id="cycles" class="panel-body">
                <ul>
                    <li v-for="op in ops">
                        {{ op.name }} | {{ op.street_address }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>