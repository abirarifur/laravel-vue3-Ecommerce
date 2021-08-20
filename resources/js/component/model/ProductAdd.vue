<template>
    <FlashMessage position="right bottom" :time=timeForFlash />

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
      <div class="form_container flex-column">
        <div class="general">
          <div class="card">
            <div class="card-header">General</div>
            <div class="card-body d-flex justify-content-between">
              <div class="mx-3 w-100">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" v-model="name" class="form-control" />
              </div>
              <div class="mx-3 w-100">
                <label for="sku">SKU</label>
                <input
                  type="text"
                  id="sku"
                  name="sku"
                  class="form-control"
                  v-model="sku"
                />
              </div>
              <div class="mx-3 w-100">
                <label for="shortDiscription">Short Description</label>
                <textarea
                  name="shortDiscription"
                  id="shortDiscription"
                  cols="30"
                  rows="2"
                  class="form-control"
                  v-model="shortDiscription"
                ></textarea>
              </div>
              <div class="mx-3 w-100">
                <label for="description">Description</label>
                <textarea
                  name="description"
                  id="description"
                  cols="30"
                  rows="2"
                  class="form-control"
                  v-model="discription"
                ></textarea>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-header">Categories</div>
            <div class="card-body d-flex justify-content-between">
              <div class="mx-3 w-100">
                <label for="category">Category</label>
                <select id="category" name="category" v-model="category" class="form-control" @change="getSubCategory">
                    <option value="" disabled selected>Select Category</option>
                    <option v-for="(category, i) in categories" :key="i" :value="category.id">{{category.name}}</option>
                </select>
              </div>
              <div class="mx-3 w-100">
                <label for="subCategory">Subcategory</label>
                <select id="subCategory" name="subCategory" v-model="subCategory" class="form-control" placeholder="Select Subcategory">
                    <option value="" disabled selected>Select Subcategory</option>
                    <option v-for="(subcategory, i) in subCategories" :key="i">{{subcategory.name}}</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="otherDetails d-flex">
          <div class="leftSide mt-3">
            <div class="card">
              <div class="card-header">Attributes</div>
              <div class="card-body">
                <div class="mb-3">
                  <label for="style">Style</label>

                  <Multiselect
                        v-model="styleTags"
                        mode="tags"
                        placeholder="Select your Style"
                        :options="styleOptions"
                        :searchable="true"
                        @select="setCrossJoin"
                        @deselect="setCrossJoin"
                        @close="setCrossJoin"
                    />
                </div>
                <div class="mb-3">
                  <label for="size">Size</label>

                  <Multiselect
                        v-model="sizeTags"
                        mode="tags"
                        placeholder="Select your Sizes"
                        :options="sizeOptions"
                        :searchable="true"
                        @select="setCrossJoin"
                        @deselect="setCrossJoin"
                        @close="setCrossJoin"
                    />
                </div>
                <div class="mb-3">
                  <label for="color">Color</label>

                  <Multiselect
                        v-model="colorTags"
                        mode="tags"
                        placeholder="Select your Color"
                        :options="colorOptions"
                        :searchable="true"
                        @select="setCrossJoin"
                        @deselect="setCrossJoin"
                        @close="setCrossJoin"
                    />
                </div>
              </div>
            </div>
          </div>
          <div class="rightSide flex-grow-1 mt-3">
            <div class="card ">
              <div class="card-header">Stock & image</div>
              <div class="card-body">
                <div class="container">
                  <div class="row mb-3">
                    <div class="col-12">
                      <div class="row">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>style</th>
                              <th>size</th>
                              <th>color</th>
                              <th>stock</th>
                              <th>price</th>
                              <th>images</th>
                            </tr>
                          </thead>
                          <tbody id="proPriceTable">
                            <tr v-for="(coll, index) in collection" :key="index">
                              <td>{{ coll[0] }}</td>
                              <td>{{ coll[1] }}</td>
                              <td>{{ coll[2] }}</td>
                              <td>
                                <input type="number" class="form-control" :key="index"/>
                              </td>
                              <td>
                                <input type="number" class="form-control" :key="index"/>
                              </td>
                              <td>
                                <input type="file" @change="imagePerview($event, index)" class="form-control " multiple ref="muiltImg" :key="index" accept=".png, .jpg, .jpeg,"/>
                                <tr>
                                  <td>
                                      <div class="image-preview" v-if="files[index]" :key="index">
                                        <div v-for="(file, i) in files[index][0]" :key="i" class="m-1 position-relative">
                                          <i  class="far fa-times-circle position-absolute" @click="removeImg(index, i)"></i>
                                          <img :src="file" alt="" />
                                        </div>
                                      </div>
                                  </td>
                                </tr>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <!-- <button @click.prevent="getTableRow">get table data</button> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-dark align-self-center mt-3" @click.prevent="addProduct">Submit</button>
      </div>
    </form>
    <!-- <button @click.prevent="test">test</button> -->
  </vue-final-modal>

</template>

<script>
import { $vfm, VueFinalModal, ModalsContainer } from "vue-final-modal";
import Multiselect from '@vueform/multiselect'
import axios from 'axios'
import FlashMessage from '@smartweb/vue-flash-message';


export default {
  components: {
    VueFinalModal,
    ModalsContainer,
    Multiselect
  },
  data() {
    return {
      showModal: false,
      timeForFlash: 3000,
      files: {},
    //   styleTag: "",
      styleTags: [],
    //   sizeTag: "",
      sizeTags: [],
    //   colorTag: "",
      colorTags: [],

      collection: [],

      categories: [],
      subCategories:[],

      category: '',
      subCategory: '',
      name: "",
      sku: "",
      shortDiscription: "",
      discription: "",
      productDataCollection: [],

        styleOptions: [
          'Leggings',
          'Bra',
        ],
        sizeOptions: [
          's',
          'm',
          'l',
          'xl',
          'xxl',
        ],
        colorOptions: [
          'black',
          'blue',
          'yellow',
        ]


    };
  },
  methods: {
    showmodel() {
      return (this.showModal = true);
    },
    setCrossJoin() {

      this.collection = [];
      for (let i = 0; i < this.styleTags.length; i++) {
        for (let j = 0; j < this.sizeTags.length; j++) {
          for (let z = 0; z < this.colorTags.length; z++) {
            this.collection.push([
              this.styleTags[i],
              this.sizeTags[j],
              this.colorTags[z]
            ]);
          }
        }
      }
    },
    getTableRow() {
      let table = document.getElementById("proPriceTable");
      let tableData = [];
      let tableDataObj = {
        sku: "",
        style: "",
        size: "",
        color: "",
        stock: 0,
        price: 0,
        images: [],
      };
      this.productDataCollection = [];
      for (let i = 0; i < table.rows.length; i++) {
        for (let j = 0; j < table.rows[i].cells.length; j++) {
          if (j >= 3) {
            for (let z = 0; z < table.rows[i].cells[j].children.length; z++) {
              if (table.rows[i].cells[j].children[z].type == "file") {
                tableData.push([...table.rows[i].cells[j].children[z].files]);
                break;
              }
              tableData.push(table.rows[i].cells[j].children[z].value);
              break;
            }
          } else {
            tableData.push(table.rows[i].cells[j].innerHTML);
          }
        }

        tableDataObj = {
          sku: this.sku,
          style: tableData[0],
          size: tableData[1],
          color: tableData[2],
          stock: tableData[3],
          price: tableData[4],
          images: tableData[5],
        };
        this.productDataCollection.push(tableDataObj);
        tableData = [];
      }
    },
    // setStyleTag(event){
    //     debugger
    //     this.styleTags.push(event.target.value)
    // }
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
    getSubCategory(event){

        axios.get('/api/admin/subcategory/getListById', {
            params:{
                id: Number(event.target.value)
            }
            }).then((reselt) => {
            this.subCategories = reselt.data;
        });
    },


    imagePerview(file, index) {

      let inputImageObj = []
    //   let inputImageObj = {index: index,img:[]}
      for (const imgfile of file.target.files) {
        inputImageObj.push(URL.createObjectURL(imgfile));
      }
      this.files[index] = {...[inputImageObj]};
    },
    removeImg(index, fileIndex) {

      this.files[index][0].splice(fileIndex, 1);
    },

    addProduct(){

        this.getTableRow()
        const productData = {
            name: this.name,
            sku: this.sku,
            shortDiscription: this.shortDiscription,
            discription: this.discription,
            productDetails: this.productDataCollection,
            category: this.category,
        }
        console.log(productData)
        this.$Progress.start();
        axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/admin/product/add', productData)
                    .then(response => {
                        if (response.data.success) {
                            this.$Progress.finish();
                            this.$router.push('/admin/product')
                            this.showModal = false
                            debugger
                            let mass = {
                                type: 'success',
                                title: 'Save Success',
                                message: 'asdsadasdsa'
                            }
                           this.$flashMessage.show(
                                mass
                            );
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
    },

// test(){
//       axios.get('/sanctum/csrf-cookie').then(response => {
//                 axios.get('/api/admin/product/add')
//                     .then(response => {
//                         if (response.data.success) {
//                             this.$router.push('/admin/product')
//                         } else {
//                             console.log(response)
//                         }
//                     })
//                     .catch(function (error) {
//                         console.error(error);
//                     });
//             })
//   }
//   },
  },
  mounted () {

        axios.get('/api/admin/category').then((reselt) => {
            this.categories = reselt.data;
        });

    },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style lang="scss" scoped>
@import "../../../sass/variables";
@import '@vueform/multiselect/themes/default.css';
.form_container {
  display: flex;
  button{
      width: 200px;
  }
}
.fa-times-circle {
  font-size: 25px;
}
.leftSide {
  width: 30%;
}
.card-header {
    background-color: $base-info;
    color: $text_color_base_info;
    font-weight: 800;
    font-size: 30px;
  }
.rightSide {
  width: 70%;
  padding-left: 10px;

  #proPriceTable {
    input {
      min-width: 100px;
    }
  }
  .image-preview {
  display: flex;
  max-width: 500px;
  overflow: auto;

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
}

::v-deep .modal-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 80%;
  margin: auto;
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
