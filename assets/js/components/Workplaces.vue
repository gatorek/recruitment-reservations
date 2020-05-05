<template>
    <div id="wraps">
        <div class="box box-warning">
            <div class="box-body">
                <table id="workplace-list" class="table table-bordered table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Sprzęt</th>
                    </tr>
                    <tr v-for="workplace in workplaces" v-bind:key="workplace.id">
                        <td>{{ workplace.id }}</td>
                        <td>{{ workplace.name }}</td>
                        <td>{{ workplace.description }}</td>
                        <td>
                            <ul v-for="gear in workplace.gears" v-bind:key="gear.id">
                                <li>{{ gear.type }}: {{ gear.name }}</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['list_url'],
        data: () => {
            return {
                workplaces: []
            }
        },
        mounted: function() {
            this.update();
        },
        methods: {
            update: function(){
                $.ajax({
                    url: this.list_url,
                    success: (data) => {
                        console.log(data);
                        this.workplaces = data;
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>