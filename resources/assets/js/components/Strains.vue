<script type="text/babel">
    export default{
        methods: {
            fetchStrains() {
                this.$http.get('/api/strains').then(response => {
                    this.strains = response.data.data
                }).catch(response => {
                    throw new EventException;
                })
            }
        },
        mounted() {
            console.log("Strains Component Ready!")
            this.fetchStrains();
        },

        data: function() {
            return{
                strains: this.strains
            }
        }
    }
</script>
<template>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Strain Database</div>
            <div id="strains">

                <table class="panel-body table table-striped table-hover table-resource-index">
                    <tbody class="">
                        <tr class="table-striped table-hover row" :strains="strains" v-for="strain in strains">
                            <td>
                                <ul style="list-style-type:none;display:block; width:40%; float:right;">
                                    <li>description: {{strain.description}}</li>
                                    <li>ucpc: {{strain.ucpc}}</li>
                                    <li>genetics: {{strain.genetics}}</li>
                                    <li>seed company: {{strain.seed_company}}</li>
                                    <li><a :href="strain.cannabis_reports_link">Cannabis Reports API</a></li>
                                </ul>
                                    <img :src="strain.image" class="strain-image" />
                                <a style="display:block; width:100%; font-size:1.5em;" :href="strain.url">
                                    {{strain.name}}
                                </a>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>