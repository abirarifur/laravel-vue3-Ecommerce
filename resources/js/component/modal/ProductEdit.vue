<template>

  <vue-final-modal
    v-model="showModal"
    classes="modal-container"
    content-class="modal-content"
  >
    <a type="button" class="align-self-end"
      ><i class="far fa-times-circle" @click="showModal = false"></i
    ></a>
    <h3>Edit Product</h3>
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
                  name="shortDescription"
                  id="shortDescription"
                  cols="30"
                  rows="2"
                  class="form-control"
                  v-model="shortDescription"
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
                  v-model="description"
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
                    <option v-for="(subcategory, i) in subCategories" :key="i" :value="subcategory.id">{{subcategory.name}}</option>
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
                        @select="newAttributesAdd"
                        @deselect="removeStyleAttributes"
                        @close="newAttributesAdd"
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
                        @select="newAttributesAdd"
                        @deselect="removeSizeAttributes"
                        @close="newAttributesAdd"
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
                        @select="newAttributesAdd"
                        @deselect="removeColorAttributes"
                        @close="newAttributesAdd"
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
                          <tbody id="proPriceTable" ref="productUpdateTable">
                            <tr v-for="(coll, index) in collection" :key="index">
                              <td>{{ coll.tags[0][1] }} <span style="display: none;">{{ coll.tags[0][0]}}</span> </td>
                              <td>{{ coll.tags[1][1] }}<span style="display: none;">{{ coll.tags[1][0]}}</span></td>
                              <td>{{ coll.tags[2][1] }}<span style="display: none;">{{ coll.tags[2][0]}}</span></td>
                              <td>
                                <input type="number" class="form-control" :key="index" :value="coll.data?.stock"/>
                              </td>
                              <td>
                                <input type="number" class="form-control" :key="index" :value="coll.data?.price"/>
                              </td>
                              <td>
                                <input type="file" @change="imagePerview($event, index)" class="form-control " multiple ref="muiltImg" :key="index" accept=".png, .jpg, .jpeg," />
                                <tr>
                                  <td>
                                      <div class="image-preview" v-if="files.oldFile[index] || files.newFile[index]" :key="index">
                                        <div v-if="files.oldFile[index]" class="d-flex">
                                          <div v-for="(file, i) in files.oldFile[index][0]" :key="i" class="m-1 position-relative">
                                                <i  class="far fa-times-circle position-absolute" @click="removeImg(index, i, 'oldFile')"></i>
                                                <img :src="'/'+file" alt="" />
                                            </div>
                                        </div>
                                          <div v-if="files.newFile[index]" class="d-flex">
                                                <div v-for="(file, j) in files.newFile[index][0]" :key="j" class="m-1 position-relative">
                                                <i  class="far fa-times-circle position-absolute" @click="removeImg(index, j, 'newFile')"></i>
                                                <img :src="file" alt="" />
                                                </div>
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
        <button class="btn btn-dark align-self-center mt-3" @click.prevent="updateProduct">Submit</button>
      </div>
    </form>
    <!-- <button @click.prevent="test">test</button> -->
  </vue-final-modal>

</template>

<script>
import { $vfm, VueFinalModal, ModalsContainer } from "vue-final-modal";
import Multiselect from '@vueform/multiselect'
// import this.axios from 'this.axios'


export default {
  components: {
    VueFinalModal,
    ModalsContainer,
    Multiselect
  },
  data() {
    return {
        product_id : null,
      showModal: false,
      timeForFlash: 3000,
      files: {oldFile: {}, newFile:{}},
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
      name: '',
      sku: "",
      shortDescription: "",
      description: "",
      productDataCollection: [],

        styleOptions: [],
        sizeOptions: [],
        colorOptions: []


    };
  },
  methods: {

    showmodel(data) {
        this.product_id = data.id
        this.name = data.name;
        this.sku = data.sku;
        this.shortDescription = data.shortDescription;
        this.description = data.description;
        this.category = data.category_id
        this.getSubCategory(data.category_id)
        this.subCategory = data.subcategory_id

        data.store.filter((item) => {
        let iStyle = this.styleTags.findIndex(x => (x[0] == item.style_id));
        let iSize = this.sizeTags.findIndex(x => (x[0] == item.size_id));
        let iColor = this.colorTags.findIndex(x => (x[0] == item.color_id));
        if(iStyle <= -1){
            this.styleTags.push([item.style.id, item.style.name]);
        }
        if(iSize <= -1){
            this.sizeTags.push([item.size.id, item.size.name]);
        }
        if(iColor <= -1){
            this.colorTags.push([item.color.id, item.color.name]);
        }
        return null;
        });
        // this.collection = data.store
        this.setCrossJoin(data.store);
        data.store.forEach((item, index) => {
          this.files.oldFile[index] = {...[item.images]};
        })
      return (this.showModal = true);
    },

    setCrossJoin(data) {
        this.collection = []
      for (let i = 0; i < this.styleTags.length; i++) {
        for (let j = 0; j < this.sizeTags.length; j++) {
          for (let z = 0; z < this.colorTags.length; z++) {
              let crossData = {
                    tags: [],
                    data: []
                };
                crossData.tags.push(
                    this.styleTags[i],
                    this.sizeTags[j],
                    this.colorTags[z]
                );
            if(data){
                let dataItem = data.find(item => {
                    if(item.style_id == this.styleTags[i][0] && item.size_id == this.sizeTags[j][0] && item.color_id == this.colorTags[z][0] ){
                        return item
                    }
                })
                crossData.data = dataItem;
            }
            this.collection.push(crossData);
          }
        }
      }
    },
    newAttributesAdd(){
        for (let i = 0; i < this.styleTags.length; i++) {
        for (let j = 0; j < this.sizeTags.length; j++) {
          for (let z = 0; z < this.colorTags.length; z++) {
              let crossData = {
                    tags: [],
                    data: []
                };
                crossData.tags.push(
                    this.styleTags[i],
                    this.sizeTags[j],
                    this.colorTags[z]
                );
            if(this.collection){
                let dataItem = this.collection.find(item => {
                    if(item.tags[0][0] == this.styleTags[i][0] && item.tags[1][0] == this.sizeTags[j][0] && item.tags[2][0] == this.colorTags[z][0] ){
                        return item.data
                    }
                })
                if(!dataItem){
                    this.collection.push(crossData);
                }
            }
          }
        }
      }
    },
    removeStyleAttributes(event){
        let indexOf = this.collection.findIndex(item => item.tags[0][0] == event[0])
        if(indexOf > -1){
          this.collection.splice(indexOf, 1)
          this.removeStyleAttributes(event)
        }
    },
    removeSizeAttributes(event){
        let indexOf = this.collection.findIndex(item => item.tags[1][0] == event[0])
        if(indexOf > -1){
          this.collection.splice(indexOf, 1)
          this.removeSizeAttributes(event)
        }
    },
    removeColorAttributes(event){
        let indexOf = this.collection.findIndex(item => item.tags[2][0] == event[0])
        if(indexOf > -1){
          this.collection.splice(indexOf, 1)
          this.removeColorAttributes(event)
        }
    },
    getTableRow() {
        let table = this.$refs.productUpdateTable;
    //   let table = document.getElementById("proPriceTable");
      let tableData = [];
      let tableDataObj = {
        sku: "",
        style: "",
        size: "",
        color: "",
        stock: 0,
        price: 0,
        images: '',
      };
      this.productDataCollection = [];
      debugger
      for (let i = 0; i < table.rows.length; i++) {
        for (let j = 0; j < table.rows[i].cells.length; j++) {
          if (j >= 3) {
            for (let z = 0; z < table.rows[i].cells[j].children.length; z++) {
              if (table.rows[i].cells[j].children[z].type == "file") {
                // tableData.push([...this.files])
                if(table.rows[i].cells[j].children[z].files){
                    tableData.push({newFiles: [...table.rows[i].cells[j].children[z].files], oldFiles: this.files.oldFile[i] ? this.files.oldFile[i][0] : []})
                }else{
                    tableData.push({newFiles: [[]], oldFiles: this.files.oldFile[i][0]})
                }
                break;
              }
              tableData.push(table.rows[i].cells[j].children[z].value);
              break;
            }
          } else {
            tableData.push(table.rows[i].cells[j].children[0].innerHTML);
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
    getSubCategory(id){
        this.axios.get('/api/admin/subcategory/getListById', {
            params:{
                id: Number(id)
            }
            }).then((reselt) => {
            this.subCategories = reselt.data;
        });
    },


    imagePerview(file, index) {
      debugger
      let inputImageObj = []
    //   let inputImageObj = {index: index,img:[]}
      for (const imgfile of file.target.files) {
        inputImageObj.push(URL.createObjectURL(imgfile));
      }
    //   this.files.newFile = []
      this.files.newFile[index] = {...[inputImageObj]};
    },

    removeImg(index, fileIndex, fileType) {
      debugger
      this.files[fileType][index][0].splice(fileIndex, 1);
    },

    updateProduct(){
        this.styleTags;
        this.styleOptions;
        this.getTableRow()
        const productData = new FormData();

        productData.append('product_id', this.product_id);
        productData.append('name', this.name);
        productData.append('sku', this.sku)
        productData.append('shortDescription', this.shortDescription)
        productData.append('description', this.description)
        for( let i = 0; i < this.productDataCollection.length; i++ ){
            productData.append('productDetails[' + i + '][sku]', this.productDataCollection[i].sku);
            productData.append('productDetails[' + i + '][style]', this.productDataCollection[i].style);
            productData.append('productDetails[' + i + '][size]', this.productDataCollection[i].size);
            productData.append('productDetails[' + i + '][color]', this.productDataCollection[i].color);
            productData.append('productDetails[' + i + '][stock]', this.productDataCollection[i].stock);
            productData.append('productDetails[' + i + '][price]', this.productDataCollection[i].price);
            if(this.productDataCollection[i].images.oldFiles.length > 0){
                for( let j = 0; j < this.productDataCollection[i].images.oldFiles.length; j++ ){
                productData.append('productDetails[' + i + '][images][oldFiles]['+j+']', this.productDataCollection[i].images.oldFiles[j]);
                }
            }
            if(this.productDataCollection[i].images.newFiles.length > 0){
                for( let z = 0; z < this.productDataCollection[i].images.newFiles.length; z++ ){
                productData.append('productDetails[' + i + '][images][newFiles]['+z+']', this.productDataCollection[i].images.newFiles[z]);
                }
            }

        }

        productData.append('category', this.category)
        productData.append('subCategory', this.subCategory)

        this.$Progress.start();
        this.axios.get('/sanctum/csrf-cookie').then(response => {
                this.axios.post('/api/admin/product/update', productData, { headers: { "Content-Type": "multipart/form-data" } })
                    .then(response => {
                        debugger
                        if (response.data.success) {
                            this.$Progress.finish();
                            this.showModal = false
                            this.$router.push('/admin/product')
                            this.$emit('loadProductList')
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
    },
  },
    created () {
        this.axios.get('/api/admin/category').then((reselt) => {
            this.categories = reselt.data;
        });

        this.axios.get('/api/admin/style').then((reselt) => {
            reselt.data.forEach((item) => {
                this.styleOptions.push({
                value: [item.id, item.name],
                label: item.name
                });
            })
        });
        this.axios.get('/api/admin/size').then((reselt) => {
            reselt.data.forEach((item) => {
                this.sizeOptions.push({
                value: [item.id, item.name],
                label: item.name
                });
            })
        });
        this.axios.get('/api/admin/color').then((reselt) => {
            reselt.data.forEach((item) => {
                this.colorOptions.push({
                value: [item.id, item.name],
                label: item.name
                });
            })
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
