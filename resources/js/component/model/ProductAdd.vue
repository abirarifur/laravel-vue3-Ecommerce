<template>
  <vue-final-modal v-model="showModal" classes="modal-container" content-class="modal-content">
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
        <!-- <div class="middle flex-grow-1 p-3">
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
        </div> -->
        <div class="rightSide flex-grow-1 p-3">
          <div class="card">
            <div class="card-header">Attributes</div>
            <div class="card-body">
              <div class="mb-3">
                <label for="style">Style</label>
                <vue-tags-input
                  v-model="styleTag"
                  :tags="styleTags"
                  @tags-changed="(newTags) => (styleTags = newTags)"
                  @change="setCrossJoin"
                />
              </div>
              <div class="mb-3">
                <label for="size">Size</label>
                <vue-tags-input
                  v-model="sizeTag"
                  :tags="sizeTags"
                  @tags-changed="(newTags) => {
                      (sizeTags = newTags)
                      setCrossJoin()
                      }"
                />
              </div>
              <div class="mb-3">
                <label for="color">Color</label>
                <vue-tags-input
                  v-model="colorTag"
                  :tags="colorTags"
                  @tags-changed="(newTags) => (colorTags = newTags)"
                  @change="setCrossJoin"
                />
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-header">Stock & image</div>
            <div class="card-body">
              <div class="container">
                <div class="row" v-for="(coll, index) in collection" :key="index">
                  <div class="col-2">{{++index}}</div>
                  <div class="col-2">{{coll[0]}}</div>
                  <div class="col-2">{{coll[1]}}</div>
                  <div class="col-2">{{coll[2]}}</div>
                  <div class="col-2"><input type="number" /></div>
                  <div class="col-2"><input type="number" /></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </vue-final-modal>
</template>

<script>
import { $vfm, VueFinalModal, ModalsContainer } from "vue-final-modal";
import VueTagsInput from "@sipec/vue3-tags-input";

export default {
  components: {
    VueFinalModal,
    ModalsContainer,
    VueTagsInput,
  },
  data() {
    return {
      showModal: false,
      files: [],
      styleTag: "",
      styleTags: [],
      sizeTag: "",
      sizeTags: [],
      colorTag: "",
      colorTags: [],
      collection: []
    };
  },
  methods: {
    showmodel() {
      return (this.showModal = true);
    },
    setCrossJoin() {
        this.collection = []
        debugger
      for (let i = 0; i < this.styleTags.length; i++) {
        for (let j = 0; j < this.sizeTags.length; j++) {
          for (let z = 0; z < this.colorTags.length; z++) {
            this.collection.push([this.styleTags[i].text, this.sizeTags[j].text, this.colorTags[z].text]);
          }
        }
      }
    },
    // cartesianProduct(a, b) {
    //   debugger;
    //   a.reduce((p, x) => [...p, ...b.map((y) => [x, y])], []);
    // },
    // cartesianProductOf() {
    //     debugger
    //   return _.reduce(
    //     arguments,
    //     function (a, b) {
    //       return _.flatten(
    //         _.map(a, function (x) {
    //           return _.map(b, function (y) {
    //             return x.concat([y]);
    //           });
    //         }),
    //         true
    //       );
    //     },
    //     [[]]
    //   )
    // },
    // imagePerview(file) {
    //   for (const imgfile of file.target.files) {
    //       this.files.push(URL.createObjectURL(imgfile));
    //   }
    //   this.$refs.muiltImg.value = ''

    // },
    // removeImg(id){
    //     this.files.splice(id, 1);
    // }
  },
};
</script>

<style lang="scss" scoped>
.form_container {
  display: flex;
}
.fa-times-circle {
  font-size: 25px;
}
.image-preview {
  display: flex;
  i {
    position: absolute;
    margin: 5px;
    color: white;
    background-color: black;
  }
  img {
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
  overflow: auto;
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