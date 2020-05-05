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
                                <li>
                                    <button type="button" class="btn btn-primary btn-sm gear-edit" :data-gear="gear.id">Edytuj</button>
                                    <a class="btn btn-danger btn-sm delete" :data-gear="gear.id" href="javascript:console.log(this);" rel="nofollow">Delete</a>
                                    {{ gear.type }}: {{ gear.name }}
                                </li>
                            </ul>
                            <button type="button" class="btn btn-primary btn-sm gear-add mt-2" :data-workplace="workplace.id">Dodaj sprzęt</button>
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
            this.confirmation();
        },
        updated: function() {
            this.confirmation();
        },
        methods: {
            update: function(){
                $.ajax({
                    url: this.list_url,
                    success: (data) => {
                        this.workplaces = data;
                    }
                });
            },
            confirmation: function(){
                $('.delete').confirmation({
                    rootSelector: '.delete',
                    title: 'na pewno?'
                });
            }
        }
    }
</script>

<style scoped>

</style>