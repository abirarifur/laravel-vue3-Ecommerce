<template>
  <vue-final-modal
    v-model="showModal"
    classes="modal-container"
    content-class="modal-content"
  >
    <a type="button" class="align-self-end"
      ><i class="far fa-times-circle" @click="showModal = false"></i
    ></a>

    <div class="container-fluid" v-if="productData">
      <div class="card shadow">
        <div class="card-header">Product Details</div>
        <div class="card-body">
          <div class="row">
            <div class="col-3 border-end">
                <div class="col-header">General Details</div>
                <div class="productDetailsLeft">
                    <div><strong>SKU: </strong>{{ productData.sku }}</div>
                    <div><strong>Name: </strong>{{ productData.name }}</div>
                    <div><strong>Category: </strong>{{ productData.category?.name }}</div>
                    <div><strong>Subcategory: </strong>{{ productData.sub_category?.name }}</div>
                    <div><strong>Create Date: </strong>{{ formatDate(productData.created_at) }}</div>
                    <div><strong>Short Description: </strong><br><p>{{ productData.shortDescription }}</p></div>
                    <div><strong>Description: </strong><p>{{ productData.description }}</p></div>
                </div>
            </div>
            <div class="col-9">
                <div class="col-header">Stock Details</div>
                  <table class="table table-info table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Style</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>images</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(store, index) in productData.store"
                        :key="index"
                      >
                        <td>{{ store.style?.name }}</td>
                        <td>{{ store.size?.name }}</td>
                        <td>{{ store.color?.name }}</td>
                        <td>{{ store.stock }}</td>
                        <td>{{ store.price }}</td>
                        <td>
                          <div class="d-flex">
                            <div
                              v-for="(img, i) in store.images"
                              :key="i"
                              class="m-3"
                            >
                              <img
                                :src="'/' + img"
                                alt=""
                                width="100"
                                height="150"
                              />
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </vue-final-modal>
</template>

<script>
import { $vfm, VueFinalModal, ModalsContainer } from "vue-final-modal";
import { ref } from "@vue/reactivity";
export default {
  components: {
    VueFinalModal,
    ModalsContainer,
  },
  setup() {
    const showModal = ref(false);
    const productData = ref({});
    function openModel(data) {
      debugger;
      productData.value = data;
      return (this.showModal = true);
    }
    function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
    }
    return { showModal, openModel, productData, formatDate };
  },
};
</script>

<style lang="scss" scoped>
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
.card {
  .card-header {
    font-family: Montserrat Alternates;
    font-size: 25px;
    font-weight: bold;
  }
  .productDetailsLeft{
      div{
        display: flex;
        justify-content: space-between;
        padding: 10px;
        flex-wrap: wrap;
      }

  }
  table{
      tr{
          vertical-align: middle;
      }
  }
  .col-header{
    font-family: Montserrat Alternates;
    font-size: 20px;
    font-weight: bold;
    color: #00a551;
    border-bottom: 1px groove;
    margin-bottom: 10px;
  }

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
