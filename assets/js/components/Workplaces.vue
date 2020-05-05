<template>
    <div id="workplace-list">
        <div class="row">
            <div class="border col-1">Id</div>
            <div class="border col-3">Nazwa</div>
            <div class="border col-4">Opis</div>
            <div class="border col-4">Sprzęt (przeciągnij i upuść, aby przenieść do innego miejsca pracy)</div>
        </div>
        <div class="row" v-for="workplace in workplaces" v-bind:key="workplace.id">
            <div class="border col-1">{{ workplace.id }}</div>
            <div class="border col-3">{{ workplace.name }}</div>
            <div class="border col-4">{{ workplace.description }}</div>
            <div class="border col-4 p-1">
                <ul class="draggable list-unstyled" :data-workplace="workplace.id">
                    <li class="border m-1 w-75 p-1" v-for="gear in workplace.gears" v-bind:key="gear.id" :data-gear="gear.ids">
                        <button type="button" class="btn btn-primary btn-sm gear-edit" :data-gear="gear.id">Edytuj</button>
                        <a class="btn btn-danger btn-sm delete" :data-gear="gear.id" href="javascript:void(0);" rel="nofollow">Usuń</a>
                        {{ gear.type }}: {{ gear.name }}
                    </li>
                </ul>
                <button type="button" class="btn btn-primary btn-sm gear-add" :data-workplace="workplace.id">Dodaj sprzęt</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['list_url', 'assign_url'],
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
            this.draggable();
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
                    title: 'Na pewno chcesz usunąć?',
                    btnOkLabel: "Tak",
                    btnCancelLabel: "Nie"
                });
            },
            draggable: function() {
                var adjustment;
                $("ul.draggable").sortable({
                    group: 'draggable',
                    pullPlaceholder: false,
                    onDrop: ($item, container, _super) => {
                        var $clonedItem = $('<li/>').css({height: 0});
                        $item.before($clonedItem);
                        $clonedItem.animate({'height': $item.height()});

                        $item.animate($clonedItem.position(), function  () {
                            $clonedItem.detach();
                            _super($item, container);
                        });

                        $.ajax({
                            url: this.assign_url
                                .replace('/0/', `/${$item[0].firstChild.dataset.gear}/`)
                                .slice(0, -1)
                                + container.el[0].dataset.workplace,
                            method: "POST",
                            success: (data) => {
                                $root.$refs.workplaces.update();
                            },
                            error: () => {
                                alert('Nie udało się przenieść sprzętu do innego miejsca pracy')
                            }
                        });
                    },
                    // set $item relative to cursor position
                    onDragStart: function ($item, container, _super) {
                        var offset = $item.offset(),
                            pointer = container.rootGroup.pointer;

                        adjustment = {
                            left: pointer.left - offset.left,
                            top: pointer.top - offset.top
                        };

                        _super($item, container);
                    },
                    onDrag: function ($item, position) {
                        $item.css({
                            left: position.left - adjustment.left,
                            top: position.top - adjustment.top
                        });
                    }
                });

            }
        }
    }
</script>

<style scoped>
    body.dragging, body.dragging * {
        cursor: move !important;
    }
    .dragged {
        position: absolute;
        opacity: 0.5;
        z-index: 2000;
    }
</style>