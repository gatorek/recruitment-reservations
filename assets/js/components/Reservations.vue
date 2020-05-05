<template>
    <div id="wraps">
        <div class="box box-warning">
            <div class="box-body">
                <table id="triage-card-list" class="table table-bordered table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Użytkownik</th>
                        <th>Miejsce pracy</th>
                        <th>Od</th>
                        <th>Do</th>
                    </tr>
                    <tr v-for="reservation in reservations" v-bind:key="reservation.id">
                        <td>{{ reservation.id }}</td>
                        <td>{{ reservation.user.name }} {{ reservation.user.surname }}</td>
                        <td>{{ reservation.workplace.name }}</td>
                        <td>{{ reservation.dateFrom|time }}</td>
                        <td>{{ reservation.dateTo|time }}</td>
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
                reservations: []
            }
        },
        mounted: function() {
            $.ajax({
                url: this.list_url,
                success: (data) => {
                    this.reservations = data;
                }
            });
        }
    }
</script>

<style scoped>

</style>