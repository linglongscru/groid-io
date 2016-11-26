
<script type="text/babel">
    export default{
        methods: {
          fetchCycles() {
              let x = [];
              this.$http.get('/api/cycles').then((response) => {
                  this.cycles = response.data.data
          }, (response) => {
                  throw new EventException;
              });
          }
        },
        data: function() {
            return {
                cycles: []
            }
        },
        mounted() {
            console.log("Cycles Component Ready!")
            this.fetchCycles();
        },
    }
</script>

<style>
</style>

<template>
<div name="cycles">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Cycles</div>
            <div id="cycles" class="panel-body">
                <ul>
                    <li :cycles="cycles" v-for="cycle in cycles" >
                        {{ cycle.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</template>
