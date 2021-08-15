<template>
  <vue-final-modal
    v-model="showModal"
    classes="modal-container"
    content-class="modal-content"
  >
    <a type="button" class="align-self-end"
      ><i class="far fa-times-circle" @click="showModal = false"></i
    ></a>
    <h3>Add New Product</h3>
    <form>
      <div class="form_container">
        <div class="leftSide flex-grow-1 p-3">
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" />
          </div>
          <div class="mb-3">
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku" class="form-control" />
          </div>
          <div class="mb-3">
            <label for="shortDiscription">Short Description</label>
            <textarea
              name="shortDiscription"
              id="shortDiscription"
              cols="30"
              rows="2"
              class="form-control"
            ></textarea>
          </div>
          <div class="mb-3">
            <label for="description">Description</label>
            <textarea
              name="description"
              id="description"
              cols="30"
              rows="2"
              class="form-control"
            ></textarea>
          </div>
          
        </div>
        <div class="middle flex-grow-1 p-3">
            <div class="mb-3">
            <label for="muiltImg">Image Gallery</label>
            <input
              type="file"
              @change="imagePerview($event)"
              class="form-control"
              multiple
              ref="muiltImg"
            />
            <div class="image-preview" v-if="files">
              <div v-for="(file, index) in files" :key="index" class="m-1">
                  <i class="far fa-times-circle" @click="removeImg(index)"></i>
                <img :src="file" alt="" />
              </div>
            </div>
 
          </div>
        </div>
        <div class="rightSide flex-grow-1 p-3">

        </div>
      </div>
    </form>
  </vue-final-modal>
</template>

<script>
import { $vfm, VueFinalModal, ModalsContainer } from "vue-final-modal";

export default {
  components: {
    VueFinalModal,
    ModalsContainer,
  },
  data() {
    return {
      showModal: false,
      files: [],
    };
  },
  methods: {
    showmodel() {
      return (this.showModal = true);
    },
    imagePerview(file) {
      debugger;
      for (const imgfile of file.target.files) {
          this.files.push(URL.createObjectURL(imgfile));
      }
      this.$refs.muiltImg.value = ''

      
    },
    removeImg(id){
        this.files.splice(id, 1);
    }
    
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
.form_container{
    display: flex;
}
.image-preview{
    display: flex;
    i{
        position: absolute;
        margin: 5px;
        color: white;
        background-color: black;
    }
    img{
        width: 150px;
        height: 200px;
        object-fit: cover;
    }
}
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
.form_container {
  display: flex;
}
</style>