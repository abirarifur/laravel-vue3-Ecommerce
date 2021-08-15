<template>
    <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
      <a type="button" class="align-self-end"><i class="far fa-times-circle" @click="showModal = false"></i></a>
      <h3>Add New Product</h3>
      <form>
          <div class="form_container">
              <div class="leftSide">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name" class="form-control">
                  </div>
                   <div class="form-group">
                      <label for="sku">SKU</label>
                      <input type="text" id="sku" name="sku" class="form-control">
                  </div>
                   <div class="form-group">
                      <label for="shortDiscription">Short Description</label>
                      <textarea name="shortDiscription" id="shortDiscription" cols="30" rows="2" class="form-control"></textarea>
                  </div>
                   <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
                  </div>
              </div>
              <div class="rightSide">
                  
              </div>
          </div>
      </form>
    </vue-final-modal>
</template>

<script>
import { $vfm, VueFinalModal, ModalsContainer } from 'vue-final-modal'
export default {
    components: {
        VueFinalModal,
        ModalsContainer
    },
    data() {
        return {
            showModal: false
        }
    },
    methods: {
        showmodel(){
            return this.showModal = true
        }
    },
}
</script>

<style scoped>
::v-deep .modal-container {
  display: flex;
  justify-content: center;
  align-items: center;
}
::v-deep .modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  max-height: 90%;
  margin: 0 1rem;
  padding: 1rem;
  border: 1px solid #e2e8f0;
  border-radius: 0.25rem;
  background: #fff;
}
.modal__title {
  margin: 0 2rem 0 0;
  font-size: 1.5rem;
  font-weight: 700;
}
.modal__content {
  flex-grow: 1;
  overflow-y: auto;
}
.modal__action {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-shrink: 0;
  padding: 1rem 0 0;
}
.modal__close {
  position: absolute;
  top: 0.5rem;
  right: 0.5rem;
}
</style>

<style scoped>
.dark-mode div::v-deep .modal-content {
  border-color: #2d3748;
  background-color: #1a202c;
}
.form_container{
    display: flex;
}
</style>