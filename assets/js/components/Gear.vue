<template>
    <div>
        <p>Dostępny sprzęt:</p>
        <ul class="" id="gear-list">
            <li class="" v-for="gear in workplace.gears" v-bind:key="gear.id" :data-gear="gear.ids">
                {{ gear.type }}: {{ gear.name }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['list_url'],
        data: () => {
            return {
                workplace: {}
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
                        this.workplaces = data;
                        displayWorkspaceGear();
                    }
                });
            },
            select: function(workplaceId) {
                this.workplace = this.workplaces.find((w) => w.id == workplaceId)
            }
        }
    }
</script>

<style scoped>

</style>