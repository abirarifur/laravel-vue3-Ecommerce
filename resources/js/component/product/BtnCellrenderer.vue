<template>
    <div>
        <button type="button" class="btn btn-success" @click="btnClickedHandler()"><i class="fas fa-eye"></i></button>
        <button class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></button>
        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
    </div>
</template>

<script>
    export default {
        methods: {
            btnClickedHandler() {
                debugger
            this.params.clicked(this.params.value);
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
