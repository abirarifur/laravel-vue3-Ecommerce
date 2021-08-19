<template>
    <div v-for="(file, index) in files" :key="index" class="m-1">
      <i class="far fa-times-circle" @click="removeImg(index)"></i>
      <img :src="file" alt="" />
    </div>
</template>

<script>
export default {
    props: ['files'],
    emits: ['flieremove'],
    methods: {
        removeImg(id) {
            this.files.splice(id, 1);
            this.$emit('flieremove')
        },
    },

};
</script>

<style lang="scss" scoped>

</style>
