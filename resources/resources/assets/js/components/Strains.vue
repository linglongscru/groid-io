<script>
    export default{
        methods: {
            fetchStrains: function() {
                let x = []
                this.$http.get('/api/strains').then((response) => {
                    for (i = 0; i < response.data.data.length; i++) {
                    x.push(response.data.data[i])
                }
                this.$set('strains', x);
            }, (response) => {
                    throw new EventException;
                });
            },
            pagination: function() {
                this.$http.get('/api/strains').then((response) => {
                    console.log(_.values(response.data.meta.pagination.links));
                    this.$set('pages', _.values(response.data.meta.pagination.links));

            }, (response) => {
                    throw new EventException;
                });
            }},


        data(){
            return{
                strains: this.fetchStrains(),
                pages: this.pagination()
            }
        }
    }
</script>
<template>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Strain Database</div>
            <div id="strains">
                <nav :pages="pages" v-for="page in pages">
                 <a href="{{ page }}">link</a>
                </nav>
                <table class="panel-body table table-striped table-hover table-resource-index">
                    <tbody class="">
                        <tr class="table-striped table-hover row" :strains="strains" v-for="strain in strains" class="row">
                            <td>
                                <ul style="list-style-type:none;display:block; width:40%; float:right;">
                                    <li>description: {{strain.description}}</li>
                                    <li>ucpc: {{strain.ucpc}}</li>
                                    <li>genetics: {{strain.genetics}}</li>
                                    <li>seed company: {{strain.seed_company}}</li>
                                    <li><a href="{{ strain.cannabis_reports_link }}">Cannabis Reports API</a></li>
                                </ul>
                                <a style="display:block; width:20%; max-width:200px; min-width:60px;"
                                   href="/strains/{{ strain.id }}">
                                    <img v-bind:src="strain.image" class="strain-image" />
                                </a>
                                <a style="display:block; width:100%; font-size:1.5em;" href="/strains/{{strain.id}}">
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